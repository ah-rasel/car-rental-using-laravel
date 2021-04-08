<div wire:poll class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$total_cars}}</h3>

                <p>Total Cars</p>
            </div>
            <div class="icon">
                <i class="fa fa-car-alt"></i>
            </div>
            <a href="all-cars.html" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{$total_brands}}</h3>

                <p>Brands</p>
            </div>
            <div class="icon">
                <i class="fa fa-list-alt"></i>
            </div>
            <a href="all-brands.html" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3 >{{$new_rents}}</h3>

                <p>New Rent Request</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="new-rent-request.html" class="small-box-footer text-white">
                More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-gradient-lightblue">
            <div class="inner">
                <h3>{{$total_users}}</h3>

                <p>Customers</p>
            </div>
            <div class="icon">
                <i class="fa fa-user-alt"></i>
            </div>
            <a href="users.html" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
