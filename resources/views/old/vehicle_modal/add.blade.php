@extends('layouts.app')

@section('content')
    <!-- Title and Top Buttons Start -->

    <div class="page-title-container">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h1 class="mb-0 pb-0 display-4" id="title">Add Vehicle Modal</h1>
            </div>
        </div>
    </div>

    @include('common.alert.alert')
    <div class="card mb-5">
        <div class="card-body">
            <form action="{{ route('vehicle_modal.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('vehicle_modal.forms.common_form')
                <button type="submit" class="btn btn-primary" id="success_message">Sumbit</button>
            </form>
        </div>
    </div>
@endsection

@section('js_after')
    <script></script>
@endsection