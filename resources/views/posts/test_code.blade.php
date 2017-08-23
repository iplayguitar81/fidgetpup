@extends('layout')

@section('content')

    {{--*/ @ $pathy =$image->file_path  /*--}}

    {{--*/ @ list($width, $height) = getimagesize($pathy) /*--}}

    {{--*/ @ $dimensions =$width.'x'.$height  /*--}}


    {{--<figure id="s2" class="col-sm-1" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">--}}
        {{--@foreach($post->images as $image)--}}
        {{--<a href="{{url($image->file_path)}}" itemprop="contentUrl" data-size="{{$dimensions}}">--}}
            {{--<img src="{{url($image->file_path)}}"  alt="CRUD MVC ASP" />--}}
        {{--</a>--}}
        {{--<figcaption itemprop="caption description">MVC ASP CRUD height: {{$height}} width: {{$width}}</figcaption>--}}
        {{--@endforeach--}}
    {{--</figure>--}}




    <div class="container">


        <h2>First gallery</h2>

        <ul class="owl-carousel">
            @foreach($post->images as $image)

                {{--*/ @ $pathy =$image->file_path  /*--}}

                {{--*/ @ list($width, $height) = getimagesize($pathy) /*--}}

                {{--*/ @ $dimensions =$width.'x'.$height  /*--}}



                {{--*/ $thumb_path= substr($image->file_path, 7);/*--}}


            <li>
                <a href="{{url($image->file_path)}}" data-size="{{$dimensions}}" data-title="{{$thumb_path}}">
                    <img class="img-responsive" src="{{url('images/thmb-'.$thumb_path)}}" alt="1"></a></li>
@endforeach

            {{--<li><a href="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo02_lg.jpg" data-size="960x640"><img class="img-responsive" src="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo02.jpg" alt="2"></a></li>--}}
            {{--<li><a href="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo03_lg.jpg" data-size="960x640"><img class="img-responsive" src="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo03.jpg" alt="3"></a></li>--}}
            {{--<li><a href="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo04_lg.jpg" data-size="960x640"><img class="img-responsive" src="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo04.jpg" alt="4"></a></li>--}}
            {{--<li><a href="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo05_lg.jpg" data-size="960x640"><img class="img-responsive" src="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo05.jpg" alt="5"></a></li>--}}
            {{--<li><a href="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo06_lg.jpg" data-size="960x640"><img class="img-responsive" src="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo06.jpg" alt="6"></a></li>--}}
            {{--<li><a href="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo07_lg.jpg" data-size="960x640"><img class="img-responsive" src="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo07.jpg" alt="7"></a></li>--}}
            {{--<li><a href="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo08_lg.jpg" data-size="960x640"><img class="img-responsive" src="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo08.jpg" alt="8"></a></li>--}}
            {{--<li><a href="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo09_lg.jpg" data-size="960x640"><img class="img-responsive" src="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo09.jpg" alt="9"></a></li>--}}
        </ul>

        {{--<h2>Second gallery</h2>--}}
        {{--<ul class="owl-carousel">--}}
            {{--<li><a href="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo10_lg.jpg" data-size="960x640" data-title="1"><img class="img-responsive" src="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo10.jpg" alt="10"></a></li>--}}
            {{--<li><a href="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo11_lg.jpg" data-size="960x640" data-title="2"><img class="img-responsive" src="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo11.jpg" alt="11"></a></li>--}}
            {{--<li><a href="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo12_lg.jpg" data-size="960x640" data-title="3"><img class="img-responsive" src="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo12.jpg" alt="12"></a></li>--}}
            {{--<li><a href="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo13_lg.jpg" data-size="960x640" data-title="4"><img class="img-responsive" src="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo13.jpg" alt="13"></a></li>--}}
            {{--<li><a href="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo14_lg.jpg" data-size="960x640" data-title="5"><img class="img-responsive" src="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo14.jpg" alt="14"></a></li>--}}
            {{--<li><a href="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo15_lg.jpg" data-size="960x640" data-title="6"><img class="img-responsive" src="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo15.jpg" alt="15"></a></li>--}}
        {{--</ul>--}}



    </div>

@endsection





<script src="{{url('/js/jquery-1.11.3.min.js')}}"></script>
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
                    itemsCustom: [[0, 3]],
                    responsiveRefreshRate: 0
                },
                pswpOptions = {
                    bgOpacity: 0.9,
                    history: false,
                    shareEl: true
                };

        initializeGallery($(".owl-carousel"), owlOptions, pswpOptions);

    });

</script>