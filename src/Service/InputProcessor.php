<?php
namespace Feri\Multiplication\Service;

class InputProcessor
{
    public static function getInput($msg)
    {
        fwrite(STDOUT, "$msg: ");
        $varin = trim(fgets(STDIN));
        return $varin;
    }

}