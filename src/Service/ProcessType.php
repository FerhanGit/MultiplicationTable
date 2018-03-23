<?php
namespace Feri\Multiplication\Service;

use Feri\Multiplication\Exception\MultiplicationException;
use Feri\Multiplication\Service\ProcessPrimes;
use Feri\Multiplication\Service\ProcessMultiplication;

class ProcessType
{
    protected $instance = null;

    public function __construct($inpuProcessType)
    {
        switch ($inpuProcessType) {
            case 'primes':
                $this->instance = new ProcessPrimes($table, $inputMaxNumber);
                break;
            case 'multiplication':
                $this->instance = new ProcessMultiplication($table, $inputMaxNumber);
                break;
            default:
                throw new MultiplicationException('Please type any of allowed process types - primes or multiplication!');
        }
    }

    public function getInstance()
    {
        if (is_null($this->instance)) {
            throw new MultiplicationException('Please type any of allowed process types - primes or multiplication!');
        }
        return $this->instance;
    }
}
