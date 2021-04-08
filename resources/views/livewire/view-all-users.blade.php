<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group w-50">
                            <select class="form-control" name="user_role" wire:model="UserType">
                                <option value="1" >View All Admin</option>
                                <option value="2" selected>View All Users</option>

                            </select>
                        </div>
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
                        <th class="text-center" wire:click="sortBy('name')">Name @if($sortField=='name' && $orderBy==='asc') <i class="fa fa-sort-up"></i> @elseif($sortField=='name' && $orderBy==='desc') <i class="fa fa-sort-down"></i> @endif</th>
                        <th class="text-center" wire:click="sortBy('username')">Username @if($sortField=='username' && $orderBy==='asc') <i class="fa fa-sort-up"></i> @elseif($sortField=='username' && $orderBy==='desc') <i class="fa fa-sort-down"></i> @endif</th>
                        <th class="text-center" wire:click="sortBy('email')">Email @if($sortField=='email' && $orderBy==='asc') <i class="fa fa-sort-up"></i> @elseif($sortField=='email' && $orderBy==='desc') <i class="fa fa-sort-down"></i> @endif</th>
                        <th class="text-center" wire:click="sortBy('phone')">Phone Number @if($sortField=='phone_number' && $orderBy==='asc') <i class="fa fa-sort-up"></i> @elseif($sortField=='phone_number' && $orderBy==='desc') <i class="fa fa-sort-down"></i> @endif</th>
                        <th class="text-center" wire:click="sortBy('address')">Address @if($sortField=='address' && $orderBy==='asc') <i class="fa fa-sort-up"></i> @elseif($sortField=='address' && $orderBy==='desc') <i class="fa fa-sort-down"></i> @endif</th>
                        <th class="text-center" wire:click="sortBy('approve')">Approve Status @if($sortField=='approve_status' && $orderBy==='desc') <i class="fa fa-sort-up"></i> @elseif($sortField=='approve_status' && $orderBy==='asc') <i class="fa fa-sort-down"></i> @endif</th>
                        <th class="text-center" colspan="2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
@foreach($users as $user)
                    <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td class="" style="width: 25%;">
                        <span>
                          <img src="{{asset('adminFiles/dist/img/maskboy.png')}}" alt="rasel-image"
                               style="width: 30px;margin: 0px 6px 0px 0px;border-radius: 5px;">
                        </span> {{$user->name}}</td>
                        <td class="text-wrap text-center" >{{$user->username}}</td>
                        <td class="text-center">{{$user->email}}</td>
                        <td class="text-center">{{$user->phone_number}}</td>
                        <td class="text-center">{{$user->address}}</td>
                        <td class="text-center">
                            <span wire:click="changeStatus({{$user->id}})" class="badge p-2 {{$user->status_color}} " style="cursor: pointer;">{{$user->status}}</span></td>
                        <td class="text-info text-center"> <i class="fa fa-pencil-alt mr-2"></i>
                            <a href="{{route('admin.user.edit',$user->username)}}" class="text-decoration-none">Edit</a></td>
                        <td class="text-danger text-center"> <i class="fa fa-trash-alt mr-2"></i>
                            <a href="#" class="text-decoration-none text-danger">Delete</a></td>

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
