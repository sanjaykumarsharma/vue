<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0 shrink-to-fit=no" name="viewport">
        <meta name="csrf-token" content="{{csrf_token()}}">

        {!! SEO::generate(true) !!}

        {{-- <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"> --}}
        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css"  crossorigin="anonymous"> --}}
        {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"> --}}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        @stack('css')

        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- Global Site Tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-72535932-2"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-72535932-2');
        </script>
    </head>
    <body id="body">

        {{-- <noscript id="deferred-styles">
            <link href="{{ asset('css/mobile-nav.min.css') }}" rel="stylesheet">
        </noscript>
        <script type="text/javascript">
        var loadDeferredStyles = function() {
            var addStylesNode = document.getElementById("deferred-styles");
            var replacement = document.createElement("div");
            replacement.innerHTML = addStylesNode.textContent;
            document.body.appendChild(replacement)
            addStylesNode.parentElement.removeChild(addStylesNode);
        };
        var raf = window.requestAnimationFrame || window.mozRequestAnimationFrame ||
            window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
        if (raf) raf(function() { window.setTimeout(loadDeferredStyles, 0); });
        else window.addEventListener('load', loadDeferredStyles);
        </script> --}}

        @include('layouts.header')

        <div class="container-fluid" style="background-color:#FFF">
            @section('banner')
            @show
            <div class="container mt-3">
                <div class="row">
                    <div class="col-md-8 mt-3">
                        @section('content')

                        @show
                    </div>
                    <div class="col-md-4 d-sm-none d-md-block">
                        {{-- in article adds --}}
                        <ins class="adsbygoogle"
                                style="display:block; text-align:center;"
                                data-ad-layout="in-article"
                                data-ad-format="fluid"
                                data-ad-client="ca-pub-3935599736267366"
                                data-ad-slot="2217676837"></ins>
                        <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>

                        <div class="mt-1"></div>

                        <!-- thebignews-sidebar2-image-only -->
                        <ins class="adsbygoogle"
                                style="display:block"
                                data-ad-client="ca-pub-3935599736267366"
                                data-ad-slot="2576749030"
                                data-ad-format="auto"></ins>
                        <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>

                        <div class="mt-1"></div>

                        {{-- <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> --}}
                        <!-- thebignews-sidebar -->
                        {{-- <ins class="adsbygoogle"
                                style="display:block"
                                data-ad-client="ca-pub-3935599736267366"
                                data-ad-slot="5491930252"
                                data-ad-format="auto"></ins>
                        <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>

                        <div class="mt-1"></div> --}}

                        {{-- <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> --}}
                        <!-- thebignews-sidebar-3 -->
                        {{-- <ins class="adsbygoogle"
                            style="display:block"
                            data-ad-client="ca-pub-3935599736267366"
                            data-ad-slot="6167960943"
                            data-ad-format="auto"></ins>
                        <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>

                        <div class="mt-1"></div> --}}

                        {{-- <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> --}}
                        <!-- thebignews-sidebar-4 -->
                        {{-- <ins class="adsbygoogle"
                            style="display:block"
                            data-ad-client="ca-pub-3935599736267366"
                            data-ad-slot="6523184161"
                            data-ad-format="auto"></ins>
                        <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>

                        <div class="mt-1"></div> --}}

                        {{-- <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> --}}
                        <!-- thebignews-sidebar-5 -->
                        {{-- <ins class="adsbygoogle"
                            style="display:block"
                            data-ad-client="ca-pub-3935599736267366"
                            data-ad-slot="1994295108"
                            data-ad-format="auto"></ins>
                        <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                        </script> --}}

                        <div class="mt-1"></div>

                        {{-- <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> --}}
                        <!-- thebignewsinfo-sidebar-6 -->
                        {{-- <ins class="adsbygoogle"
                            style="display:block"
                            data-ad-client="ca-pub-3935599736267366"
                            data-ad-slot="6956522332"
                            data-ad-format="auto"></ins>
                        <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                        </script> --}}
                    </div>
                </div>
            </div>
        </div>

        <footer id="footer">
            <div class="container">
                <div class="copyright">
                    &copy; Copyright <strong>2018</strong>. All Rights Reserved
                </div>
            </div>
        </footer><!-- #footer -->
        <div class="back-to-top" ><i class="fa fa-chevron-up"></i></div>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/superfish/superfish.min.js') }}"></script>
        <script src="{{ asset('js/sticky/sticky.min.js') }}"></script>
        <script src="{{ asset('js/wow/wow.min.js') }}"></script>
        <script src="{{ asset('js/main.min.js') }}"></script>
        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", function() {
             let lazyImages = [].slice.call(document.querySelectorAll("img.lazy"));
             let active = false;

             const lazyLoad = function() {
               if (active === false) {
                 active = true;

                 setTimeout(function() {
                   lazyImages.forEach(function(lazyImage) {
                     if ((lazyImage.getBoundingClientRect().top <= window.innerHeight && lazyImage.getBoundingClientRect().bottom >= 0) && getComputedStyle(lazyImage).display !== "none") {
                       lazyImage.src = lazyImage.dataset.src;
                       lazyImage.srcset = lazyImage.dataset.srcset;
                       lazyImage.classList.remove("lazy");

                       lazyImages = lazyImages.filter(function(image) {
                         return image !== lazyImage;
                       });

                       if (lazyImages.length === 0) {
                         document.removeEventListener("scroll", lazyLoad);
                         window.removeEventListener("resize", lazyLoad);
                         window.removeEventListener("orientationchange", lazyLoad);
                       }
                     }
                   });

                   active = false;
                 }, 200);
               }
             };

             document.addEventListener("scroll", lazyLoad);
             window.addEventListener("resize", lazyLoad);
             window.addEventListener("orientationchange", lazyLoad);
           });
          </script>

        @stack('js')

    </body>

</html>