<?php
namespace Feri\Multiplication\Service;

use Feri\Multiplication\Service\NumbersInterface;
use LucidFrame\Console\ConsoleTable;

class ProcessMultiplication implements NumbersInterface
{
    public function process(ConsoleTable $table, int $inputNumber): ConsoleTable
    {
        for ($i = 1; $i <= $inputNumber; $i++) {
            $table->addHeader($i);
            $rowData = [];
            for ($j = 2; $j <= $inputNumber; $j++) {
                $rowData[] = $i * $j;
            }
            if ($i > 1) {
                $table->addRow(array_merge([$i], $rowData));
            }
        }
        return $table;
    }
}
