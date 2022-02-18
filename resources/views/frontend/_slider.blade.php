<div class="header-slider">
    <!-- carousel code -->
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-inner">
        @foreach($sliders as $key => $slider)
            <!-- first slide -->
                <div class="carousel-item {{$key == 0 ? " active" : '' }}"
                     style="background: url({{asset($slider->image)}});">
                    <div class="carousel-caption d-md-block">
                        <h3 data-animation="animated fadeInLeft">{{$slider->getValue('title')  }}</h3>
                        <p data-animation="animated fadeInRight">{{$slider->getValue('body') }}</p>
                        <a href="{{$slider->link}}" class="btn btn-primary btn-st"
                           data-animation="animated fadeInLeft">{{__('words.more')}}</a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- controls -->
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

</div>
