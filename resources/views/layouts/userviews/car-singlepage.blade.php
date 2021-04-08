@extends('layouts.user')
@section('content')
    <div>
        <div>
            <img class="img-fluid single-page-image" src="{{asset('userFiles/assets/img/car-background-image.jpg')}}"></div>
        <div>
            <div class="container">
                <div class="row">
                    <div class="col col-md-8">
                        <div class="mt-4">
                            <h3 class="car-title-slider p-0" style="font-weight: 700;font-size: 42;">
                                <strong class="text-uppercase">{{$car->name}}</strong><br></h3>
                        </div>
                        @livewire('review-count-section',['car'=> $car])
                        <div>
                            <hr>
                            <div class="row pb-2">
                                <div class="col col-6 col-md-3 mt-2 mt-md-0">
                                    <span><i class="fa fa-user-o car-attribute-icon mr-2"></i>
                                        <span class="font-weight-lighter car-attribute-text">&nbsp;{{$car->passengers}} Passengers</span></span></div>
                                <div class="col col-6 col-md-3 mt-2 mt-md-0">
                                    <span><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" class="bi bi-bag-check car-attribute-icon mr-2">
                                        <path fill-rule="evenodd" d="M8 1a2.5 2.5 0 0 0-2.5 2.5V4h5v-.5A2.5 2.5 0 0 0 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V5H2z"></path>
                                        <path fill-rule="evenodd" d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z"></path>
                                    </svg><span class="font-weight-lighter car-attribute-text">&nbsp;{{$car->luggage}} Luggages</span></span></div>
                                <div class="col col-6 col-md-3 mt-2 mt-md-0"><span><i class="fa fa-paper-plane-o car-attribute-icon mr-2"></i>
                                        <span class="font-weight-lighter car-attribute-text">{{$car->transmission}}</span></span>
                                </div>
                                <div class="col col-6 col-md-3 mt-2 mt-md-0"><span><i class="la la-car car-attribute-icon mr-2"></i>
                                        <span class="font-weight-lighter car-attribute-text">&nbsp;{{$car->doors}} Doors</span></span>
                                </div>
                            </div>
                            <hr>
                        </div>

                        <div>
                            <p>{{$car->car_details}}
                            </p>
                        </div>
                        <div>
                            <hr>
                            @livewire('review-section',['car'=> $car])
                        </div>
                    </div>
                    @livewire('payment-section',['car'=> $car])
                </div>
            </div>
        </div>
    </div>
@endsection
