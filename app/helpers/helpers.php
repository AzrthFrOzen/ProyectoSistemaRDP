<?php

if (! function_exists('myEcho'))
{
    function myEcho($content)
    {
        echo "<pre>", print_r($content), "</pre>";
    }

    if (! function_exists('myEnv'))
    {
        function myEnv($key, $default = null)
        {
            if (array_key_exists($key, $_ENV)) {
                return $_ENV[$key];
            } else {
                return $default;
            }
        }
        
    }

    if (!function_exists('selected')) {
        function selected($id_current, $id_new)
        {
            if ($id_current == $id_new) {
                return 'selected=selected';
            } else {
                return '';
            }
        }
    }

    if (!function_exists('checked')) {
        function checked($estado)
        {
            if ($estado) {
                return 'checked=checked';
            } else {
                return '';
            }
        }
    }
}