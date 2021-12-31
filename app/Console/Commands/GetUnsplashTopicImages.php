<?php

namespace App\Console\Commands;

use App\Mail\SuccessUnsplashMail;
use App\Models\Category;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class GetUnsplashTopicImages extends Command
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
        try {
            $topic = Http::get('https://api.unsplash.com/topics/' . $this->argument('topic_slug') . '?client_id=' . env('unsplash_client_id'))->json();
            $response = Http::get('https://api.unsplash.com/topics/' . $this->argument('topic_slug') . '/photos?per_page=100&client_id=' . env('unsplash_client_id'))->json();
            if(!isset($topic['title'])) {
                $this->error('Topic not found');
                return 1;
            }

            $this->info("Loading images for topic: " . $topic['title']);

            $category = Category::firstOrCreate(['name' => $topic['title']]);
            $this->output->progressStart(count($response));

            DB::transaction(function () use ($response, $category) {
                for ($i = 0; $i < count($response); $i++) {
                    $image = array_push($response[$i], ['uid' => $response[$i]['id']]);

                    $image = $category->images()->updateOrCreate([
                        'uid' => $response[$i]['id'],
                    ], $response[$i]);

                    foreach ($response[$i]['urls'] as $key => $value) {
                        $image->urls()->updateOrCreate([
                            'type' => $key,
                            'url' => $value,
                        ], [
                            'type' => $key,
                            'url' => $value
                        ]);
                    }

                    $this->output->progressAdvance();
                }
                Mail::to(env('ADMIN_EMAIL'))->send(new SuccessUnsplashMail());
            });

            $this->output->progressFinish();
            $this->info("Finished successfully");
        } catch (\Exception $e) {
            $this->error("Error: " . $e->getMessage());
        }
    }
}
