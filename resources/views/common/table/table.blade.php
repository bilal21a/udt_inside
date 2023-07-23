 <div class="row">
     <div class="col-xl-12">
         <div class="card custom-card">
             <div class="card-header">
                 <div class="card-title">
                     {!! $table_name !!}
                 </div>
             </div>
             <div class="card-body">
                 <table id="{{ $table_id }}" class="responsiveDataTable table table-bordered text-nowrap">
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
