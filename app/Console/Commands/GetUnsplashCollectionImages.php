<?php

namespace App\Console\Commands;

use App\Models\Category;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GetUnsplashCollectionImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'topic:get {topic_slug}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get unsplash topic images';

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

        $topic = Http::get('https://api.unsplash.com/topics/'.$this->argument('topic_slug').'?client_id='. env('unsplash_client_id'))->json();
        $response = Http::get('https://api.unsplash.com/topics/'.$this->argument('topic_slug').'/photos?per_page=100&client_id='. env('unsplash_client_id'))->json();
        $this->info("Loading images for topic: ".$topic['title']);
        $category = Category::firstOrCreate(['name' => $topic['title']]);
        $this->output->progressStart(count($response));

        for ($i = 0; $i < count($response); $i++) {
            $category->images()->create($response[$i]);

            $this->output->progressAdvance();
        }

        $this->output->progressFinish();
        $this->info("Finished successfully");


    }
}
