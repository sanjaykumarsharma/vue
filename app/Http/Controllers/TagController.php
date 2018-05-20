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


class TagController extends Controller
{
    public function index($category)
    {
        $tag = trim($category);
        if(strpos($tag, '&') !== false){
            $tag=str_replace("&","&amp;",$tag);
        }

        SEOMeta::setTitle('The Big News');
        SEOMeta::setDescription('This is my page description');
        SEOMeta::setCanonical('www.thebignews.info');

        OpenGraph::setDescription('This is my page description');
        OpenGraph::setTitle('The Big News');
        OpenGraph::setUrl('www.thebignews.info');
        OpenGraph::addProperty('type', 'articles');

        Twitter::setTitle('Homepage');
        Twitter::setSite('@LuizVinicius73');

        $feeds = DB::table('posts')->where('category', 'like', '%'.$tag.'%')->orderBy('id', 'desc')->paginate(10);
        if($feeds->isEmpty()){
            $feeds = DB::table('posts')->where('category', 'like', '%'.trim($category).'%')->orderBy('id', 'desc')->paginate(10);
            return view('tag' , ['feeds'=>$feeds]);
        }else{
            return view('tag' , ['feeds'=>$feeds]);
        }
    }

    public function category($category)
    {
        $tag = trim($category);
        if(strpos($tag, '&') !== false){
            $tag=str_replace("&","&amp;",$tag);
        }

        SEOMeta::setTitle('The Big News');
        SEOMeta::setDescription('This is my page description');
        SEOMeta::setCanonical('www.thebignews.info');

        OpenGraph::setDescription('This is my page description');
        OpenGraph::setTitle('The Big News');
        OpenGraph::setUrl('www.thebignews.info');
        OpenGraph::addProperty('type', 'articles');

        Twitter::setTitle('Homepage');
        Twitter::setSite('@LuizVinicius73');

        $feeds = DB::table('posts')->where('tag', '=', $tag)->orderBy('id', 'desc')->paginate(10);
        if($feeds->isEmpty()){
            $feeds = DB::table('posts')->where('tag', '=', trim($category).'%')->orderBy('id', 'desc')->paginate(10);
            return view('tag' , ['feeds'=>$feeds]);
        }else{
            return view('tag' , ['feeds'=>$feeds]);
        }
    }

    public function categoryPage($category)
    {
        dd($category);
    }

    public function tagsPage(){
        SEOMeta::setTitle('The Big News');
        SEOMeta::setDescription('This is my page description');
        SEOMeta::setCanonical('www.thebignews.info');

        OpenGraph::setDescription('This is my page description');
        OpenGraph::setTitle('The Big News');
        OpenGraph::setUrl('www.thebignews.info');
        OpenGraph::addProperty('type', 'articles');

        Twitter::setTitle('Homepage');
        Twitter::setSite('@LuizVinicius73');

        $tags = Tag::all();
        return view('tagsPage' , ['tags'=>$tags]);
    }
}