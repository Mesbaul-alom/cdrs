<?php

namespace App\Http\Controllers\BookController;;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book_publication_distribution;
use App\Models\Book_publication_distribution_product;
use App\Models\Book_publication_products;
use App\Models\Book_publication_stock_unit;
use App\Models\Book_publication_distributor;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
Use PDF;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Image;
use DataTables;


class BookPublicationProductsController extends Controller
{
    public function add_products() {
           if(User::checkPermission('book.store.product.create') == true){
        $wing = 'b_store';
        return view('pages.book_publication_store.product.add_products', compact('wing'));
}
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
        }
    } 

    public function productstore(Request $request){
         if(User::checkPermission('book.store.product.create') == true){
               $check=Book_publication_products::where('product_title',$request->name)->first();
        if($check == null){
        $latest_id=Book_publication_products::latest()->orderBy('id', 'desc')->first();
        if( $latest_id){
            $latest_id=$latest_id->id +1; 
        }else{
            $latest_id=0;
        }
        $randomNumber = random_int(100, 999);
        $code="FS".$randomNumber . $latest_id;;
        $product=new Book_publication_products;
        
          $product->code =$code;	
        $product->product_title	= $request->name;
        $product->unit_name	=$request->unit;
        $product->description	=$request->description;
        $product->stock_unit = $request->qty;
        $product->distributed_unit = 0;
         if($request->image){
             $logo = $request->file('image');
                $imageName = hexdec(uniqid()).".".$logo->getClientOriginalExtension();
                Image::make($logo)->resize(260, 90)->save('./public/images/'.$imageName);
                $product->image	=$imageName;
        }
         $product->save();


         $stock=Book_publication_products::where('code',$code)->pluck('id');
         $user=Auth::user()->id;
         $today = Carbon::today();
         $pro=new Book_publication_stock_unit();
       $pro->product_id	=$stock;
       $pro->note	=$request->description;
       $pro->qty	=$request->qty;
       $pro->added_by =  $user;
       $pro->date = $today;
        $pro->save();


    
         return redirect('/book-publication/products/list')->with('success','product  add successfully');
         }
         else{
         return Redirect()->back()->with('error', 'Sorry Product Name Already Exits');
    }
}
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
        }
      }


      public function all_products() {
           if(User::checkPermission('book.store.product.view') == true){
        $wing = 'b_store';
$products=Book_publication_products::all();
        return view('pages.book_publication_store.product.all_products', compact('wing','products'));
           }
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
        }
    }

    public function product_list_index(Request $request)
    {
   
        if ($request->ajax()) {
            $data = Book_publication_products::latest()->get();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $info = '';
               
                        $info .= '<a type="button" style="margin-right:5px"  href="'.route('book.store.product.edit', $row->id).'"  class="btn btn-success btn-sm rounded-pill" ><i class="fas fa-edit"></i></a><a type="button"  href="'.route('book.store.product.details', $row->id).'" class="btn btn-primary btn-sm rounded-pill" ><i class="fas fa-eye"></i></a> ';   
                return $info;
            })
                ->addColumn('image', function($row){
            return '<img src="'.asset('./public/images/'.optional($row)->image).'" style="width: 50px;" class="rounded" >';
        })
            ->addColumn('name', function($row){
                
                return optional($row)->product_title;
            })
            ->addColumn('distributionstock', function($row){
                return optional($row)->distributed_unit .' '. $row->unit_name ; 
            })
            ->addColumn('currentstock', function($row){
                return optional($row)->stock_unit .' '. $row->unit_name; 
            })
            ->rawColumns(['action','image','name','distributionstock','currentstock'])
                    ->make(true);
        }
      
      
    }
    public function product_edit($id){
         if(User::checkPermission('book.store.product.edit') == true){
        $wing = 'b_store';
    $product=Book_publication_products::find($id);
    return view('pages.book_publication_store.product.edit',compact('product','wing'));
         }else{
  
             $request->session()->flash('msg3', 'Please Add product'); 
           return back();
}
      } 

      public function productupdate(Request $request){
           if(User::checkPermission('book.store.product.edit') == true){
               
               
                    $check=Book_publication_products::where('product_title',$request->name)->first();
        if($check == null){
        $product=Book_publication_products::find($request->id);
        $product->product_title	= $request->name;
        $product->unit_name	=$request->unit;
         if($request->new_stock_unit){
        $product->stock_unit	+=$request->new_stock_unit;
         }
        $product->description	=$request->description;
        // $product->stock_unit = $request->qty;
          if($request->image){
                if(is_file(public_path(optional($product)->image))){
                    unlink($product->logo);
                }
             $logo = $request->file('image');
                $imageName = hexdec(uniqid()).".".$logo->getClientOriginalExtension();
                Image::make($logo)->resize(260, 90)->save('./public/images/'.$imageName);
                $product->image	=$imageName;
           }
        
         $product->save();



        if($request->new_stock_unit){
         $user=Auth::user()->id;
         $today = Carbon::today();
         $pro=new Book_publication_stock_unit();
       $pro->product_id	=$request->id;
       $pro->note	=$request->description;
       $pro->qty	=$request->new_stock_unit;
       $pro->added_by =  $user;
       $pro->date = $today;
        $pro->save();
}
      
         return redirect('/book-publication/products/list')->with('success','product  add successfully');
         
         
        }elseif($check){
            if($check->id == $request->id){
             $product=Book_publication_products::find($request->id);
        $product->product_title	= $request->name;
        $product->unit_name	=$request->unit;
         if($request->new_stock_unit){
        $product->stock_unit	+=$request->new_stock_unit;
         }
        $product->description	=$request->description;
        // $product->stock_unit = $request->qty;
          if($request->image){
                if(is_file(public_path(optional($product)->image))){
                    unlink($product->logo);
                }
             $logo = $request->file('image');
                $imageName = hexdec(uniqid()).".".$logo->getClientOriginalExtension();
                Image::make($logo)->resize(260, 90)->save('./public/images/'.$imageName);
                $product->image	=$imageName;
           }
        
         $product->save();



        if($request->new_stock_unit){
         $user=Auth::user()->id;
         $today = Carbon::today();
         $pro=new Book_publication_stock_unit();
       $pro->product_id	=$request->id;
       $pro->note	=$request->description;
       $pro->qty	=$request->new_stock_unit;
       $pro->added_by =  $user;
       $pro->date = $today;
        $pro->save();
}
      
         return redirect('/book-publication/products/list')->with('success','product  add successfully');
         
            } else{
         return Redirect()->back()->with('error', 'Sorry Product Name Already Exits');
    }
        }
         
           }
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
        }
      }




      public function t_current_stock_products() {
           if(User::checkPermission('book.store.product.view') == true){
        $wing = 'b_store';
        return view('pages.book_publication_store.product.current_stock_products', compact('wing'));
           }
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
        }
    }

    public function t_products_ledger_table() {
         if(User::checkPermission('book.store.report') == true){
        $wing = 'b_store';
        return view('pages.book_publication_store.report.products_ledger_table', compact('wing'));
         }
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
        }
    }

    public function product_report_index(Request $request)
    {
   
        if ($request->ajax()) {
            $data = Book_publication_products::latest()->get();
            return Datatables::of($data)
            ->addIndexColumn()
     
            ->addColumn('action', function($row){
                $info = '';
               
                        $info .= '<a type="button"  href="'.route('book.store.product.details', $row->id).'"  class="btn btn-success btn-sm" >বিস্তারিত</a> ';   
                return $info;
            })
                ->addColumn('image', function($row){
            return '<img src="'.asset('./public/images/'.optional($row)->image).'" style="width: 50px;" class="rounded" >';
        })
            ->addColumn('name', function($row){
                
                return optional($row)->product_title;
            })
            ->addColumn('distribute', function($row){
                 $purchase=Book_publication_distribution_product::where('product_id',$row->id)->sum('qty');  ; 
                return $purchase  .' '. $row->unit_name;
            })
            ->addColumn('currentstock', function($row){
                return optional($row)->stock_unit .' '. $row->unit_name ; 
            })
            ->rawColumns(['action','image','name','purchases','distribute','currentstock'])
                    ->make(true);
        }
      
        
    }

    public function product_details($id){
        $wing = 'b_store';
        $product=Book_publication_products::where('id',$id)->first();
        $d_products=Book_publication_distribution_product::where('product_id',$id)->paginate(10);
        $stocks=Book_publication_stock_unit::where('product_id',$id)->paginate(10);
         $unit_name=$product->unit_name;
        return view('pages.book_publication_store.report.product_details_report',compact('id','wing','d_products','product','stocks','unit_name'));
    }
}
