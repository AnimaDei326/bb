<?php
/**
 * Created by PhpStorm.
 * User: Эльзара
 * Date: 29.01.2019
 * Time: 13:57
 */


function autoload($className)
{
    $filename = str_replace('\\', '/', $className) . '.php';
    if(file_exists($filename))
    {
        require_once $filename;
    }
}

spl_autoload_register('autoload');