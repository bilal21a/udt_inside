@extends('layouts.app')

@section('content')
    <!-- Title and Top Buttons Start -->
    <div class="page-title-container">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h1 class="mb-0 pb-0 display-4" id="title">Add Customer</h1>
            </div>
        </div>
    </div>


    <div class="card mb-5">
        <div class="card-body">
            <form action="{{ route('customers.store') }}"  method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">First Name</label>
                    <input type="text" name="first_name" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Last Name</label>
                    <input type="text" name="last_name" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control date-picker" id="">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">CNIC</label>
                    <input type="text" name="cnic" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Profile Image</label>
                    <input type="file" name="profile_image" class="form-control" name="image">
                </div>
                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <textarea placeholder="" name="address" class="form-control" rows="3" data-gramm="false" wt-ignore-input="true"></textarea>
                </div>
                <div class="mb-4">
                    <label class="form-label d-block">Gender</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1"
                            value="Male">
                        <label class="form-check-label" for="inlineRadio1">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2"
                            value="Female">
                        <label class="form-check-label" for="inlineRadio2">Female</label>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary" id="success_message" >Sumbit</button>
            </form>
        </div>
    </div>
@endsection

@section('js_after')
<script>

</script>
@endsection
