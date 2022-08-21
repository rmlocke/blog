<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;
use App\Models\Rss;

class GetRssFeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getrssfeed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get posts from an rss feed';

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
        $feedReader = new Rss();
    
        $items = $feedReader->get();
    
        if (!empty($items)) {
            foreach($items as $item) {
                //check we don't already have this
                $posts = Post::where('title', $item->title)->get();
    
                if ($posts->isEmpty()) {
                    $post = new Post([
                        'user_id' => 0,
                        'title' => $item->title,
                        'content' => $item->description
                    ]);
            
                    $post->save();
                }
            }
        }
        return 0;
    }
}
