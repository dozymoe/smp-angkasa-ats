<?php

namespace App\Extensions;


trait ModelSerialization
{
    /**
     * Get primary keys.
     */
    public function getId()
    {
        if (method_exists($this, 'getKeyNames'))
        {
            return array_map(
                    function($keyName)
                    {
                        return $this->{$keyName};
                    },
                    $this->getKeyNames());
        }
        return $this->{$this->getKeyName()};
    }

    /**
     * Get serialized primary keys
     */
    public function getIdEncoded()
    {
        $id = $this->getId();
        if (empty($id))
        {
            return '';
        }
        else if (is_array($id))
        {
            return base64_encode(implode(',', array_map(
                    function($value)
                    {
                        return $value ? (string)$value : '';
                    },
                    $id)));
        }
        return (string)$id;
    }

    /**
     * Borrowing the mixin to store this function.
     */
    function titleCase($text)
    {
        if (!$text) return '';
        // Fix replace roman numerals, for example: Vii -> VII
        return preg_replace_callback(
                '/\b([LXIVCDM])([lxivcdm]+)\b/',
                function ($match)
                {
                    return $match[1] . strtoupper($match[2]);
                },
                ucwords(strtolower($text)));
    }
}
