<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Tag;

use Feeds;
use SEOMeta;
use OpenGraph;
use Twitter;
## or
use SEO;

class PostController extends Controller
{
    public function index()
    {
        SEOMeta::setTitle('The Big News');
        SEOMeta::setDescription('This is my page description');
        SEOMeta::setCanonical('www.thebignews.info');

        OpenGraph::setDescription('This is my page description');
        OpenGraph::setTitle('The Big News');
        OpenGraph::setUrl('www.thebignews.info');
        OpenGraph::addProperty('type', 'articles');

        Twitter::setTitle('Homepage');
        Twitter::setSite('@LuizVinicius73');

        $feeds = DB::table('posts')->orderBy('id', 'desc')->paginate(10);
        return view('home', ['feeds' => $feeds]);
    }

    public function details($slug)
    {
        $feed = DB::table('posts')->where('slug', '=' , $slug)->first();

        if ($feed != null) {

            SEOMeta::setTitle($feed->title);
            SEOMeta::setDescription(substr($feed->description,0,300));
            SEOMeta::addMeta('article:published_time', $feed->pub_date, 'property');
            SEOMeta::addMeta('article:section', $feed->slug, 'property');
            //SEOMeta::addKeyword(['key1', 'key2', 'key3']);

            OpenGraph::setDescription(substr($feed->description,0,300));
            OpenGraph::setTitle($feed->title);
            OpenGraph::setUrl('http://thebignews.info');
            OpenGraph::addProperty('type', 'article');
            OpenGraph::addProperty('locale', 'pt-br');
            OpenGraph::addProperty('locale:alternate', ['pt-pt', 'en-us']);

            //OpenGraph::addImage($feed->cover->url);
            //OpenGraph::addImage($feed->images->list('url'));
            //OpenGraph::addImage(['url' => 'http://image.url.com/cover.jpg', 'size' => 300]);
            //OpenGraph::addImage('http://image.url.com/cover.jpg', ['height' => 300, 'width' => 300]);

            // Namespace URI: http://ogp.me/ns/article#
            // article
            OpenGraph::setTitle('Article')
                ->setDescription($feed->description)
                ->setType('article')
                ->setArticle([
                    'published_time' => $feed->pub_date,
                    'modified_time' => $feed->pub_date,
                    'expiration_time' => 'datetime',
                    'author' => '',
                    'section' => '',
                    'tag' => ''
                ]);


            return view('details', ['feed' => $feed]);
        }else{
            return redirect()->action('PostController@index');
        }
    }

    public function store(Request $request)
    {
        /*
        $feed = Feeds::make(['http://databridgemarketresearch.com/feed',
        'http://www.qyreports.com/feed/',
        '']);
        */

        // id= 14250;


        //  $feeds = DB::table('posts')
        //         ->orderBy('id')
        //         ->offset(1000)
        //         ->limit(200)
        //         ->get();

        // foreach($feeds as $feed){
        //     echo $feed->id; echo '<br>'; echo $feed->image; echo '<br>';
        //     if(strlen($feed->image)>0){
        //         if (false === ($data = @file_get_contents($feed->image))) {
        //         } else {
        //             $content = file_get_contents($feed->image);
        //             file_put_contents("images/post-image/".$feed->slug.".jpg", $content);
        //         }
        //     }
        // }

        $feed = Feeds::make(['https://cointelegraph.com/feed']);
        $items= $feed->get_items();
        $this->createFeed($items,'blockchain');

        $feed = Feeds::make(['http://www.lteto5g.com/feed/']);
        $items= $feed->get_items();
        $this->createFeed($items,'5g');

        $feed = Feeds::make(['http://www.abnewswire.com/pressreleases/feed']);
        $items= $feed->get_items();
        $this->createFeed($items,'business');

        $feed = Feeds::make(['https://www.techradar.com/rss']);
        $items= $feed->get_items();
        $this->createFeed($items,'technology');



        $feed = Feeds::make(['http://www.abnewswire.com/pressreleases/feed']);
        $items= $feed->get_items();
        $this->createFeed($items,'business');



    }

    public function createFeed($items,$tag){
        // $t=Post::all()->pluck('category')->toArray();
        // foreach($t as $k){
        //      $a=explode(',',$k);
        //      foreach($a as $v){
        //         $tag_in_tags_table = Tag::where('tag', '=', trim($v))->first();
        //                 if($tag_in_tags_table === null){//check if tag is not there
        //                     Tag::create([
        //                          'tag' => trim($v)
        //                      ]);
        //                 }
        //      }
        // }

        // dd('ok');

        foreach($items as $item){
            $slug = explode("/",$item->get_permalink());

            $slug_text='';
            if(strlen($slug[sizeof($slug)-1])>0){
                $slug_text_temp = $slug[sizeof($slug)-1];
                if(strlen($slug_text_temp)>191){
                    $slug_text = substr($slug_text_temp, 0, 191);
                }else{
                    $slug_text = $slug_text_temp;
                }
                $feed = Post::where('slug', '=', $slug_text)->first();
            }else{
                $slug_text_temp = $slug[sizeof($slug)-2];
                if(strlen($slug_text_temp)>191){
                    $slug_text = substr($slug_text_temp, 0, 191);
                }else{
                    $slug_text = $slug_text_temp;
                }
                $feed = Post::where('slug', '=', $slug_text)->first();
            }


            $author = '';
            $feed_category='';
            $img_link = '';



            if ($feed === null) {
                //author
                if ($author = $item->get_author())
                {
                    $author = $author->get_name();
                }
                //category

                if(count($item->get_categories())>0){
                    foreach ($item->get_categories() as $c)
                    {
                        if($feed_category==''){
                            $feed_category = trim($c->get_label());
                        }else{
                            $feed_category = $feed_category .','. trim($c->get_label());
                        }

                        $tag_in_tags_table = Tag::where('tag', '=', trim($c->get_label()))->first();
                        if($tag_in_tags_table === null){//check if tag is not there
                            Tag::create([
                                 'tag' => trim($c->get_label())
                             ]);
                        }

                    }
                }
                //$item->get_date();

                //image
                if ($item->get_enclosure()->get_link())
                {
                    $img_link = $item->get_enclosure()->get_link();

                    // preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $item->get_enclosure()->get_link(), $image);
                    // if(isset($image['src'])){
                    //     if (strpos($image['src'], 'www.') !== false || strpos($image['src'], 'http')!== false) {
                    //         if (strpos($image['src'], '.jpeg')!== false || strpos($image['src'], '.jpg')!== false || strpos($image['src'], '.gif')!== false || strpos($image['src'], '.png')!== false) {
                    //             $img_link = $image['src'];
                    //         }else{
                    //             $img_link = '';
                    //         }
                    //     }else{
                    //         $img_link = '';
                    //     }
                    // }else{
                    //     $img_link = '';
                    // }

                }else{
                    preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $item->get_content(), $image);
                    if(isset($image['src'])){
                        if (strpos($image['src'], 'www.') !== false || strpos($image['src'], 'http')!== false) {
                            if (strpos($image['src'], '.jpeg')!== false || strpos($image['src'], '.jpg')!== false || strpos($image['src'], '.gif')!== false || strpos($image['src'], '.png')!== false) {
                                $img_link = $image['src'];
                            }else{
                                $img_link = '';
                            }
                        }else{
                            $img_link = '';
                        }
                    }else{
                        $img_link = '';
                    }
                }

                if($feed_category==''){
                    $feed_category = $tag;
                }

                $c = Post::create([
                    'title' => $item->get_title(),
                    'link' => $item->get_permalink(),
                    'pub_date' => $item->get_date('j F Y | g:i a'),
                    'description' => $item->get_description(),
                    'content' => $item->get_content(),
                    'slug' => $slug_text,
                    'author' => $author,
                    'category' => $feed_category,
                    'image' => $img_link,
                    'tag' => $tag,
                ]);

                // if(strlen($img_link)>0){

                //     if(file_get_contents($img_link)){
                //         $content = file_get_contents($img_link);
                //         file_put_contents("images/post-image/".$slug_text.".jpg", $content);
                //     }
                // }

                if(strlen($img_link)>0){
                    if (false === ($data = @file_get_contents($img_link))) {
                    } else {
                        $content = file_get_contents($img_link);
                        file_put_contents("images/post-image/".$slug_text.".jpg", $content);
                    }
                }

            }

        }
        echo 'feeds are updated: '. $tag. '<br>';


        //code for adding missing tags


    }


}
