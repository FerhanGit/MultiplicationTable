<?php
namespace Feri\Multiplication\Service;

use Feri\Multiplication\Exception\MultiplicationException;
use LucidFrame\Console\ConsoleTable;

class ProcessPrimes implements NumbersInterface
{
    public function process(ConsoleTable $table, int $inputNumber): ConsoleTable
    {
        $primeNumbers = $this->getPrimeNumbers($inputNumber);
        if (!is_array($primeNumbers)) {
            throw new MultiplicationException('Can not find the first ' . $inputNumber . ' prime numbers');
        }
        foreach ($primeNumbers as $primeNumber) {
            $table->addHeader($primeNumber);
            $rowData = [];
            for ($j = 1; $j < count($primeNumbers); $j++) {
                $rowData[] = $primeNumbers[$j] * $primeNumber;
            }
            $table->addRow(array_merge([$primeNumber], $rowData));
        }
        return $table;
    }


    /**
     * Returns first N-prime numbers
     *
     * @param $countPrimes
     * @return array
     */
    private function getPrimeNumbers($countPrimes)
    {
        $primeNumbers = [];
        $i = 0;
        while (count($primeNumbers) <= $countPrimes) {
            $i = gmp_nextprime($i);
            $primeNumbers[] =  $i;
        }

        return $primeNumbers;
    }
}
