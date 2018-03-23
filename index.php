<?php

    require_once 'vendor/autoload.php';

    use Feri\Multiplication\Exception\MultiplicationException;
    use Feri\Multiplication\Service\ProcessType;
    use Feri\Multiplication\Service\InputProcessor;

    try {
        if (php_sapi_name() !== "cli") {
            throw new MultiplicationException('Only Command Line allowed');
        }

        $stdin = fopen('php://stdin', 'r');
        $loop = true;
        while ($loop) {
            $inpuProcessType = InputProcessor::getInput("Enter Process type (allowed 'primes' , 'multiplication'): ");
            $inputMaxNumber = InputProcessor::getInput("Enter Max Number: ");
            if (empty($inpuProcessType) || empty($inputMaxNumber)) {
                throw new MultiplicationException('Invalid or missing input params');
            }
            $table = new LucidFrame\Console\ConsoleTable();
            $table = (new ProcessType($inpuProcessType))->getInstance()->process($table, $inputMaxNumber);
            $table->setPadding(2)->display();
        }
    } catch(\Throwable $e) {
        echo $e->getMessage();
    }
?>
