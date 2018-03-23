<?php

namespace Feri\Multiplication\Service;

use LucidFrame\Console\ConsoleTable;

interface NumbersInterface
{
    public function process(ConsoleTable $table, int $inputNumber): ConsoleTable;
}