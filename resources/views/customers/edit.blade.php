@extends('layouts.app')
@section('header')
Edit Customer
@endsection
@section('content')
    @include('common.alert.alert')
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        Edit Customer
                    </div>
                </div>
                <div class="card-body">
                        <form action="{{ route('customers.update',$user->id) }}" method="post" enctype="multipart/form-data" class="row gy-4">
                            @csrf
                            @method('PUT')
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
