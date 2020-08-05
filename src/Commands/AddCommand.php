<?php

namespace Jakmall\Recruitment\Calculator\Commands;

use Illuminate\Console\Command;

class AddCommand extends Command
{

    protected $signature;

    protected $description;

    public function __construct()
    {
        $command = $this->getCommand();

        $this->signature = sprintf(
            '%s {numbers* : The numbers to be %s}',
            $command,
            $this->getCommand1()
        );
        $this->description = sprintf('%s all given number', ucfirst($command));
    }

    public function getCommand(): string{
        return 'add';
    }

    public function getCommand1(): string{
        return 'added';
    }

    public function handle(): void {
        $number = $this->getInput();
        $description = $this->generateCalculate($number);
        $result = $this->calculateAll($number);

        $this->comment(sprintf('%s = %s', $description, $result));

    }

    protected function getInput(): array{
        return $this->argument('number');
    }

    protected function generateCalculate(array $number): string {
        $operator = $this->getOperator();
        $a = sprintf('%s', $operator);

        return implode($a, $number);
    }

    protected function getOperator(): string {
        return '+';
    }

    protected function calculateAll(array $numbers)
    {
        $number = array_pop($numbers);

        if (count($number) <= 0){
            return $number;
        }
        return $this->calculate($this->calculateAll($numbers), $number);
    }

    protected function calculate($number1, $number2) {
        return $number1 + $number2;
    }
}


?>
