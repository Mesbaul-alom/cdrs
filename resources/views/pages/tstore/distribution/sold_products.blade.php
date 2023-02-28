@extends('layouts.app')
@section('body_content')
<style>
  .card .card-body {
   padding: 0.5px !important; 
   
}
</style>
<div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-12">
                  <h3>Technical  Product Distributtion / বিতরণ </h3>
                </div>
                <div class="col-12 col-sm-6">

                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            {{-- <form action="{{route('g.store.sold.invoices.view')}}" method="post"> --}}
            <form action="{{route('t.store.sold.store')}}" method="post"> 
              @csrf
            <div class="row">
                <div class="col-sm-4">
                    <div class="card recent-activity">
                        <div class="card-header card-no-border bg-success text-light">
                            <div class="media media-dashboard">
                                <div class="media-body"> 
                                <h5>Search Products</h5>
                                </div>
                            </div>
                            <br>
                            <input type="text" class="form-control" id="search_purchase_product" placeholder="Search....">
                        </div>
                        <h5 style="color: red">{{session('msg3')}}</h5>
                         <input type="hidden" name="check_pid" id="check_pid" class="form-control">
                    </div>
                    
               <div class="card" style="display: none" id="show1">
                <div class="card-body">
                  <div class="table-responsive" id="search_product">
                  
                  </div>
                </div>
               </div>
                
                    <div class="card recent-activity">
                        <div class="card-header card-no-border">
                        <div class="media media-dashboard border-bottom">
                            <div class="media-body"> 
                            <h5>Distributor Info</h5>
                            </div>
                        </div>
                        <br>
                        <input type="text" placeholder=" search by Phone Number or Name" id="search_distributor" class="form-control">
                       
                      
                      </div>
                    </div>
                    <div class="card" style="display: none" id="show2" >
                      <div class="card-body">
                        <div class="table-responsive" id="search_distributor_show">
                        
                        </div>
                      </div>
                     </div>
                  </div>
            <div class="col-sm-8">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-block row">
                            <div class="col-sm-12 col-lg-12 col-xl-12">
                              <div class="table-responsive" >
                                <table class="table" >
                                  <thead>
                                    <tr>
                                      <th  scope="col">IMAGE</th>
                                      <th scope="col">PRODUCT NAME</th>
                                      <th scope="col">PRODUCT STOCK</th>
                                      <th  scope="col">QUANTITY</th> 
                                    </tr>
                                  </thead>
                                  <tbody id="demo">
                                   
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                      </div>
                    </div>
                  </div>
              <div class="col-sm-12">
                <div class="card" style="padding: 25px">
                  <div class="card-body">
                    <div class="card-block">
                          <div class="row">
                            <div class="col-md-4">
                              <input type="hidden" name="d_id" id="d_id">
                              <label for="">Distributor Name</label>
                              <input type="text" id="d_name" name="name" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                              <label for="">Phone</label>
                              <input type="text" id="d_phone" name="phone" class="form-control" required>
                              @if ($message = Session::get('error'))
                              <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>	
                                      <strong>{{ $message }}</strong>
                              </div>
                              @endif
                            </div>
 
                            <div class="col-md-4">
                              <label for="">Address</label>
                              <textarea type="text" id="d_address" name="address" class="form-control" cols="10" rows="3"></textarea>
                              
                            </div>
                           
                            <div class="col-md-4" style="padding-top: 15px">
                                <div class="form-group">
                                    <label class="form-check-label"><b>Date</b></label>
                                    <input class="form-control" type="date" name="date" id="InvDate" value="{{date('Y-m-d')}}" required="">
                                </div>
                            </div>
                            <div class="col-md-4" style="padding-top: 15px">
                                <div class="form-group">
                                    <label class="form-check-label"><b>Refund Date</b></label>
                                    <input class="form-control" type="date" name="refunddate" id="InvDate" value="{{date('Y-m-d')}}" required="">
                                </div>
                            </div>
                            <div class="col-md-8" style="padding-top: 15px">
                                <div class="form-group">
                                    <label class="form-label" for="validationTooltip03">নোট / Note</label>
                                    <textarea class="form-control" name="note" id="" cols="30" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-right mt-3">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </form>
          </div>



          
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>
<script>
      $('#search_purchase_product').keyup(function () {
        var info = $(this).val();
        console.log(info);
        $.ajax({
            type: 'get',
            url: '/technical-store/purchse-products/search',
            data: {
                'info': info,
            },
            success: function (data) {
              $("#show1").show();
                $('#search_product').html(data);
                
            }
        });
    });
      $('#search_distributor').keyup(function () {
        var info = $(this).val();
        console.log(info);
        $.ajax({
            type: 'get',
            url: '/technical-store/distributor/search',
            data: {
                'info': info,
            },
            success: function (data) {
              $("#show2").show();
                $('#search_distributor_show').html(data);
                
            }
        });
    });

    function add_product_data(name, id, image, stock_unit,unit_name) {
         var i=1;
        
        if($('#check_id_'+id).val()) {
            Toastify({
                text: name+ " Is Exist Into Tabel Item.",
                backgroundColor: "linear-gradient(to right, #F50057, #2F2E41)",
                className: "error",
            }).showToast();
        }
        else {
            $('#check_pid').val("1");
             i++;  
            $('#demo').append('<tr id="row'+id+'" class="dynamic-added" style="background-color:#F2F2F2;color: #000;"><td><input type="hidden" id="check_id_'+id+'" value="'+id+'"><input type="hidden"  name="id[]" value="'+id+'"><strong><img src="'+image+'" width="50px" alt=""></strong></td><td><strong class="pd-name">'+name+'</strong></td></td><td><strong class="pd-name">'+stock_unit+' '+unit_name+'</strong></td><td><input type="number"  max="'+stock_unit+'" id="amount" class="amount form-control" name="qty[]" required="Please valid  Qty"><td><button type="button" name="remove" id="'+id+'" class="btn btn-danger btn_remove amount">X</button></td></tr>');
            $("#show1").hide();
          }  
    }
    function add_distributor_data(name, id, phone, address) {
       
       
       $('#d_name').val(name);
       $('#d_phone').val(phone);
       $('#d_address').val(address);
       $('#d_id').val(id);
       $("#show2").hide();
 
}
    $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id"); 
           $('#row'+button_id+'').remove();  
           sum();
      }); 

</script>
@endsection
