<?php

namespace Infrastructure\CommandBus;

use Application\Command\CommandBusInterface;
use Application\Command\CommandHandlerInterface;
use Application\Command\CommandInterface;
use Exception;

class SynchronousCommandBus implements CommandBusInterface
{
    /** @var CommandHandlerInterface[] */
    private $handlers = [];

    public function execute(CommandInterface $command)
    {
        $commandName = get_class($command);

        // We'll need to check if the Command that's given
        // is actually registered to be handled here.
        if (!array_key_exists($commandName, $this->handlers)){
            throw new Exception("{$commandName} is not supported by the SynchronousCommandBus.");
        }

        return $this->handlers[$commandName]->handle($command);
    }

    // Now all we need is a function to register handlers
    public function register($commandName, CommandHandlerInterface $commandHandler)
    {
        $this->handlers[$commandName] = $commandHandler;

        return $this;
    }
}