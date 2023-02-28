<?php

namespace App\Http\Controllers\BookController;;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book_publication_distribution;
use App\Models\User;
use App\Models\Book_publication_distribution_product;
use App\Models\Book_publication_products;
use App\Models\Book_publication_stock_unit;
use App\Models\Book_publication_distributor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
Use PDF;
use DataTables;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class BookPublicationDistributorController extends Controller
{
    public function customers() {
        
         if(User::checkPermission('book.store.report') == true){
        $wing = 'b_store';
        return view('pages.book_publication_store.report.customers', compact('wing'));
}
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
        }
    }

    public function distributor_index(Request $request)
    {
   
        if ($request->ajax()) {
            $data =Book_publication_distributor::all();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $info = '';
               
                        $info .= ' <a style="margin-right:5px;" href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct"">Edit</a><a type="button" href="'.route('book.store.distributor.report.view', $row->id).'" class="btn btn-sm btn-warning">View Report</a> ';   
                        // $info .= '<a type="button"  class="btn btn-success btn-sm" ><i class="fas fa-eye"></i></a> ';   
                return $info;
            })
            ->addColumn('name', function($row){
                 
                  return optional($row)->distributor_name;
            })
            ->addColumn('phone', function($row){
                 
                return optional($row)->phone;
            })
            ->addColumn('address', function($row){
                 
                return optional($row)->address;
            })
           
           
            ->rawColumns(['action','name', 'phone','address'])
                    ->make(true);
        }
      
        
    }

    public function distributor_report_view($id){
         if(User::checkPermission('book.store.report') == true){
        $products=Book_publication_distribution_product::where('distributor_id',$id)->get();
       
        $wing = 'b_store';
        return view('pages.book_publication_store.report.distribution_report', compact('wing','products'));
         }
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
        }
    }

 

public function ajax_distributor_index($product_id){
    $product = Book_publication_distributor::find($product_id);
    return response()->json($product);
}
public function update_distributor(Request $request){
  
            $checkphone=Book_publication_distributor::where('phone',$request->phone)->first();
         if( $checkphone == null){
              $distrubutir = Book_publication_distributor::find($request->d_id);
        $distrubutir->distributor_name=$request->name;
        $distrubutir->phone=$request->phone;
        $distrubutir->address=$request->address;
        $distrubutir->save();
        return back();
               }
        elseif($checkphone){
             if($checkphone->id == $request->d_id){
                  $distrubutir = Book_publication_distributor::find($request->d_id);
        $distrubutir->distributor_name=$request->name;
        $distrubutir->phone=$request->phone;
        $distrubutir->address=$request->address;
        $distrubutir->save();
        return back();
            
             }
             else{
                 
                    $request->session()->flash('msg', 'Phone number already exits'); 
                 return back();
             }
        
        
        
        
        }
}
}
