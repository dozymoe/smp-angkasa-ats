<?php

namespace App\Extensions;

use Illuminate\Database\Query\Expression;

trait ModelQueryBuilder
{
    /**
     * Creates Query Builder
     */
    public static function Sql_Query($prefix='')
    {
        return static::query()->select(app(static::class)->table . '.*');
    }

    /**
     * Gets database table name.
     */
    public static function Sql_GetTableName()
    {
        return app(static::class)->table;
    }

    /**
     * Gets database table primary keys.
     */
    public static function Sql_GetKeyName()
    {
        $model = app(static::class);
        if (method_exists($model, 'getKeyNames'))
        {
            return $model->getKeyNames();
        }
        return $model->getKeyName();
    }

    /**
     * Returns SQL ALIAS to be used in QueryBuilder
     */
    public static function Sql_Alias($prefix = '')
    {
        return $prefix . static::Sql_GetTableName();
    }

    /**
     * Does the SQL Join ALIAS already exists?
     **/
    public static function Sql_HasJoin($sql, $alias)
    {
        $joins = $sql->getQuery()->joins;
        if ($joins)
        {
            foreach ($joins as $joinClause)
            {
                if (preg_match('/\b' . $alias . '\b/', $joinClause->table))
                {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Creates an SQL Join for QueryBuilder $sql.
     *
     * Params:
     *   - $sql
     *     Query Builder
     *
     *   - $alias
     *     A string of the SQL ALIAS for the Join clause, or an array of
     *     SQL ALIAS and the identifier field, if we are not using the primary
     *     key.
     *
     *   - $pairfield
     *     A string of the foreign key field from the main table, or an array
     *     of table ALIAS and that table's foreign key field.
     *     An array is used when we are creating a SQL Join of another SQL Join,
     *     not the main table in the FROM clause.
     *
     *   - $joinType
     *     If falsy that means it is an InnerJoin
     *
     *   - $where
     *     The additional ON clause for the SQL Join.
     */
    public static function Sql_Join($sql, $alias, $pairField, $joinType='left',
            $where=null)
    {
        $model = app(static::class);

        if (is_array($alias))
        {
            $ourField = $alias[1];
            $alias = $alias[0];
        }
        else
        {
            $ourField = $model->primaryKey;
        }
        if (static::Sql_HasJoin($sql, $alias))
        {
            return;
        }
        if (is_array($pairField))
        {
            $table = $pairField[0];
            $pairField = $pairField[1];
        }
        else
        {
            $table = $sql->getQuery()->from;
        }

        $sql->join(
            $model->table . ' AS ' . $alias,
            function ($join) use ($pairField, $ourField, $alias, $where, $table)
            {
                $join->on(
                        $ourField instanceof Expression ? $ourField :
                            $alias . '.' . $ourField,
                        '=',
                        $pairField instanceof Expression ? $pairField :
                            $table . '.' . $pairField);

                if ($where)
                {
                    foreach ($where as $clause)
                    {
                        $join->on(...$clause);
                    }
                }
            },
            null, null, $joinType);
    }

    public function sqlAlias($prefix = '')
    {
        return $prefix . $this->table;
    }

    public function hasSqlJoin($sql, $alias)
    {
        $joins = $sql->getQuery()->joins;
        if ($joins)
        {
            foreach ($joins as $joinClause)
            {
                if (preg_match('/\b' . $alias . '\b/', $joinClause->table))
                {
                    return true;
                }
            }
        }
        return false;
    }

    public function sqlJoin($pairField, $alias, $sql, $joinType='left',
            $where=null)
    {
        if (is_array($alias))
        {
            $ourField = $alias[1];
            $alias = $alias[0];
        }
        else
        {
            $ourField = $this->primaryKey;
        }
        if ($this->hasSqlJoin($sql, $alias))
        {
            return;
        }
        if (is_array($pairField))
        {
            $table = $pairField[0];
            $pairField = $pairField[1];
        }
        else
        {
            $table = $sql->getQuery()->from;
        }

        $joinMethod = $joinType ? $joinType . 'Join' : 'join';

        $sql->{$joinMethod}(
            $this->table . ' AS ' . $alias,
            function ($join) use ($pairField, $ourField, $alias, $where, $table)
            {
                $join->on(
                        $alias . '.' . $ourField,
                        '=',
                        $table . '.' . $pairField);

                if ($where)
                {
                    foreach ($where as $clause)
                    {
                        $join->on(...$clause);
                    }
                }
            });
    }
}
