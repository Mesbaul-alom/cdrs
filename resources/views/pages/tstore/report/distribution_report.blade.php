@extends('layouts.app')
@section('body_content')






<div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-12">
                  <h3>বিতরণ   / Distributor Report</h3>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-body">
                    <div class="card-block row">
                        <div class="col-sm-12 col-lg-12 col-xl-12">
                          <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th scope="col">sl</th>
                                  <th scope="col">Date</th>
                                  <th scope="col">Product  Name</th>
                                  <th width="20%" scope="col">Qty</th>
                                </tr>
                              </thead>
                             <tbody>
                                 @php
                                $sl=1;
                              @endphp
                              @foreach ($products as $product)
                              <tr>
                                <th scope="row">{{$sl++}}</th>
                                <th scope="row">{{date('d-m-Y', strtotime($product->date))}}</th>
                                @php
                                $produc=\App\Models\Technical_store_products::Find($product->product_id);
                              $product_name=  $produc->product_title;
                              @endphp
                              <td>{{ $product_name}}</td>
                              <td>{{$product->qty}} {{$produc->unit_name}}</td>
                              </tr>
                              @endforeach 
                                
                            
                                
                              </tbody> 
                            </table>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>



            
          <script type="text/javascript">
          $(document).ready(function () {
    $('#example').DataTable();
});
            // $(function () {
            //   var table = $('.data-table').DataTable({
            //       processing: true,
            //       serverSide: true,
               
            //       columns: [
                     
                      
            //           {data: 'day', name: 'day'},
            //           {data: 'customerName', name: 'customerName'},
            //           {data: 'phone', name: 'phone'},
            //           {data: 'address', name: 'address'},
            //           {data: 'invoicenumber', name: 'invoicenumber'},
            //           {data: 'action', name: 'action'},
            //       ],
            //       "scrollY": "300px",
            //       "pageLength": 50,
            //       "ordering": false,
            //   });
              
            // });
          
          </script>

@endsection
