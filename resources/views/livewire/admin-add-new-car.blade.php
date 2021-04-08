<div>
    <form wire:submit.prevent="Add_Car" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="card mt-2">
                    <div class="card-header">
                        <h3 class="card-title">Add New Car</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="row">
                            <div class="col-12">
                                <!-- text input -->
                                <div class="form-group">

                                    <label >Car Name</label>
                                    <input wire:model.lazy="name" type="text" class="form-control" placeholder="Enter Car Name" name="car-name" >
                                    @error('name')
                                    <br>
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12" style="margin-top: -24px;">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text slug-left">https://car-rental.com/</span>
                                    </div>

                                    <input wire:model="slug"  type="text" name="car-slug"
                                            class="form-control slug-input"
                                            style="color: #0f7be7 !important;padding: 0;border: none;margin-top: -2px;
                              margin-left: 2px;background:#ff000000;text-decoration: underline;"
                                            name="car-slug"
                                    >

                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col">
                                <!-- textarea -->
                                <div class="mb-3 car-details-class">
                                    <label for="">Car Details</label>
                                    <textarea wire:model.lazy="car_details"  class="form-control w-100 " rows="10"></textarea>
                                    @error('car_details')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label"  ><i class="fas fa-car"></i> Doors</label>
                                    <input wire:model.lazy="doors" type="text" class="form-control" placeholder="Doors" >
                                    @error('doors')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror

                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label"  ><i class="fas fa-user"></i> Passengers</label>
                                    <input wire:model.lazy="passengers" type="text" class="form-control "   placeholder="Passengers" name="passengers">
                                    @error('passengers')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label"  ><i class="fas fa-suitcase"></i> Luggages</label>
                                    <input wire:model.lazy="luggage" type="text" class="form-control "   placeholder="Luggages" name="luggages">
                                    @error('luggage')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label"  ><i class="fas fa-user"></i> Minimum Age to Take Rent </label>
                                    <input wire:model.lazy="min_age_to_take_rent" type="text" class="form-control "   placeholder="Minimum Age" name="min-age">
                                    @error('min_age_to_take_rent')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label"  >
                                        <i class="fas fa-tachometer-alt"></i> Speed Of the Car
                                    </label>
                                    <input wire:model.lazy="highest_speed" type="text" class="form-control"
                                           placeholder="Speed Of the Car" name="speed">
                                    @error('highest_speed')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label"  >
                                        <i class="fas fa-clock"></i> Release Year
                                    </label>
                                    <input wire:model.lazy="model_release" type="text" class="form-control" >
                                    @error('model_release')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div wire:model="power_type" class="form-group">
                                    <label>Power</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="car-power" value="0" id="power-petrol">
                                        <label class="form-check-label" for="power-petrol">Petrol</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="car-power" value="1" id="power-diesel">
                                        <label class="form-check-label" for="power-diesel">Disesel</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="car-power" value="2" id="power-gassoline">
                                        <label class="form-check-label" for="power-gassoline">Gassoline</label>
                                    </div>
                                    @error('power_type')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div wire:model="car_class" class="form-group">
                                    <label>Car Class </label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="car_class-premium" name="car_class" value="0">
                                        <label class="form-check-label" for="car_class-premium">Premium</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="car_class-business" name="car_class" value="1">
                                        <label class="form-check-label" for="car_class-business">Business</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="car_class-general" name="car_class" value="2">
                                        <label class="form-check-label" for="car_class-general">General</label>
                                    </div>

                                    @error('car_class')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div wire:model="air_condition" class="form-group">
                                    <label>Air Conditoning </label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="aircondition-yes" name="aircondition" value="1">
                                        <label class="form-check-label" for="aircondition-yes">Yes</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="aircondition-no" name="aircondition" value="0">
                                        <label class="form-check-label" for="aircondition-no">No</label>
                                    </div>
                                    @error('air_condition')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div wire:model="transmission_mode" class="form-group">
                                    <label>Transmission </label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="transmission-auto" name="transmission" value="0">
                                        <label class="form-check-label" for="transmission-auto">Auto</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="transmission-manual" name="transmission" value="1">
                                        <label class="form-check-label" for="transmission-manual">Manual</label>
                                    </div>
                                    @error('transmission_mode')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div wire:model="review_status" class="form-group">
                                    <label>Review Status </label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="review-status-on" name="review-status" value="1">
                                        <label class="form-check-label" for="review-status-on">On</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="review-status-off" name="review-status" value="0">
                                        <label class="form-check-label" for="review-status-off">Off</label>
                                    </div>
                                    @error('review_status')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-3">
                <div class="row mt-2">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Car Image</h5>
                            </div>
                            <div class="card-body">
                                @if($car_photo_path)
                                <img class="image-upload" id="blah"
                                     src="{{$car_photo_path->temporaryUrl()}}" alt="your image" />
                                @else
                                    <img class="image-upload" id="blah" src="{{asset('adminFiles/dist/img/image-placeholder.png')}}" alt="your image" />
                                @endif
                                <input wire:model.lazy="car_photo_path" class="btn mt-2 text-wrap btn-info" type='file' name="car-image" onchange="readURL(this);"  />
                                @error('car_photo_path')
                                <span class="text-danger">{{$message}}</span>
                                @enderror

                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Car Brand</h5>
                            </div>
                            <div class="card-body">
                                <div wire:model="brand" class="form-group" >
                                    @foreach($brands as $brand)
                                        <div class="form-check">
                                            <input  class="form-check-input" type="radio" name="car-brand" value="{{$brand->id}}" id="{{$brand->name}}">
                                            <label class="form-check-label" for="{{$brand->name}}">{{$brand->name}}</label>
                                        </div>
                                    @endforeach
                                    @error('brand')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>


                            </div>
                        </div>
                        <div class="card mt-2">
                            <div class="card-header">
                                <h5 class="card-title">Car Image For Single Page</h5>
                            </div>
                            <div class="card-body">
                                @if($car_image_single_page_view)
                                <img class="image-upload" id="blah"
                                     src="{{$car_image_single_page_view->temporaryUrl()}}" alt="your image" />
                                @else
                                    <img class="image-upload" id="blah" src="{{asset('adminFiles/dist/img/image-placeholder.png')}}" alt="your image" />
                                @endif
                                <input wire:model.lazy="car_image_single_page_view" class="btn mt-2 text-wrap btn-info" type='file' name="car-image" onchange="readURL(this);"  />
                                @error('car_photo_path')
                                <span class="text-danger">{{$message}}</span>
                                @enderror

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-1">
                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Rent Amount</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="col-form-label"  >
                                        <i class="fa fa-money-bill"></i> Amount
                                    </label>
                                    <input wire:model.lazy="rent_amount" type="text" class="form-control"   .
                                           placeholder="Amount" name="rent_amount">
                                    @error('rent_amount')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-1">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Save Data</h5>
                            </div>
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary btn-block">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
    </form>
</div>

</div>
</div>
