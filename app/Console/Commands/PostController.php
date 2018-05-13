<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Post;
use Feeds;

class PostController extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'PostController:addFeeds';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {

        $feed = Feeds::make(['http://databridgemarketresearch.com/feed',
                             'http://www.qyreports.com/feed/']);
        //dd($feed->get_items());
        //'', '', '', 'published_at', '', '', ''
        $items= $feed->get_items();

        foreach($items as $item){
            $slug = explode("/",$item->get_permalink());

            $post = Post::where('slug', '=', $slug[sizeof($slug)-2])->first();
            if ($post === null) {
                $c = Post::create([
                    'title' => $item->get_title(),
                    'link' => $item->get_permalink(),
                    'pub_date' => $item->get_date('j F Y | g:i a'),
                    'description' => $item->get_description(),
                    'content' => $item->get_content(),
                    'slug' => $slug[sizeof($slug)-2],
                ]);
            }

        }
        //echo 'feeds are updated';

    }
}
