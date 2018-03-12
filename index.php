<?php

    require_once 'vendor/autoload.php';

    use Feri\Multiplication\MultiplicationTable;

    if (php_sapi_name() !== "cli") {
        throw new \Exception('Only Command Line allowed');
    }

    function getInput($msg){
        fwrite(STDOUT, "$msg: ");
        $varin = trim(fgets(STDIN));
        return $varin;
    }

    $stdin = fopen('php://stdin', 'r');

    $loop = true;
    while ($loop) {
        $input = getInput("Enter Max Number: ");
        $data = [];
        for ($i = 1; $i <= $input; $i++) {
            $rowData = [];
            for ($j = 2; $j <= $input; $j++) {
                $rowData[] = $i * $j;
            }
            $data[] = array_merge([$i], $rowData);
        }
        $renderer = new MultiplicationTable($data);
        echo $renderer->getTable();
    }

?>
