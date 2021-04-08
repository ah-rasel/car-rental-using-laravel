<div class="simple-slider mt-5">
    <div class="swiper-container">
        <div class="swiper-wrapper">

            @foreach($sliders as $slider)
                <div class="swiper-slide slide-container" style="background-image:url(https://placeholdit.imgix.net/~text?txtsize=68&amp;txt=Slideshow+Image&amp;w=1920&amp;h=500);">
                    <div class="container">
                        <div class="slider-main-div">
                            <div class="row slider-row">
                                <div class="col slider-left-column col-3 d-sm-none d-md-inline d-none">
                                    <div class="left-details-div car-slider-details">
                                        <div class="slider-left-item" style="font-size: 27px;font-family: 'Open Sans', sans-serif;"><i class="fa fa-car slider-car-details-icon s-i-doors"></i><span class="car-left-details">
                                            Doors :</span><span class="car-left-details">{{$slider->car->doors}}</span></div>
                                        <div class="slider-left-item" style="font-size: 27px;font-family: 'Open Sans', sans-serif;"><i class="fas fa-users slider-car-details-icon s-i-passengers"></i><span class="car-left-details">
                                            Passengers&nbsp; :</span><span class="car-left-details">{{$slider->car->passengers}}</span></div>
                                        <div class="slider-left-item" style="font-size: 27px;font-family: 'Open Sans', sans-serif;"><i class="fas fa-suitcase slider-car-details-icon"></i><span class="car-left-details">
                                            Luggage&nbsp; :</span><span class="car-left-details">{{$slider->car->luggage}}</span></div>
                                        <div class="slider-left-item" style="font-size: 27px;font-family: 'Open Sans', sans-serif;"><i class="fa fa-thermometer slider-car-details-icon"></i><span class="car-left-details">
                                            Air Conditioning&nbsp; :</span><span class="car-left-details">{{$slider->car->air_condition_status}}</span></div>
                                    </div>
                                </div>
                                <div class="col slider-center-column col-12 col-md-6 text-center text-md-left">
                                    <div class="car-name-div mt-4">
                                        <p class="car-quality-text text-center m-md-0"><span class="text-uppercase">{{$slider->car->class_of_car}}</span></p>
                                        <h1 class="car-title-slider p-0 font-weight-bold align-content-sm-center"><strong>{{$slider->car->name}}</strong><br></h1>
                                        <hr class="slider-hr m-md-0 mt-0 mb-0">
                                        <p class="car-slider-text-p mt-2 mb-2">{{$slider->slider_text}}</p>
                                    </div>
                                    <div class="slider-car-div">
                                        <img class="d-lg-flex justify-content-lg-end main-slider-car-image"
                                             src="{{$slider->slider_image_path?
                                                asset('/cars/'.$slider->slider_image_path) :
                                                asset('userFiles/assets/img/3-2-car-free-download-png.png')}}">
                                    </div>
                                </div>
                                <div class="col slider-right-column col-3 d-sm-none d-md-inline d-none">
                                    <div class="right-details-div car-slider-details">
                                        <div class="slider-left-item" style="font-size: 27px;font-family: 'Open Sans', sans-serif;"><i class="fa fa-paper-plane slider-car-details-icon"></i>
                                            <span class="car-left-details">Transmission&nbsp; :</span><span class="car-left-details">{{$slider->car->transmission}}</span></div>
                                        <div class="slider-left-item" style="font-size: 27px;font-family: 'Open Sans', sans-serif;"><i class="fa fa-user slider-car-details-icon"></i>
                                            <span class="car-left-details">Minimum Age&nbsp; :</span><span class="car-left-details">{{$slider->car->min_age_to_take_rent}}</span></div>
                                        <div class="slider-left-item" style="font-size: 27px;font-family: 'Open Sans', sans-serif;"><i class="fas fa-gas-pump slider-car-details-icon"></i>
                                            <span class="car-left-details">Energy :</span><span class="car-left-details">{{$slider->car->energy}}</span></div>
                                    </div>
                                    <div>
                                        <div class="float-right reserve-btn mt-5">
                                            <h2 class="float-left amount-text mr-3">$ {{$slider->car->rent_amount}}<sup class="slider-day-text">&nbsp;/Day</sup></h2><a class="btn reserve-btn-text" data-toggle="modal" data-target="#product-modal">Reserve Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="swiper-pagination slider-pagination"></div>
        <div class="swiper-button-prev slider-previous slider-control"></div>
        <div class="swiper-button-next slider-next slider-control"></div>
    </div>
</div>
