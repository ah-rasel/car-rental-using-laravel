<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <a wire:click="ShowModal" class="btn btn-outline-success btn-sm">Add New Slider</a>

{{--                        modal--}}

                        @if($ShowModalbox)
                            <div class="modal fade show" id="modal-default" style="display: block; padding-right: 16px;" aria-modal="true" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content sliders-modal">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add New Slider</h4>
                                            <button wire:click="ShowModal" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div>
                                                    <div class="form-group">

                                                        <label for=""> Car Brand</label>
                                                        <select class="form-control"  wire:model="brand_id">
                                                            <option >Select A Brand</option>

                                                        @foreach($brands as $brand)
                                                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>

                                                    <div class="form-group">

                                                        <label for=""> Car Name</label>
                                                        <select class="form-control" name="user_role" wire:model="car_id">
                                                            <option >Select A Car</option>

                                                        @foreach($cars as $car)
                                                                <option value="{{$car->id}}">{{$car->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('car_id')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">

                                                        <label for=""> Slider Image</label>
                                                        <br>
                                                        @if($slider_image_path)
                                                            <img class="image-upload w-25 h-25"
                                                                 src="{{$slider_image_path->temporaryUrl() ?? ''}}" alt="your image" />
                                                        @else
                                                            <img class="image-upload w-25 h-25" src="{{asset('adminFiles/dist/img/image-placeholder.png')}}" alt="your image" />
                                                        @endif
                                                    </div>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input wire:model.lazy="slider_image_path" type="file" class="custom-file-input" id="exampleInputFile">
                                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-form-label"  >
                                                             Slider Text
                                                        </label>
                                                        <textarea wire:model.lazy="slider_text" id="" rows="3" class="form-control"></textarea>
                                                        @error('slider_text')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>




                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button wire:click="ShowModal" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button wire:click="Add_Slide" type="submit" class="btn btn-primary">Add Slider</button>
                                        </div>

                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            @endif

                        @if($ShowEditModalbox)
                            <div class="modal fade show modal-dialog-scrollable mb-5" id="modal-default" style="display: block; padding-right: 16px;" aria-modal="true" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content sliders-modal">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit Slider</h4>
                                            <button wire:click="EditModalBox" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div>
                                                    <div class="form-group">

                                                        <label for=""> Car Brand</label>
                                                        <span class="ml-2">Current Brand Id = {{$edit_brand_id}}</span>
                                                        <select class="form-control"  wire:model="brand_id">
                                                            <option >Select A Brand</option>
                                                        @foreach($brands as $brand)
                                                            {{$loop->iteration}}
                                                                <option value="{{$brand->id}}" {{$loop->iteration === 2 ?'selected="selected"':''}}>{{$brand->id.' - '.$brand->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group">

                                                        <label for=""> Car Name</label><span class="ml-2">Current Car Id = {{$edit_car_id}}</span>

                                                        <select class="form-control" name="user_role" wire:model="car_id">
                                                            <option >Select A Car</option>

                                                        @foreach($cars as $car)
                                                                <option value="{{$car->id}}">{{$car->id.' - '.$car->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group">

                                                        <label for=""> Slider Image</label>
                                                        <br>
                                                        @if($slider_image_path)
                                                            <img class="image-upload w-25"
                                                                 src="cars/{{$slider_image_path}}" alt="your image" />
                                                        @elseif($edit_slider_image_path)
                                                            <img class="image-upload w-25" src="{{$edit_slider_image_path->temporaryUrl()}}" alt="your image" />
                                                             @else
                                                            <img class="image-upload w-25" src="{{asset('adminFiles/dist/img/image-placeholder.png')}}" alt="your image" />
                                                        @endif
                                                    </div>
                                                <form enctype="multipart/form-data">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input wire:model.lazy="edit_slider_image_path" type="file" class="custom-file-input" id="exampleInputFile">
                                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                        </div>
                                                    </div>
                                                </form>

                                                    <div class="form-group">
                                                        <label class="col-form-label"  >
                                                             Slider Text
                                                        </label>
                                                        <textarea wire:model.lazy="slider_text" id="" rows="3" class="form-control"></textarea>
                                                        @error('slider_text')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>




                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button wire:click="EditModalBox" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button wire:click="UpdateSlider({{$current_slider_id}})" type="submit" class="btn btn-primary">Update Slider</button>
                                        </div>

                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            @endif


                    </div>
                    <div class="col-md-6"><div class="card-tools float-right">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input wire:model = "search" type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div></div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap table-bordered">
                    <thead>
                    <tr>
                        <th class="text-center">Sl.</th>
                        <th class="text-center" wire:click="sortBy('car_id')">Car Id @if($sortField=='car_id' && $orderBy==='asc') <i class="fa fa-sort-up"></i> @elseif($sortField=='car_id' && $orderBy==='desc') <i class="fa fa-sort-down"></i> @endif</th>
                        <th class="text-center w-10" >Car Name </th>
                        <th class="text-center w-25" wire:click="sortBy('slider_text')">Slider Text @if($sortField=='slider_text' && $orderBy==='asc') <i class="fa fa-sort-up"></i> @elseif($sortField=='slider_text' && $orderBy==='desc') <i class="fa fa-sort-down"></i> @endif</th>
                        <th class="text-center w-10" >Slider Image </th>
                        <th class="text-center" wire:click="sortBy('approve_status')">Approve Status @if($sortField=='approve_status' && $orderBy==='desc') <i class="fa fa-sort-up"></i> @elseif($sortField=='approve_status' && $orderBy==='asc') <i class="fa fa-sort-down"></i> @endif</th>
                        <th class="text-center" colspan="2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sliders as $slider)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td class="text-wrap text-center" >{{$slider->car->id}}</td>
                            <td class="text-wrap text-center" >{{$slider->car->name}}</td>
                            <td class="text-wrap text-center" >{{$slider->slider_text}}</td>
                            <td class="text-wrap text-center" ><img class="w-75 p-0 m-0" src="{{ url('cars/'.$slider->slider_image_path) }}" alt=""></td>
                            <td class="text-center" wire:click="changeStatus({{$slider->id}})" onclick="confirm('Are You Sure to Change the Status ?') || event.stopImmediatePropagation()"><span class="cursor-pointer1 badge {{$slider->status_color}}">{{$slider->approval}}</span></td>
                            <td class="text-info text-center"> <i class="fa fa-pencil-alt mr-2"></i>
                                <a wire:click="ShowEditModal({{$slider->id}})" class="text-decoration-none cursor-pointer1">Edit</a></td>
                            <td class="text-danger text-center"> <i class="fa fa-trash-alt mr-2"></i>
                                <a wire:click.prevent="DeleteSlider({{$slider->id}})" onclick="confirm('Are You Sure ?') || event.stopImmediatePropagation()" class="text-decoration-none text-danger cursor-pointer1">Delete</a>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>


            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
