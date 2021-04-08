<div>
    <form wire:submit.prevent="AddBrand" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="card mt-2">
                    <div class="card-header">
                        <h3 class="card-title">Add New Brand</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label >Brand Name</label>
                                        @error('name') <span class="text-danger">{{$message }}</span> @enderror
                                    <input wire:model.lazy="name" type="text" class="form-control" placeholder="Enter Car Name"
                                           name="brand-name" >
                                </div>
                            </div>
                            <div class="col-12" style="margin-top: -24px;">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text slug-left">
                                            https://care-rental.com/</span>
                                    </div>
                                    <input wire:model="slug" type="text" name="brand-slug"
                                            class="form-control slug-input is-valid" value="{{$slug}}"
                                            style="color: #0f7be7 !important;padding: 0;border: none;margin-top: -2px;
                                                    margin-left: 2px;background:#ff000000;text-decoration: underline;"
                                            name="car-slug"
                                    >
                                    <!-- <i class="fa fa-pen-alt pl-1 mt-1" style=" line-height: 37px;"></i> -->
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col">
                                <!-- textarea -->
                                <div class="mb-3 brand-details-class">
                                    <label for="">Brand Details</label>
                                    <textarea wire:model.defer="description" class="textarea" placeholder="Place some text here" id="car-datails"
                                              style="width: 100%; min-height: 200px ; font-size: 14px; line-height: 18px;
                                    border: 1px solid #dddddd; padding: 10px;" name="car-details">
                                    </textarea>
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
                                <h5 class="card-title">Brand Logo</h5>
                            </div>
                            <div class="card-body">
                                <p>Brand Light Logo</p>
                                @if($brand_light_image)
                                    <img  class="w-50" src="{{$brand_light_image->temporaryUrl()}}" alt="">
                                @else
                                    <img  class="w-50" src="{{asset('adminFiles/dist/img/image-placeholder.png')}}" alt="">
                                @endif

                                <input wire:model.lazy="brand_light_image" type="file">
                                <br>
                                <br>
                                <p>Brand Dark Logo</p>

                            @if($brand_dark_image)
                                        <img  class="w-50" src="{{$brand_dark_image->temporaryUrl()}}" alt="">
                                    @else
                                        <img  class="w-50" src="{{asset('adminFiles/dist/img/image-placeholder.png')}}" alt="">
                                    @endif

                                    <input wire:model.lazy="brand_dark_image" type="file">


                            </div>
                        </div>

                    </div>
                </div>

                <div class="row mt-1">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Save Brand</h5>
                            </div>
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary btn-block">Add Brand</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
