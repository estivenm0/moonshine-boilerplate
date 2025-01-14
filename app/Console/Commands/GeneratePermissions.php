<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GeneratePermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'moonshine:generate-permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates the permissions for the resources specified in the handle method by executing multiple related commands.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // $this->call('moonshine-rbac:permissions', [
        //     'resourceName' => ''
        // ]);

        // $this->call('moonshine-rbac:permissions', [
        //     'resourceName' => ''
        // ]);
    }
}
