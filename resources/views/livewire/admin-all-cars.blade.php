<div class="row" >
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mr-5">ALl Cars</h3><span class=""><a href="{{route('admin.new.car')}}">Add New Car</a></span>
                <div class="card-tools">

                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" wire:model="search" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap table-bordered">
                    <thead>
                    <tr>
                        <th class="text-center">Sl.</th>
                        <th class="text-center" wire:click="sortBy('name')">Car Name @if($sortField=='name' && $orderBy==='asc') <i class="fa fa-sort-up"></i> @elseif($sortField=='name' && $orderBy==='desc') <i class="fa fa-sort-down"></i> @endif</th>
                        <th class="text-center" wire:click="sortBy('car_details')">Description @if($sortField=='car_details' && $orderBy==='asc') <i class="fa fa-sort-up"></i> @elseif($sortField=='car_details' && $orderBy==='desc') <i class="fa fa-sort-down"></i> @endif</th>
                        <th class="text-center" wire:click="sortBy('brand_id')">Brand @if($sortField=='brand_id' && $orderBy==='desc') <i class="fa fa-sort-up"></i> @elseif($sortField=='brand_id' && $orderBy==='asc') <i class="fa fa-sort-down"></i> @endif</th>
                        <th class="text-center" wire:click="sortBy('car_class')">Class @if($sortField=='car_class' && $orderBy==='asc') <i class="fa fa-sort-up"></i> @elseif($sortField=='car_class' && $orderBy==='desc') <i class="fa fa-sort-down"></i> @endif</th>
                        <th class="text-center" wire:click="sortBy('cars_availability')">Status @if($sortField=='cars_availability' && $orderBy==='desc') <i class="fa fa-sort-up"></i> @elseif($sortField=='cars_availability' && $orderBy==='asc') <i class="fa fa-sort-down"></i> @endif</th>
                        <th class="text-center" colspan="2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cars as $car)
                    <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td class="text-center">{{$car->name}}</td>
                        <td class="text-wrap text-center" style="width: 25%;">{{$car->car_details}}</td>
                        <td class="text-center"><a href="#">{{$car->brand->name}}</a></td>
                        <td class="text-center"><a href="#">{{$car->class_of_car}}</a></td>
                        <td class="text-center cursor-pointer1" wire:click="changeStatus({{$car->id}})"><span class="badge {{$car->status_color}}">{{$car->available_or_not}}</span></td>
                        <td class="text-info text-center"> <i class="fa fa-pencil-alt mr-2"></i><a href="/car/{{$car->id}}/edit" class="text-decoration-none">Edit</a></td>
                        <td wire:click="confirmDelete({{$car->id}})" class="text-danger text-center cursor-pointer1"> <i class="fa fa-trash-alt mr-2"></i><a  class="text-decoration-none text-danger">Delete</a></td>

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
