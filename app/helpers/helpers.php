<?php

if (! function_exists('myEcho'))
{
    function myEcho($content)
    {
        echo "<pre>", print_r($content), "</pre>";
    }
}