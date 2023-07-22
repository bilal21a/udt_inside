 {{-- <div class="data-table-rows slim">
     <!-- Table Start -->
     <div class="data-table-responsive-wrapper">
         <table id="{{ $tableName }}" class="responsiveDataTable table table-bordered text-nowrap" style="width:100%">
             <thead>
                 <tr style="width: 40px">
                     @foreach ($tableData as $data)
                         <th class="text-muted text-small text-uppercase">{{ $data }}</th>
                     @endforeach
                 </tr>
             </thead>
         </table>
     </div>
     <!-- Table End -->
 </div> --}}


 <div class="row">
     <div class="col-xl-12">
         <div class="card custom-card">
             <div class="card-header">
                 <div class="card-title">
                     Responsive Datatable
                 </div>
             </div>
             <div class="card-body">
                 <table id="{{ $tableName }}" class="responsiveDataTable table table-bordered text-nowrap"
                     style="width:100%">
                     <thead>
                         <tr>
                             @foreach ($tableData as $data)
                                 <th>{{ $data }}</th>
                             @endforeach
                         </tr>
                     </thead>

                     <tbody></tbody>
                 </table>
             </div>
         </div>
     </div>
 </div>
