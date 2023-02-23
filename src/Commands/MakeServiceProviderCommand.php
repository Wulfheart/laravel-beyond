<?php

namespace AkrilliA\LaravelBeyond\Commands;

use Illuminate\Console\Command;

class MakeServiceProviderCommand extends Command
{
    protected $signature = 'beyond:make:provider {name} {--force}';

    protected $description = 'Create a new service provider';

    public function handle(): void
    {
        try {
            $name = $this->argument('name');
            $force = $this->option('force');

            beyond_copy_stub(
                'service.provider.stub',
                base_path()."/modules/{$module}/App/{$name}.php",
                [
                    '{{ className }}' => $name,
                ],
                $force
            );

            $this->components->info('Service provider created.');
        } catch (\Exception $e) {
            $this->components->error($e->getMessage());
        }
    }
}
