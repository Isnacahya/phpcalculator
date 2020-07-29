<?php

namespace Jakmall\Recruitment\Calculator\History\Infractructure;

interface CommandHistoryManagerInterface
{
    /**
     * * Returns array of command history.
     *
     * @return array
     */

     public function findAll():array;


     public function log($command) : bool;

     public function clearAll(): bool;
}
