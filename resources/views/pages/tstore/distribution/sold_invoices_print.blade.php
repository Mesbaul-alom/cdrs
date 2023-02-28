<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sold Invoice</title>
</head>
<style>
    @page {
        header: page-header;
        footer: page-footer;
        
    }

    body {
        font-family: 'examplefont', nikosh;
    }

    li {
        list-style: none;
        float: left;
        overflow: hidden;
    }

    p {
        font-size: 13px;
    }

    .customar_info {
        width: 100%;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid black;
        text-align: left;
        padding: 5px;
        font-size: 13px;
    }

    .invoiceIDandDate {
        text-align: right;

    }

    .clientInfo {
        background-color: red;
    }

</style>

<body>
  @php
  $logo=\App\Models\BusinessSetting::latest()->get()->first();

@endphp
<div name="page-header">
    <div>
          <table >
          <tr>
              <td style="border: 0px solid white;">
                  <div>
                    <img src="{{public_path($logo->logo)}}" alt=""> 
                  </div>
              </td>
              <td style="text-align: right; border: 0px solid white;">
                  <div>
                  <p style="font-size: 13px; text-align: right; overflow: hidden;"><span style="font-size: 15px; font-weight: bold;">
                      {{$logo->company_name}}</span><br>
                          {{$logo->email}}<br>
                          {{$logo->website}}
                      </p>
                      </div>
              </td>
          </tr>
      </table>
      
          <hr style="border: 1px solid #81d4fa;">
      </div>
    </div> 

    
    
    <div>
        <table>
            <tr>
                <th style="border: 0px solid white;">
                    <div>
                        <p>
                          <h3> Distributor Info,</h3> <br>
                           Name: {{$data->distributor->distributor_name}}<br>
                           Phone: {{$data->distributor->phone}}<br>
                           Address: {{$data->distributor->address}}<br>
                           
                          </p>
                         
                    </div>
                </th>
                <th style="text-align: right; border: 0px solid white;">
                    <p class="invoiceIDandDate" style="font-family: Arial;">Invoice #{{$data->invoice_number}}<br>Date:
                        {{date('d-m-Y', strtotime(optional($data)->date))}}
                        </p>
                </th>
            </tr>
        </table>
    </div>
    <br />
    <div>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr style="text-align: right; background-color: #dddddd;">
                    <th scope="col" style="text-align: center;">SN</th>
                    <th style="text-align: left;">Product Name</th>
                    <th scope="col" style="text-align: center;">Quantity</th>
                
                </tr>
            </thead>
            <tbody>
                @php
                $i = 1
                @endphp
                @foreach($products as $product)
                <tr style="text-align: right;">
                    <th scope="row" style="text-align: center;">{{$i}}</th>
                    
                       
                      @php
                      $produc=\App\Models\Technical_store_products::Find($product->product_id);
                    $product_name=  $produc->product_title;
                    @endphp
                    <td>{{ $product_name}}</td>
                    <td style="text-align: center;">{{ $product->qty}} {{$produc->unit_name}}</td>
                    
                   
                </tr>
                @php
                $i += 1
                @endphp
                
                @endforeach
            </tbody>
        </table>
    </div>
    
    <div>
      <br>
        <p><b>Note:</b></p>
        {{optional($data)->note}}

 
    </div>
    <htmlpagefooter name="page-footer">
        <table width="100%">
            <tr>
                <td width="33%" style="border: 0px solid white;">{PAGENO} </td>
                <td width="33%" style="text-align: center; border: 0px solid white;">
                    <p style="font-size: 13px; text-align: center; font-family: Arial; border-top: 1px solid #000000;">Authorized Signature </p>
                </td>
                <td width="33%" style="text-align: center; border: 0px solid white;">
                    <p style="font-size: 13px; text-align: center; font-family: Arial; border-top: 1px solid #000000;">Supplier Signature </p>
                </td>
            </tr>
        </table>
    </htmlpagefooter>
</body>
</html>