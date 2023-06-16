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
            <form>
                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Date</label>
                    <input type="text" class="form-control date-picker" id="datePickerBasic">
                </div>
                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <textarea placeholder="" class="form-control" rows="3" data-gramm="false" wt-ignore-input="true"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

@section('js_after')
@endsection
