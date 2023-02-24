<?php

namespace AkrilliA\LaravelBeyond\Commands;

use AkrilliA\LaravelBeyond\Commands\Abstracts\DomainCommand;

class MakeDataTransferObjectCommand extends DomainCommand
{
    protected $signature = 'beyond:make:dto {name} {--force}';

    protected $description = 'Make a new data transfer object';

    protected function getStub(): string
    {
        return 'data-transfer-object.stub';
    }

    public function getType(): string
    {
        return 'DataTransferObject';
    }
}
