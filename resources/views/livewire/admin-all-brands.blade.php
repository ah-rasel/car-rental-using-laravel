<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Brands</h3>

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
                        <th class="text-center" wire:click="sortBy('name')">Brand Name
                            @if($sortField=='name' && $orderBy==='asc')
                                <i class="fa fa-sort-up"></i>
                            @elseif($sortField=='name' && $orderBy==='desc')
                                <i class="fa fa-sort-down"></i>
                            @endif
                           </th>
                        <th class="text-center" wire:click="sortBy('brand_details')">Description
                            @if($sortField=='brand_details' && $orderBy==='asc')
                                <i class="fa fa-sort-up"></i>
                            @elseif($sortField=='brand_details' && $orderBy==='desc')
                                <i class="fa fa-sort-down"></i>
                            @endif
                        </th>
                        <th class="text-center" >Total cars</th>
                        <th class="text-center" wire:click="sortBy('slug')">Brand slug
                            @if($sortField=='slug' && $orderBy==='asc')
                                <i class="fa fa-sort-up"></i>
                            @elseif($sortField=='slug' && $orderBy==='desc')
                                <i class="fa fa-sort-down"></i>
                            @endif
                        </th>
                        <th class="text-center" colspan="2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($brands as $brand)
                    <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td class="text-center">{{$brand->name}}</td>
                        <td class="text-wrap text-center" style="width: 25%;">{{$brand->brand_details}}</td>
                        <td class="text-center"><a href="#">{{$brand->cars->count()}}</a></td>
                        <td class="text-center"><a href="#">{{$brand->slug}}</a></td>
                        <td class="text-info text-center"> <i class="fa fa-pencil-alt mr-2"></i><a href="{{route('admin.update.brand',$brand->id)}}" class="text-decoration-none">Edit</a></td>
                        <td wire:click="confirmDeleteBrand({{$brand->id}})" class="text-danger text-center cursor-pointer1"> <i class="fa fa-trash-alt mr-2"></i><a  class="text-decoration-none text-danger">Delete</a></td>

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
