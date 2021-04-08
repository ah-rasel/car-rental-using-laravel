@extends('layouts.user')
@section('content')
    <div style="margin-top: 60px;">
        <div class="container mt-5" style="margin-top: 83px !important;">
            <div class="row">
                <div class="col col-12 col-md-4">
                    <div class="card pt-3">
                        <div class="m-auto" style="background: rgb(255,255,255);width: 170px;height: 170px;border-radius: 50%;box-shadow: 0px 0px 2px 0px black;">
                            <img class="m-auto" src="{{asset('userFiles/assets/img/img3-min.jpg')}}" style="position: relative;max-width: 150px;border-radius: 50%;box-shadow: 1px 1px 1px 3px rgb(243,243,243);top: 6%;left: 6%;">
                        </div>
                        <h3 class="text-left mt-2 text-center profile-name-heading" style="font-weight: bold;">{{$user->name}}</h3>
                        <div class="mt-2">
                            <p class="mt-0 mt-md-1 pl-4"><i class="fa fa-envelope-o mr-3"></i>Email :<span>{{$user->email}}</span></p>
                            <p class="mt-0 mt-md-1 pl-4"><i class="fa fa-phone mr-3"></i>Phone Number :<span>{{$user->phone_number}}</span></p>
                            <p class="mt-0 mt-md-1 pl-4"><i class="fa fa-address-card-o mr-3"></i>Address :<span>{{$user->address}}</span></p>
                            <p class="mt-0 mt-md-1 pl-4"><i class="fa fa-circle-o-notch mr-3"></i>Active Rents :<span>{{$active_rents->count()}}</span></p>
                            <p class="mt-0 mt-md-1 pl-4"><i class="fa fa-car mr-3"></i>Total Rents :<span>{{$rents->count()}}</span></p>
                        </div>
                    </div>
                </div>
                <div class="col col-12 col-md-8">
                    <div class="mt-3">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-center active" role="tab" data-toggle="tab" href="#tab-1">Current Rents</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-center" role="tab" data-toggle="tab" href="#tab-2">All Rents</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-center" role="tab" data-toggle="tab" href="#tab-3">Settings</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="tab-1">
                                <div class="table-responsive p-2 table-bordered table-hover">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th class="text-center">Sl.</th>
                                            <th class="text-center">Car Name</th>
                                            <th class="text-center">Amount</th>
                                            <th class="text-center">Rent Date</th>
                                            <th class="text-center">Return Date</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($current_rents as $rent)
                                        <tr>
                                            <td class="text-center" >{{$loop->iteration}}</td>
                                            <td class="text-center" ><a class="text-primary" href="#">{{$rent->car->name}}</a></td>
                                            <td class="text-center" >{{$rent->rent_amount}} USD</td>
                                            <td class="text-center" >{{$rent->rent_date->format('d M Y')}}</td>
                                            <td class="text-center" >{{$rent->return_date->format('d M Y')}}</td>
                                            <td class="text-center" ><span class="badge {{$rent->current_rent_status_color}}" style="color: white">{{$rent->current_rent_status}}</span></td>
                                            <td class="text-center" >
                                                <a class="text-danger" href="#">Cancel</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="tab-2">
                                <div class="table-responsive table-bordered table-hover p-2">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th class="text-center">Sl.</th>
                                            <th class="text-center">Car Name</th>
                                            <th class="text-center">Amount</th>
                                            <th class="text-center">Rent Date</th>
                                            <th class="text-center">Return Date</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($rents as $rent)
                                            <tr>
                                                <td class="text-center" >{{$loop->iteration}}</td>
                                                <td class="text-center" ><a class="text-primary" href="#">{{$rent->car->name}}</a></td>
                                                <td class="text-center" >{{$rent->rent_amount}} USD</td>
                                                <td class="text-center" >{{$rent->rent_date->format('d M Y')}}</td>
                                                <td class="text-center" >{{$rent->return_date->format('d M Y')}}</td>
                                                <td class="text-center" ><span class="badge {{$rent->current_rent_status_color}}" style="color: white">{{$rent->current_rent_status}}</span></td>
                                                <td class="text-center" >
                                                    <a class="text-danger" href="#">Cancel</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="tab-3">
{{--                                @livewire('user-edit-section',['user' => $user])--}}
                                @livewire('user-edit-section')
                                <a class="btn btn-block m-0" href="#">Request for changing Email and Password ?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
@endsection
