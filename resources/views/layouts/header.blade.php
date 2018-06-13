<!--==========================
    Top Bar
  ============================-->
  <section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
      <div class="contact-info float-left">
        <i class="fa fa-envelope-o"></i> <a href="mailto:contact@thebignews.com">contact@thebignews.com</a>
        {{-- <i class="fa fa-phone"></i> +1 5589 55488 55 --}}
      </div>
      <div class="social-links float-right">
        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
        <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
        <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
        <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
      </div>
    </div>
  </section>

<!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">

        <div id="logo" class="pull-left">
        <h1><a href="{!! url('/') !!}" class="scrollto">the<span>BIG</span>news</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
        </div>

        <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li class="menu-active"><a href="{!! url('/') !!}">Home</a></li>
                <li><a href="{!! url('/category/blockchain'); !!}">Blockchain</a></li>
                <li><a href="{!! url('/category/5g') !!}">Telecom</a></li>
                <li><a href="{!! url('/category/business') !!}">Business</a></li>
                <li><a href="{!! url('/tags/all') !!}">Tags</a></li>
                {{-- <li class="menu-has-children"><a href="">Drop Down</a>
                <ul>
                    <li><a href="#">Drop Down 1</a></li>
                    <li><a href="#">Drop Down 3</a></li>
                    <li><a href="#">Drop Down 4</a></li>
                    <li><a href="#">Drop Down 5</a></li>
                </ul>
                </li> --}}
                <li><a href="{!! url('/contact/help-desk') !!}">Contact</a></li>
            </ul>
        </nav><!-- #nav-menu-container -->
    </div>
</header><!-- #header -->