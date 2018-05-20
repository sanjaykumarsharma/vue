<header>
    <div class="container-fluid" style="padding-top:5px;background-color:#FFF">
        <div class="row">
            <h2 style="padding-left: 20px;"><a href="/">theBIGnews</a></h2>

        </div>

        <div class="row mymenu">
            <div class="hero">
                <div class="hovermenu ttmenu dark-style menu-color-gradient">
                    <div class="navbar-default" role="navigation">
                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li class="dropdown ttmenu-full"><a href="{!! url('/') !!}">Home</a>
                                </li><!-- end mega menu -->
                                <li class="dropdown ttmenu-full"><a href="{!! url('/tags/all') !!}">Tags <b class="dropme"></b></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                        <div class="ttmenu-content">
                                            <div class="row">
                                                @foreach ($tags as $tag)
                                                    <span class="menu-tags"><a href="{!! url('/tag/'.$tag->tag); !!}">{{$tag->tag}}</a></span>
                                                @endforeach
                                            </div><!-- end row -->
                                        </div><!-- end ttmenu-content -->
                                        </li>
                                    </ul>
                                </li><!-- end mega menu -->
                                <li class="dropdown ttmenu-full"><a href="{!! url('/category/blockchain'); !!}">Blockchain</a>
                                </li><!-- end mega menu -->
                                <li class="dropdown ttmenu-full"><a href="{!! url('/category/5g') !!}">Telecome</a>
                                </li><!-- end mega menu -->
                                <li class="dropdown ttmenu-full"><a href="{!! url('/category/business') !!}">Business</a>
                                </li><!-- end mega menu -->
                                {{-- <li class="dropdown ttmenu-full"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Contact <b class="dropme"></b></a>
                                </li><!-- end mega menu --> --}}
                            </ul><!-- end nav navbar-nav -->
                        </div><!--/.nav-collapse -->
                    </div><!-- end navbar navbar-default clearfix -->
                </div><!-- end menu 1 -->
            </div><!-- end hero -->
        </div><!-- /container -->

    </div>
</header>