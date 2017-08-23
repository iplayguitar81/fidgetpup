@extends('layout')
<div id="fb-root"></div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7&appId=1761968547353236";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

@section('title', $post->title)
@section('content')


    @php
        $game_date = new DateTime($post->created_at, new DateTimeZone('America/Los_Angeles'));
        $game_date = date_sub($game_date, date_interval_create_from_date_string('3 hour'));
        $game_date = $game_date->format('M jS Y');
    @endphp
<div class="row">
    <div class="col-md-12">

    <article class="center-block">
        <h1 class="article-title-show" style="">{{ $post->title }}</h1>
        <p class="subheader-main Bebas">{{ $post->subHead}}</p>

        <p class="uk-article-meta" style="text-align:center;">
            Written by <?
            //below is one way to get the name of the author.....
            ?>

           @if($post->user_id != null)
            <? $author = App\User::find($post->user_id)->name; ?>

            {{$author}}
            @endif
            {{--@foreach($records as $record)--}}
            {{--{{$record->name}}--}}
            {{--@endforeach--}}
            on {{ $game_date }}
        </p>
        <ul class="share-buttons">
            <li><a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Ftrailblazersfans.com&t=" title="Share on Facebook" target="_blank" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(document.URL) + '&t=' + encodeURIComponent(document.URL)); return false;"><img alt="Share on Facebook" src="{{url('images/Facebook.png')}}"></a></li>
            <li><a href="https://twitter.com/intent/tweet?source=https%3A%2F%2Ftrailblazersfans.com&text=:%20https%3A%2F%2Ftrailblazersfans.com&via=tblazersfans" target="_blank" title="Tweet" onclick="window.open('https://twitter.com/intent/tweet?text=' + encodeURIComponent(document.title) + ':%20'  + encodeURIComponent(document.URL)); return false;"><img alt="Tweet" src="{{url('images/Twitter.png')}}"></a></li>
            <li><a href="https://plus.google.com/share?url=https%3A%2F%2Ftrailblazersfans.com" target="_blank" title="Share on Google+" onclick="window.open('https://plus.google.com/share?url=' + encodeURIComponent(document.URL)); return false;"><img alt="Share on Google+" src="{{url('images/Google+.png')}}"></a></li>
            <li><a href="http://www.tumblr.com/share?v=3&u=https%3A%2F%2Ftrailblazersfans.com&t=&s=" target="_blank" title="Post to Tumblr" onclick="window.open('http://www.tumblr.com/share?v=3&u=' + encodeURIComponent(document.URL) + '&t=' +  encodeURIComponent(document.title)); return false;"><img alt="Post to Tumblr" src="{{url('images/Tumblr.png')}}"></a></li>
            <li><a href="http://www.reddit.com/submit?url=https%3A%2F%2Ftrailblazersfans.com&title=" target="_blank" title="Submit to Reddit" onclick="window.open('http://www.reddit.com/submit?url=' + encodeURIComponent(document.URL) + '&title=' +  encodeURIComponent(document.title)); return false;"><img alt="Submit to Reddit" src="{{url('images/Reddit.png')}}"></a></li>
        </ul>
        <br/>
        <p class="uk-article-lead"><img class="img-responsive center-block" src='{{"../../images/". $post->imgPath}}'></p>

        <br/>
        <div class="center-block text-center">
       <div class="article-texterson2"> {!! ($post->body) !!} </div>
            @if(($post->images->count() > 0 ))
            <div class="container">
                <h2 class='Bebas'>article gallery</h2>
                    <br/>
                {{--<div class="customNavigation">--}}
                {{--<a class="btn prev btn-danger">Previous</a>--}}
                {{--<a class="btn next btn-danger">Next</a>--}}
                {{--</div>--}}
                <ul class="owl-carousel">
                    @foreach($post->images as $image)

                        {{--*/ @ $pathy =$image->file_path  /*--}}

                        {{--*/ @ list($width, $height) = getimagesize($pathy) /*--}}

                        {{--*/ @ $dimensions =$width.'x'.$height  /*--}}

                        {{--*/ $thumb_path= substr($image->file_path, 7);/*--}}
                        <li class="owl-trick">
                            <a href="{{url($image->file_path)}}" data-size="{{$dimensions}}" data-title="{{$image->caption}}">
                                <img class="img-responsive" src="{{url('images/thmb-'.$thumb_path)}}" alt="1"></a></li>
                    @endforeach

                </ul>

            </div>
                @endif
                    </div>

    </article>



        <br/>
    </div>

    <div class="col-md-12">

        <h2 id="fb-comments-show" class="text-center Bebas" >leave a facebook comment!</h2>
        <div class="fb-comments center-block" data-href="https://www.trailblazersfans.com/posts/{{$post->id}}/{{str_slug($post->title)}}" data-numposts="10"></div>

        <br/>

        <div class="buttons-show">


        <button type="submit" class="btn center-block btn-md" onclick="window.location='{{url('/news')}}';" >Back to All News</button>

   &nbsp;
    <a href="{{url('/')}}">

        <button type="submit" class="btn btn-danger center-block btn-md">Back Home</button>
    </a>

    </div>
</div>

</div>

    </div>




    @endsection

{{--<script src="{{url('/js/jquery.js')}}"></script>--}}


<script src="{{url('/js/jquery-1.11.3.min.js')}}"></script>
<script src="{{url('/js/star-rating.js')}}"></script>
<script src="{{url('/js/owl.carousel.js')}}"></script>
<script src="{{url('/js/photoswipe.min.js')}}"></script>
<script src="{{url('/js/photoswipe-ui-default.min.js')}}"></script>
<script>

    $(function(){

        // Drawing the HTML for PhotoSwipe
        function buildPswdHtml(){
            $("body").append([
                '<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">',
                '  <div class="pswp__bg"></div>',
                '  <div class="pswp__scroll-wrap">',
                '    <div class="pswp__container">',
                '      <div class="pswp__item"></div>',
                '      <div class="pswp__item"></div>',
                '      <div class="pswp__item"></div>',
                '    </div>',
                '    <div class="pswp__ui pswp__ui--hidden">',
                '      <div class="pswp__top-bar">',
                '          <div class="pswp__counter"></div>',
                '          <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>',
                '          <button class="pswp__button pswp__button--share" title="Share"></button>',
                '          <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>',
                '          <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>',
                '          <div class="pswp__preloader">',
                '            <div class="pswp__preloader__icn">',
                '              <div class="pswp__preloader__cut">',
                '                <div class="pswp__preloader__donut"></div>',
                '              </div>',
                '            </div>',
                '          </div>',
                '      </div>',
                '      <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">',
                '        <div class="pswp__share-tooltip"></div> ',
                '      </div>',
                '      <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>',
                '      <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>',
                '      <div class="pswp__caption">',
                '        <div class="pswp__caption__center"></div>',
                '      </div>',
                '    </div>',
                '  </div>',
                '</div>'
            ].join(""));
        }


        // From the gallery, get the items for PhotoSwipe
        function getGalleryItems($gallery){
            var items = [];

            $gallery.find("a").each(function(){
                var $anchor = $(this),
                        size = $anchor.attr("data-size").split("x"),
                        title = $anchor.attr("data-title"),
                        item = {
                            el: $anchor.get(0),
                            src: $anchor.attr("href"),
                            w: parseInt(size[0]),
                            h: parseInt(size[1])
                        };

                // caption
                if( title ) item.title = title;

                items.push(item);
            });

            return items;
        }


        //Opening the PhotoSwipe
        function openGallery($gallery, index, items, pswpOptions){
            var $pswp = $(".pswp"),
                    owl = $gallery.data("owlCarousel"),
                    gallery;

            //Set an option value
            var options = $.extend(true, {
                // Image number to open
                index: index,

                //Zoom setting at the time of image click
                getThumbBoundsFn: function(index){
                    var $thumbnail = $(items[index].el).find("img"),
                            offset = $thumbnail.offset();
                    return {
                        x: offset.left,
                        y: offset.top,
                        w: $thumbnail.outerWidth()
                    };
                }
            }, pswpOptions);

            //Display the PhotoSwipe
            gallery = new PhotoSwipe($pswp.get(0), PhotoSwipeUI_Default, items, options);
            gallery.init();

            // In accordance with the switching of PhotoSwipe slide , OwlCarousel also adjusts position
            gallery.listen("beforeChange", function(x){
                owl.goTo(this.getCurrentIndex());
            });

            gallery.listen("close", function(){
                this.currItem.initialLayout = options.getThumbBoundsFn(this.getCurrentIndex());
            });
        }


        // Initialization
        function initializeGallery($elem, owlOptions, pswpOptions){

            //If the DOM for PhotoSwipe does not exist , a new drawing
            if( $(".pswp").size() === 0 ){
                buildPswdHtml();
            }

            // Scan to accommodate a plurality of gallery
            $elem.each(function(i){
                var $gallery = $(this),
                        uid = i + 1,
                        items = getGalleryItems($gallery),
                        options = $.extend(true, {}, pswpOptions);

                // Initialization of OwlCarousel
                $gallery.owlCarousel(owlOptions);

                //Assign a unique ID to each gallery
                options.galleryUID = uid;
                $gallery.attr("data-pswp-uid", uid);

                // With the click of each item , start PhotoSwipe
                $gallery.find(".owl-item").on("click", function(e){
                    if( !$(e.target).is("img") ) return;

                    //items pass a copy because it is rewritten to PhotoSwipe.init ()
                    openGallery($gallery, $(this).index(), items.concat(), options);
                    return false;
                });
            });
        }


        // In the sample to perform the processing for the `.owl-carousel`
        var owlOptions = {
            //what to mess with if you want to change the amount of slides on the page no matter what as default 3 will show up...
//                    itemsCustom: [[0, 3]],
                    items: 3,
                    responsiveRefreshRate: 0,
                    navigation: true,
//                    pagination: true,
//                    paginationNumbers: true,
                    scrollPerPage: false,
                    dots: true,
                    dotsEach: true
                },
                pswpOptions = {
                    bgOpacity: 0.9,
                    history: false,
                    shareEl: true
                };

        initializeGallery($(".owl-carousel"), owlOptions, pswpOptions);

    });

</script>





