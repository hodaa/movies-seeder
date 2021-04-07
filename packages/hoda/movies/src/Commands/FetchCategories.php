<?php

namespace Hoda\Movies\Commands;

use Hoda\Movies\Repositories\CategoryRepository;
use Illuminate\Console\Command;
use Hoda\Movies\Jobs\Seeder;

class FetchCategories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'categories:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch categories form third party ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Seeder::dispatch(new CategoryRepository())->onQueue('high');
    }
}
