<?php

    require_once 'vendor/autoload.php';

    use Feri\Multiplication\Exception\MultiplicationException;
    use Feri\Multiplication\Service\InputProcessor;

    if (php_sapi_name() !== "cli") {
        throw new MultiplicationException('Only Command Line allowed');
    }

    $stdin = fopen('php://stdin', 'r');
    $loop = true;
    while ($loop) {
        $input = InputProcessor::getInput("Enter Max Number: ");
        $table = new LucidFrame\Console\ConsoleTable();
        $data = [];
        for ($i = 1; $i <= $input; $i++) {
            $table->addHeader($i);
            $rowData = [];
            for ($j = 2; $j <= $input; $j++) {
                $rowData[] = $i * $j;
            }
            if ($i > 1) {
                $table->addRow(array_merge([$i], $rowData));
            }
        }
        $table ->setPadding(2)->display();
    }
?>
