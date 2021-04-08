<div>
    <form wire:submit.prevent="UpdaeUser" class="p-4" method="POST">
        @csrf
        <div class="form-row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Full Name</label>
                    <input wire:model="user.name" class="form-control" type="text" name="name" placeholder="Enter your Name"></div>
                <div class="form-group">
                    <label>Phone Number</label>
                    <input wire:model="user.phone_number" class="form-control" type="text"  name="phone-number" placeholder="Your Phone Number"></div>
                <div class="form-group">
                    <label>Address</label>
                    <input wire:model="user.address" class="form-control" type="text" name="address" placeholder="Your Address" ></div>
                <div class="form-group">
                    <input class="form-control btn btn-success btn-block m-0" type="submit" value="Update Profile Details " /></div>
            </div>
        </div>
    </form>
</div>
