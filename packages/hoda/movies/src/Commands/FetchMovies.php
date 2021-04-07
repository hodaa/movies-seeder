<?php

namespace Hoda\Movies\Commands;

use Hoda\Movies\Jobs\Seeder;
use Hoda\Movies\Repositories\MovieRepository;
use Illuminate\Console\Command;

class FetchMovies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'movies:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch movies form third party ';

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
        Seeder::dispatch(new MovieRepository())->onQueue('high');
    }
}
