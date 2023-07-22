@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">
                        Responsive Datatable
                    </div>
                </div>
                <div class="card-body">
                    <table id="responsiveDataTable" class="table table-bordered text-nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Position</th>
                                <th>Start date</th>
                                <th>Salary</th>
                                <th>E-mail</th>
                            </tr>
                        </thead>
                     
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
