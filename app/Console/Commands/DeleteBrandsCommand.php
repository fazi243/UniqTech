<?php

namespace App\Console\Commands;

use App\Models\Brand;
use Illuminate\Console\Command;

class DeleteBrandsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:brands';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'delete all entries from table';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        Brand::truncate();
    }
}
