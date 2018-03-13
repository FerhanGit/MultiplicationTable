<?php

namespace Feri\Multiplication\Tests;

use PHPUnit\Framework\TestCase;
use ReflectionClass;
use \LucidFrame\Console\ConsoleTable;
use Feri\Multiplication\Exception\MultiplicationException;

class MultiplicationTableTest extends TestCase
{
    private $consoleTable = null;

    protected function setUp()
    {
        $this->consoleTable = new ConsoleTable();
    }

    /**
     * @return array
     */
    public function dataProvider()
    {
        $userInput = 5;
        $rows = [];
        $headers = range(1, $userInput);

        for ($i = 1; $i <= $userInput; $i++) {
            $multiplicationData = [];
            for ($j = 2; $j <= $userInput; $j++) {
                $multiplicationData[] = $i * $j;
            }
            $rows[] = array_merge([$i], $multiplicationData);
        }

        return [[$headers, $rows]];
    }


    /**
     * @dataProvider dataProvider
     */
    public function testCreateNewTable($headers, $rows)
    {
        $this->consoleTable->setHeaders($headers);
        foreach ($rows as $row) {
            $this->consoleTable->addRow($row);
        }
        $expectedOutput = "+---+----+----+----+----+\n";
        $expectedOutput .= "| 1 | 2  | 3  | 4  | 5  |\n";
        $expectedOutput .= "+---+----+----+----+----+\n";
        $expectedOutput .= "| 1 | 2  | 3  | 4  | 5  |\n";
        $expectedOutput .= "| 2 | 4  | 6  | 8  | 10 |\n";
        $expectedOutput .= "| 3 | 6  | 9  | 12 | 15 |\n";
        $expectedOutput .= "| 4 | 8  | 12 | 16 | 20 |\n";
        $expectedOutput .= "| 5 | 10 | 15 | 20 | 25 |\n";
        $expectedOutput .= "+---+----+----+----+----+\n";

        $this->assertInstanceOf('\LucidFrame\Console\ConsoleTable', $this->consoleTable);
        $result = $this->consoleTable->getTable();
        $this->assertEquals(trim($expectedOutput), trim($result));
    }
}
