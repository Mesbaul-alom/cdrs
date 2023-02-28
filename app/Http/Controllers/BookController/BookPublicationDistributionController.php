<?php

namespace App\Http\Controllers\BookController;;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book_publication_distribution;
use App\Models\Book_publication_distribution_product;
use App\Models\Book_publication_products;
use App\Models\Book_publication_stock_unit;
use App\Models\User;
use App\Models\Book_publication_distributor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
Use PDF;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use DataTables;
use Mpdf\Tag\B;

class BookPublicationDistributionController extends Controller
{
    public function t_sold_products() {
         if(User::checkPermission('book.store.distributtion.create') == true){
        $wing = 'b_store';
        return view('pages.book_publication_store.distribution.sold_products', compact('wing'));
}
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
        }
    }


    public function purchase_products_search(Request $request){

        $info = $request->info;
        $output = '';
        
        if(!empty($info)) {
             
            $info = DB::table('book_publication_products')
                    ->Where(function ($query) use ($info) {
                        $query->where('product_title', 'LIKE', '%'. $info. '%');
                    })
                    ->limit(15)
                    ->get();
    
            if(count($info) > 0) {
                $output .= '<table class="table table-sm table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Action</th>
                                        <th scope="col"> Name</th>
                                    </tr>
                                </thead>
                                <tbody>';
                                foreach ($info as $item) {
                                     $imglink=asset('./public/images/'.$item->image);
                                    $output.='<tr>'.
                                    '<td><button type="button" onclick="add_product_data(\''.$item->product_title.'\',\''.$item->id.'\',\''.$imglink.'\',\''.$item->stock_unit.'\',\''.$item->unit_name.'\')" class="btn btn-primary btn-sm btn-rounded">+</button></td>'.
                                    '<td>
                                 ' .$item->product_title.'
                                    </td>'.
                                        
                                        
                                        '</tr>';
                                    }
                                $output .= '</tbody>
                            </table>';
    
            }
            else {
                $output.='<h2 class="text-center">No Result Found</h2>';
            }
        }
        return Response($output);
    
       }



       public function distributor_search(Request $request){

        $info = $request->info;
        $output = '';
        
        if(!empty($info)) {
             
            $info = DB::table('book_publication_distributors')
                    ->Where(function ($query) use ($info) {
                        $query->where('phone', 'LIKE', '%'. $info. '%');
                    })
                    ->orWhere(function ($query) use ($info) {
                        $query->where('distributor_name', 'LIKE', '%'. $info. '%');
                    })
                    ->limit(15)
                    ->get();
    
            if(count($info) > 0) {
                $output .= '<table class="table table-sm table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Action</th>
                                        <th scope="col">Distributor</th>
                                    </tr>  
                                </thead>
                                <tbody>';
                                foreach ($info as $item) {
                                    
                                    $output.='<tr>'.
                                    '<td><button type="button" onclick="add_distributor_data(\''.$item->distributor_name.'\',\''.$item->id.'\',\''.$item->phone.'\',\''.$item->address.'\')" class="btn btn-primary btn-sm btn-rounded">+</button></td>'.
                                    '<td>
                                 ' .$item->distributor_name.'<br>
                                 ' .$item->phone.'
                                    </td>'.
                                        
                                        
                                        '</tr>';
                                    }
                                $output .= '</tbody>
                            </table>';
    
            }
            else {
                $output.='<h2 class="text-center">No Result Found</h2>';
            }
        }
        return Response($output);
    
       }







       public function sold_store(Request $request){
            if(User::checkPermission('book.store.distributtion.create') == true){
            if($request->check_pid){
        if ($request->d_id) {
            $latest_id=Book_publication_distribution::latest()->orderBy('id', 'desc')->first();
            if( $latest_id){
               $latest_id=$latest_id->id +1; 
            }else{
                 $latest_id=0;
            }
            $invoice= rand(1000, 9999);
            $invoice_number="BS".$invoice . $latest_id;
            $user=Auth::user()->id;
            DB::table('book_publication_distributions')->insert(
                [
           'distributor_id'=>$request->d_id,
        //    'product_id'=>$request->id[$key],
        //     'qty'=>$request->id[$key],
            'invoice_number'=>$invoice_number,
            'date'=>$request->date,
            'note'=>$request->note,
            'user_id'=>$user,
        ]);
        
             foreach ($request->id  as $key => $id) {
                
                DB::table('book_publication_distribution_products')->insert(
                    
                    [
                    'distributor_id'=>$request->d_id,
                    'product_id'=>$request->id[$key],
                    'qty'=>$request->qty[$key],
                    'invoice_number'=>$invoice_number,
                    'date'=>$request->date,
            ]);
           
            $product=Book_publication_products::Find($request->id[$key]);
            $product->stock_unit -=$request->qty[$key];
            $product->save();
            }
            $data =Book_publication_distribution::with('distributor')->where('invoice_number',$invoice_number)->get()->first();
            $id= $data->id;
        $products=Book_publication_distribution_product::where('invoice_number',$data->invoice_number)->get();
            $wing = 'b_store';
            return Redirect()->route('book.store.distribute.invoices.view', $id);
            // return view('pages.tstore.distribution.sold_invoices_view', compact('wing','data','products','id'));
            }else{
                $check=Book_publication_distributor::where('phone',$request->phone)->get()->first();
                if ($check == null) {
                    $distributor=new Book_publication_distributor();
                    $distributor->distributor_name=$request->name;
                    $distributor->phone=$request->phone;
                    $distributor->address=$request->address;
                    $distributor->save();
                
                    $product=Book_publication_distributor::where('phone',$request->phone)->get()->first();
                    $d_id=$product->id;
                    $latest_id=Book_publication_distribution::latest()->orderBy('id', 'desc')->first();
            if( $latest_id){
               $latest_id=$latest_id->id +1; 
            }else{
                 $latest_id=0;
            }
            $invoice= rand(1000, 9999);
            $invoice_number="BS".$invoice . $latest_id;
    
                    $user=Auth::user()->id;
                   
                    DB::table('book_publication_distributions')->insert(
                        [
                   'distributor_id'=>$d_id,
                //    'product_id'=>$request->id[$key],
                    'invoice_number'=>$invoice_number,
                    'date'=>$request->date,
                    'note'=>$request->note,
                    'user_id'=>$user,
                ]);
                
                     foreach ($request->id  as $key => $id) {
                        DB::table('book_publication_distribution_products')->insert(
                            [
                            'distributor_id'=>$d_id,
                            'product_id'=>$request->id[$key],
                            'qty'=>$request->qty[$key],
                            'invoice_number'=>$invoice_number,
                            'date'=>$request->date,
                    ]);
                    $product=Book_publication_products::Find($request->id[$key]);
                    $product->stock_unit -=$request->qty[$key];
                    $product->save();
                    }
                    $data =Book_publication_distribution::with('distributor')->where('invoice_number',$invoice_number)->get()->first();
                    $id= $data->id;
                    $products=Book_publication_distribution_product::where('invoice_number',$data->invoice_number)->get();
                    $wing = 'b_store';
                    return Redirect()->route('book.store.distribute.invoices.view', $id);
                    // return view('pages.tstore.distribution.sold_invoices_view', compact('wing','data','products','id'));
                }else{
                    return back()->with('error','Already this distributor add!');;
                }
            
        }
            }
             else{
  
             $request->session()->flash('msg3', 'Please Add product'); 
           return back();
}
          
            }
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
        }
           }


           public function sold_invoices_print($id) {
                if(User::checkPermission('book.store.invoice.view') == true){
            $data =Book_publication_distribution::with('distributor')->where('id',$id)->get()->first();
            $products=Book_publication_distribution_product::where('invoice_number',$data->invoice_number)->get();
            $wing = 'b_store';
            $pdf = PDF::loadView('pages.book_publication_store.distribution.sold_invoices_print', compact('data','products'));
            return $pdf->stream('pages.book_publication_store.distribution.sold_invoices_print');
                }
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
        }
        }
          



        public function t_sold_invoices() {
             if(User::checkPermission('book.store.distributtion.view') == true){
            $wing = 'b_store';
            return view('pages.book_publication_store.distribution.sold_invoices', compact('wing'));
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
        }
        }



        public function distributor_list_index(Request $request)
        {
       
            if ($request->ajax()) {
                $data =Book_publication_distribution::with('distributor')->latest()->get();
                return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $info = '';
                
                    $info .= '<a style="margin-right:5px" type="button" href="'.route('book.store.distribute.invoices.view', $row->id).'" class="btn btn-success btn-sm" ><i class="fas fa-eye"></i></a> ';   
                   
                           
                    return $info;
                })
                ->addColumn('day', function($row){
                     
                      return date('d-m-Y', strtotime($row->date));
                })
                ->addColumn('customerName', function($row){
                     
                      return optional($row)->distributor->distributor_name;
                })
                ->addColumn('phone', function($row){
                     
                    return optional($row)->distributor->phone;
                })
                ->addColumn('address', function($row){
                     
                    return optional($row)->distributor->address;
                })
                ->addColumn('invoicenumber', function($row){
                    return optional($row)->invoice_number; 
                })
               
                ->rawColumns(['action','day','customerName', 'phone','address','invoicenumber'])
                        ->make(true);
            }
          
            
        }
    



        public function sold_invoices_view($id) {
               if(User::checkPermission('book.store.distributtion.view') == true){
            $data =Book_publication_distribution::with('distributor')->where('id',$id)->get()->first();
           
            $products=Book_publication_distribution_product::where('invoice_number',$data->invoice_number)->get();
            $wing = 'b_store';
            return view('pages.book_publication_store.distribution.sold_invoices_view', compact('wing','data','products','id'));
               }
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
        }
        }

}
