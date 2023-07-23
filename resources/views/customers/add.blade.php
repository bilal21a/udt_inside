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

    @include('common.alert.alert')
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        Add Customer
                    </div>
                </div>
                <div class="card-body">
                        <form action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data" class="row gy-4">
                            @csrf
                            @include('customers.forms.common_form')
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary" id="success_message">Sumbit</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_after')
    <script></script>
@endsection
