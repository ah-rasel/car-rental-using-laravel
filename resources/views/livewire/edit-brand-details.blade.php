<div>
    <form wire:submit.prevent="Update_Brand" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="card mt-2">
                    <div class="card-header">
                        <h3 class="card-title">Update Brand</h3>
                        @if($brand_updated)
                            <a href="#" class="text-decoration-none btn btn-sm btn-success float-right">View this car</a>
                        @endif
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label >Brand Name</label>
                                    @error('brand.name') <span class="text-danger">{{$message }}</span> @enderror
                                    <input wire:model.lazy="brand.name" type="text" class="form-control" placeholder="Enter Car Name"
                                           name="brand-name" >
                                </div>
                            </div>
                            <div class="col-12" style="margin-top: -24px;">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text slug-left">
                                            https://care-rental.com/</span>
                                    </div>
                                    <input wire:model.lazy="edit_slug" type="text" name="brand-slug"
                                           class="form-control slug-input is-valid" value="{{$brand->slug}}"
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
                                    <textarea wire:model.lazy="brand.brand_details"  class="form-control w-100 " rows="10"></textarea>
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

                                @if($edit_brand_light_image)
                                    <img  class="w-50 p-3 bg-gradient-lightblue" src="{{$edit_brand_light_image->temporaryUrl()}}" alt="">
                                @elseif($brand->brand_light_image_path)
                                    <img  class="w-50 p-3 bg-gradient-lightblue" src="{{url('/brands/'.$brand->brand_light_image_path)}}" alt="{{$brand->name." - Light Logo "}}">
                                @else
                                    <img  class="w-50 p-3 bg-gradient-lightblue" src="{{asset('adminFiles/dist/img/image-placeholder.png')}}" alt="">
                                @endif

                                <input class="mt-2" wire:model.lazy="edit_brand_light_image" type="file">
                                <br>
                                @error('edit_brand_light_image')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                <br>
                                <p>Brand Dark Logo</p>

                                @if($edit_brand_dark_image)
                                    <img  class="w-50 p-3 bg-gradient-lime" src="{{$edit_brand_dark_image->temporaryUrl()}}" alt="">
                                @elseif($brand->brand_dark_image_path)
                                    <img  class="w-50 p-3 bg-gradient-lime" src="{{url('/brands/'.$brand->brand_dark_image_path)}}" alt="{{$brand->name." - Dark Logo "}}">
                                @else
                                    <img  class="w-50 p-3 bg-gradient-lime" src="{{asset('adminFiles/dist/img/image-placeholder.png')}}" alt="">
                                @endif

                                <input class="mt-2" wire:model.lazy="edit_brand_dark_image" type="file">
                                <br>
                                @error('edit_brand_dark_image')
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
                                <h5 class="card-title">Update Brand</h5>
                            </div>
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary btn-block">Update Brand</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
