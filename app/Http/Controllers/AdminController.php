<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusinessSetting;
use App\Models\Genarel_store_product;
use App\Models\Genarel_store_purchase;;
use App\Models\Genarel_store_distribution;
use App\Models\Genarel_store_distribution_product;
use App\Models\Genarel_store_purchase_product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Faker\Guesser\Name;
use Image;
use PDF;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;
class AdminController extends Controller
{
    public function dashboard() {
        $wing = 'g_store';
        \Artisan::call('route:clear');
         \Artisan::call('permission:cache-reset');
        return view('pages.dashboard', compact('wing'));
    }
    public function registration() {
      
       
        return view('auth.register', );
    }

    public function setting() {
        if(User::checkPermission('bdistributtion.create') == true){
            $wing = 'g_store';
            $setting=BusinessSetting::all()->first();
            return view('pages.setting', compact('wing','setting'));
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
        }
    }
    
    public function account($wing){
    
        $id=Auth::user()->id;
        $user=User::find($id);
          $wing = $wing;
       return view('pages.account',compact('user','wing'));
    } 
    public function userupdate(Request $request){
 
        $id=Auth::user()->id;
        $check=User::where('email',$request->email)->first();
        if($check == null){
              $user=User::find($id);
              $user->name=$request->name;
              $user->email=$request->email;
              $user->phone=$request->phone;
              $user->save();
          $wing = $request->wing;
       return view('pages.account',compact('user','wing'))->with('success','user info update successfully');
        }elseif($check){
           if($check->id == $id){
                 $user=User::find($id);
              $user->name=$request->name;
              $user->email=$request->email;
              $user->phone=$request->phone;
              $user->save();
          $wing = $request->wing;
       return view('pages.account',compact('user','wing'))->with('success','user info update successfully');
           } 
           else{
             $wing=$request->wing;
            $request->session()->flash('msg', 'Email already exits'); 
           return Redirect()->route('user.account', $wing);
        };
        }
          
      
    } 
    public function passwordupdate(Request $request){
 
        $id=Auth::user()->id;
       	$user = Auth::user();
    	$c_password = $request->cpassword;
    	$n_password = $request->newpassword;
    	//dd(Hash::make($c_password));
    	if (Hash::check($request->cpassword, $user->password)) {
    		if ($n_password) {
    			$user->password = Hash::make($n_password);
    			$user->save();
                // Alert::toast('Password has been updated', 'success');
                  $wing=$request->wing;
        	 return Redirect()->route('user.account', $wing)->with('success','user Email update successfully');
    		}
    	}
    	else{
    	      $wing=$request->wing;
            $request->session()->flash('msg1', 'Current Password not Valid'); 
         return Redirect()->route('user.account', $wing);
    	}
          
      
    } 

    public function role() {
        $wing = 'g_store';
        if(User::checkPermission('role.view') == true) {
            $roles = DB::table('roles')->get();
            return view('pages.role', compact('wing','roles'));
        }
        else {
            return 'coming soon user dashboard';
        }
        
    }

    public function permissions() {
        $wing = 'g_store';
        
        return view('pages.permissions', compact('wing'));
    }

    public function crm() {
        $wing = 'g_store';
        if(User::checkPermission('crm.view') == true){  
          
            $roles = DB::table('roles')->get();
            $crms = DB::table('users')
                    ->join('model_has_roles', 'users.id', 'model_has_roles.model_id')
                    ->select('users.*', 'model_has_roles.role_id')
                    ->where('users.type', 'crm')
                    ->get();
            
            return view('pages.crm.index', compact('crms', 'roles','wing'));
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
        }
    }

    public function add_products() {
         if(User::checkPermission('general.store.product.create') == true){
        $wing = 'g_store';
        return view('pages.product.add_products', compact('wing'));
         }
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
        }
    }

    public function all_products() {
         if(User::checkPermission('general.store.supplier.view') == true){
        $wing = 'g_store';
$products=Genarel_store_product::all();
        return view('pages.product.all_products', compact('wing','products'));
         }
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
        }
    }

    public function current_stock_products() {
         if(User::checkPermission('general.store.supplier.view') == true){
        $wing = 'g_store';
        return view('pages.current_stock_products', compact('wing'));
         }
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
        }
    }

   

    public function purchase_products() {
         if(User::checkPermission('general.store.purchase.create') == true){
        $wing = 'g_store';
        return view('pages.purchase_products', compact('wing'));
         }
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
        }
    }

    public function purchase_invoices() {
         if(User::checkPermission('general.store.invoice.view') == true){
        $wing = 'g_store';
       $purchases=Genarel_store_purchase::with('supplier')->get();
    
        return view('pages.purchase_invoices', compact('wing','purchases'));
         }
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
        }
    }

    public function purchase_invoices_view($id) {
        if(User::checkPermission('general.store.invoice.view') == true){
        $data = Genarel_store_purchase::with('supplier')->where('id',$id)->get()->first();
        $products=Genarel_store_purchase_product::where('invoice_number',$data->invoice_number)->get();
        $wing = 'g_store';
        return view('pages.purchase_invoices_view', compact('wing','data','products','id'));
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
        }
    }
    public function purchase_invoices_print($id) {
        if(User::checkPermission('general.store.invoice.view') == true){
        $data = Genarel_store_purchase::with('supplier')->where('id',$id)->get()->first();
        $products=Genarel_store_purchase_product::where('invoice_number',$data->invoice_number)->get();
        $wing = 'g_store';
        $pdf = PDF::loadView('pages.purchase_invoices_print', compact('data','products'));
        return $pdf->stream('pages.purchase_invoices_print');
        // return view('pages.purchase_invoices_print', compact('wing','data','products','id'));
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
        }
    }
  

    public function sold_products() {
        if(User::checkPermission('general.store.distributtion.create') == true){
        $wing = 'g_store';
        return view('pages.sold_products', compact('wing'));
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
        }
    }

    public function sold_invoices() {
         if(User::checkPermission('general.store.invoice.view') == true){
        $wing = 'g_store';
        $distributors=Genarel_store_distribution::with('distributor')->get();
       
        return view('pages.sold_invoices', compact('wing','distributors'));
         }
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
        }
    }

    public function sold_invoices_view($id) {
         if(User::checkPermission('general.store.invoice.view') == true){
        $data =Genarel_store_distribution::with('distributor')->where('id',$id)->get()->first();
        $products=Genarel_store_distribution_product::where('invoice_number',$data->invoice_number)->get();
        $wing = 'g_store';
        return view('pages.sold_invoices_view', compact('wing','data','products','id'));
         }
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
        }
    }

    public function sold_invoices_print($id) {
        $data =Genarel_store_distribution::with('distributor')->where('id',$id)->get()->first();
        $products=Genarel_store_distribution_product::where('invoice_number',$data->invoice_number)->get();
        $wing = 'g_store';
        $pdf = PDF::loadView('pages.sold_invoices_print', compact('data','products'));
        return $pdf->stream('pages.sold_invoices_print');
        
    }

    public function customers() {
         if(User::checkPermission('general.store.report') == true){
        $wing = 'g_store';
        return view('pages.customers', compact('wing'));
         }
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
        }
    }

    public function products_ledger_table() {
         if(User::checkPermission('general.store.report') == true){
        $wing = 'g_store';
        return view('pages.products_ledger_table', compact('wing'));
         }
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
        }
    }

    public function technical_store_dashboard() {
        $wing = 't_store';
        return view('pages.tstore.technical_store_dashboard', compact('wing'));
    }

    public function t_add_products() {
         if(User::checkPermission('technical.store.product.create') == true){
        $wing = 't_store';
        return view('pages.tstore.product.add_products', compact('wing'));
         }
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
        }
    }

    public function t_all_products() {
        $wing = 't_store';
        return view('pages.tstore.t_all_products', compact('wing'));
    }

  


  

    public function t_customers() {
        $wing = 't_store';
        return view('pages.tstore.t_customers', compact('wing'));
    }

    
  
    
    
    
    
    
    
    
    // film store
    
    public function film_store_dashboard() {
        $wing = 'f_store';
        return view('pages.film_store.film_store_dashboard', compact('wing'));
    }

    public function film_add_products() {
        $wing = 'f_store';
        return view('pages.film_store.film_add_products', compact('wing'));
    }

    public function film_all_products() {
        $wing = 'f_store';
        return view('pages.film_store.film_all_products', compact('wing'));
    }

    public function film_current_stock_products() {
        $wing = 'f_store';
        return view('pages.film_store.film_current_stock_products', compact('wing'));
    }

    public function film_sold_products() {
        $wing = 'f_store';
        return view('pages.film_store.film_sold_products', compact('wing'));
    }

    public function film_sold_invoices() {
        $wing = 'f_store';
        return view('pages.film_store.film_sold_invoices', compact('wing'));
    }

    public function film_customers() {
        $wing = 'f_store';
        return view('pages.film_store.film_customers', compact('wing'));
    }

    public function film_products_ledger_table() {
        $wing = 'f_store';
        return view('pages.film_store.film_products_ledger_table', compact('wing'));
    }
    
    public function refund_film_sold_products() {
        $wing = 'f_store';
        return view('pages.film_store.refund_film_sold_products', compact('wing'));
    }
    
    public function refund_film_sold_invoices_view() {
        $wing = 'f_store';
        return view('pages.film_store.refund_film_sold_invoices_view', compact('wing'));
    }
    
    
    
    
    // Book and publication store
    
    public function book_store_dashboard() {
        $wing = 'b_store';
        return view('pages.book_publication_store.bp_store_dashboard', compact('wing'));
    }

    public function book_add_products() {
        $wing = 'b_store';
        return view('pages.book_publication_store.bp_add_products', compact('wing'));
    }

    public function book_all_products() {
        $wing = 'b_store';
        return view('pages.book_publication_store.bp_all_products', compact('wing'));
    }

    public function book_current_stock_products() {
        $wing = 'b_store';
        return view('pages.book_publication_store.bp_current_stock_products', compact('wing'));
    }

    public function book_sold_products() {
        $wing = 'b_store';
        return view('pages.book_publication_store.bp_sold_products', compact('wing'));
    }

    public function book_sold_invoices() {
        $wing = 'b_store';
        return view('pages.book_publication_store.bp_sold_invoices', compact('wing'));
    }

    public function book_customers() {
        $wing = 'b_store';
        return view('pages.book_publication_store.bp_customers', compact('wing'));
    }

    public function book_products_ledger_table() {
        $wing = 'b_store';
        return view('pages.book_publication_store.bp_products_ledger_table', compact('wing'));
    }
    

    public function create_role(Request $request) {
         if(User::checkPermission('create.role') == true) {
            $role_name = $request->name;
            $check = DB::table('roles')->where('name', $role_name)->first();
            if(!empty($check->id)) {
                return Redirect()->back()->with('error', 'This role is already exist!');
            }
            else {
                $data = array();
                $data['name'] = $role_name;
                $data['guard_name'] = 'web';
                $data['created_at'] = Carbon::now();

                $insert = DB::table('roles')->insert($data);
                if($insert) {
                    return Redirect()->back()->with('success', 'New role has been created.');
                }
                else {
                    return Redirect()->back()->with('error', 'Error Occoured, Please Try again.');
                }
            }
        }
        else {
            return 'coming soon user dashboard';
        }
    }
    

    
    //Begin:: Edit Admin helper role
    public function Edit_Admin_helper_role($id) {
        $wing = 'g_store';
        if(User::checkPermission('update.role') == true){
            $role_info = DB::table('roles')->where('id', $id)->first();
            if(!empty($role_info->id)) {
                return view('pages.roles.edit_role', compact('role_info','wing'));
            }
            else {
                return Redirect()->back()->with('error', 'Sorry you can not access this page');
            }
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
        }
        
    }
    //Begin:: Edit Admin helper role

    //Begin:: Update Admin helper role
    public function update_Admin_helper_role(Request $request, $id) {
        $wing = 'g_store';
        if(User::checkPermission('update.role') == true){
            $role_name = $request->name;
            $check = DB::table('roles')->where('name', $role_name)->first();
            if(!empty($check->id)) {
                return Redirect()->back()->with('error', 'Sorry, This role is already exist!');
            }
            else {
                $data = array();
                $data['name'] = $role_name;
                $data['updated_at'] = Carbon::now();
                $update = DB::table('roles')->where('id', $id)->update($data);
                if($update) {
                    return Redirect()->route('admin.role')->with('success', 'Role has benn Updated.');
                }
                else {
                    return Redirect()->back()->with('error', 'Error Occoured, Please Try again.');
                }
                
            }
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
        }
        
    }
    //End:: Update Admin helper role


    //Begin:: Update Admin helper role Permission
    public function admin_helper_permission($id) {
      
        if(User::checkPermission('permissions') == true){
            $role = Role::findById($id);
            $permissions = Permission::all();
            $permissionGroups = User::getPermissionGroupsForAdminHealperRole();
          
            $wing = 'g_store';
            return view('pages.roles.permissions', compact('permissions', 'permissionGroups', 'role', 'wing'));
        }
        else {
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
        }
    }
    //End:: Update Admin helper role Permission

    //Begin:: Set Permission to admin helper role
    public function set_permission_to_admin_helper_role() {
        $role_id = $_GET['roleID'];
        $permission_id = $_GET['permission_id'];
    
        $check = DB::table('role_has_permissions')->where('role_id', $role_id)->where('permission_id', $permission_id)->first();
        if(empty($check->role_id)) {
            $data = array();
            $data['role_id'] = $role_id;
            $data['permission_id'] = $permission_id;

            $insert = DB::table('role_has_permissions')->insert($data);

            if($insert) {
                \Artisan::call('permission:cache-reset');
                $sts = [
                    'status' => 'yes',
                    'reason' => 'Permission set successfully'
                ];
                return response()->json($sts);
            }
            else {
                $sts = [
                    'status' => 'no',
                    'reason' => 'Something is wrong, please try again.'
                ];
                return response()->json($sts);
            }
            
        }
        else {
            $sts = [
                'status' => 'no',
                'reason' => 'Permission is already exist, Please try another.'
            ];
            return response()->json($sts);
        }
        
    }
    //End:: Set Permission to admin helper role


    //Begin:: Delete Permission from role
    public function delete_permission_from_role() {
        $role_id = $_GET['roleID'];
        $permission_id = $_GET['permission_id'];
        
        $check = DB::table('role_has_permissions')->where('role_id', $role_id)->where('permission_id', $permission_id)->first();
        if(!empty($check->role_id)) {
            
            $delete = DB::table('role_has_permissions')->where('role_id', $role_id)->where('permission_id', $permission_id)->delete();
            if($delete) {
                \Artisan::call('permission:cache-reset');
                $sts = [
                    'status' => 'yes',
                    'reason' => 'Permission Delete successfully'
                ];
                return response()->json($sts);
            }
            else {
                $sts = [
                    'status' => 'no',
                    'reason' => 'Something is wrong, please try again.'
                ];
                return response()->json($sts);
            }
            
        }
        else {
            $sts = [
                'status' => 'no',
                'reason' => 'Permission is not exist, Please try another.'
            ];
            return response()->json($sts);
        }
        
    }
    //End:: Delete Permission from role

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    
}