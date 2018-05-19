<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

use App\Tag;

class MenuTagComposer
{

    public function compose(View $view)
    {
        $view->with('tags', $tags = Tag::all());
    }
}