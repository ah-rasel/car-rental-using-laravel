<div class="col">
    <div class="mt-5 rent-form">
        <form wire:submit.prevent="NewRentRequest" action="" method="POST">
            @csrf
                @if (session('login-required'))
                    <div class="alert alert-danger">
                        {{ session('login-required') }}
                    </div>
                @endif
            <div class="form-row">
                <div class="col-sm-12">
                    <div class="form-group"><label>Pickup Address</label>
                        <select wire:model.lazy="rent_place_id" class="form-select form-control text-center">

                            <option selected>Select a location</option>
                            @foreach($rent_places as $rent_place)
                            <option value="{{$rent_place->id}}">{{$rent_place->place_name}}</option>
                            @endforeach
                        </select>
                        @error('rent_place_id')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-12">
                    <div class="form-group"><label>Pickup Date and time</label>
                        <input wire:model.lazy="rent_date" class="form-control" type="datetime-local" name="pickup-time" min="today">
                        @error('rent_date')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-12">
                    <div class="form-group"><label>Drop Address</label>
                        <select wire:model.defer="return_place_id" class="form-select form-control text-center">
                            <option selected>Select a location</option>

                            @foreach($rent_places as $rent_place)
                            <option value="{{$rent_place->id}}">{{$rent_place->place_name}}</option>
                            @endforeach
                        </select>
                        @error('return_place_id')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-12">
                    <div class="form-group"><label>Drop Date and time</label>
                        <input wire:model.lazy="return_date" class="form-control" type="datetime-local" name="drop-time" min="today">
                        @error('return_date')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
{{--                    @livewire('payment-section-total-payment',['totalDays'=> $totalDays])--}}
                    <div class="card mb-2">
                        <div class="card-header">
                            <p>Total Days Count : {{$totalDays}} days</p>
                            Amount To pay <h3 class="float-right">${{$amount_to_pay}}</h3>

                        </div>
                    </div>
                    <div class="card credit-card-box">
                        <div class="card-header">
                            <h3>
                                <span class="panel-title-text">Payment Details </span>


                                <img class="img-fluid panel-title-image" src="{{asset('userFiles/assets/img/accepted_cards.png')}}"></h3>
                        </div>
                        <div class="card-body">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="formCheck-1" name="payment">
                                <label class="form-check-label" for="formCheck-1">Cash During Rent Time</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="Pay_Online" name="payment">
                                <label class="form-check-label" for="Pay_Online">Pay Online</label>
                            </div>
                            <div>
                                <div class="form-row">
                                    <div class="col-12">
                                        <div class="form-group"><label for="cardNumber">Card number </label>
                                            <div class="input-group"><input class="form-control" type="tel" required="" placeholder="Valid Card Number">
                                                <div class="input-group-append"><span class="input-group-text"><i class="fa fa-credit-card"></i></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-7">
                                        <div class="form-group"><label for="cardExpiry"><span>expiration </span><span>EXP </span> date</label><input class="form-control" type="tel" required="" placeholder="MM / YY"></div>
                                    </div>
                                    <div class="col-5 pull-right">
                                        <div class="form-group"><label for="cardCVC">cv code</label><input class="form-control" type="tel" id="cardCVC" required="" placeholder="CVC"></div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12">
                                        <div class="form-group"><label for="couponCode">coupon code</label><input class="form-control" type="text" id="couponCode"></div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <input class="form-control btn btn-primary ml-0" type="submit" value= "Request for Reservation"/>
                        <hr>
                    </div>
                    <div class="form-group"><a class="m-0 btn btn-info btn-block" href="#">Instant Reservation</a></div>
                </div>
            </div>
        </form>
    </div>
</div>
