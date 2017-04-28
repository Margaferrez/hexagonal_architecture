<?php


namespace Application\Command;


interface CommandBusInterface
{
    public function execute(CommandInterface $command);
}