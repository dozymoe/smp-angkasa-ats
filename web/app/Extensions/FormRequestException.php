<?php

namespace App\Extensions;

use Illuminate\Database\QueryException;


trait FormRequestException
{
    public function handleSQLException(QueryException $e)
    {
        $validator = $this->getValidatorInstance();
        $fields = array_keys($this->rules());

        // Duplicate unique fields
        if ($e->getCode() == 23505)
        {
            foreach ($fields as $field)
            {
                if (strpos($e->getMessage(), '(' . $field . ')') !== false)
                {
                    $validator->errors()->add($field,
                            $field . " sudah terdaftar.");
                    return back()->withInput()->withErrors($validator);
                }
            }
        }
        // Not null fields
        else if ($e->getCode() == 23502)
        {
            foreach ($fields as $field)
            {
                if (strpos($e->getMessage(), 'column "' . $field . '"')
                        !== false)
                {
                    $validator->errors()->add($field,
                            $field . " tidak boleh kosong.");
                    return back()->withInput()->withErrors($validator);
                }
            }
        }
        throw $e;
    }
}
