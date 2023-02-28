<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RolePermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->delete();

        $permissions = [
            ['name' => 'general.store.dashboard.view', 'guard_name' => 'web', 'group_name' => 'General Store Dashboard'],
            ['name' => 'settings', 'guard_name' => 'web', 'group_name' => 'General Settings'],

            ['name' => 'role.view', 'guard_name' => 'web', 'group_name' => 'Role'],
            ['name' => 'create.role', 'guard_name' => 'web', 'group_name' => 'Role'],
            ['name' => 'update.role', 'guard_name' => 'web', 'group_name' => 'Role'],
            ['name' => 'permissions', 'guard_name' => 'web', 'group_name' => 'Role'],

            ['name' => 'crm.view', 'guard_name' => 'web', 'group_name' => 'CRM'],
            ['name' => 'crm.create', 'guard_name' => 'web', 'group_name' => 'CRM'],
            ['name' => 'crm.update', 'guard_name' => 'web', 'group_name' => 'CRM'],

            ['name' => 'general.store.product.view', 'guard_name' => 'web', 'group_name' => 'Genarel_Store_Product'],
            ['name' => 'general.store.product.create', 'guard_name' => 'web', 'group_name' => 'Genarel_Store_Product'],
            ['name' => 'general.store.product.edit', 'guard_name' => 'web', 'group_name' => 'Genarel_Store_Product'],
            ['name' => 'general.store.product.delete', 'guard_name' => 'web', 'group_name' => 'Genarel_Store_Product'],


            ['name' => 'general.store.supplier.view', 'guard_name' => 'web', 'group_name' => 'Genarel_Store_Supplier'],
            ['name' => 'general.store.supplier.create', 'guard_name' => 'web', 'group_name' => 'Genarel_Store_Supplier'],
            ['name' => 'general.store.supplier.edit', 'guard_name' => 'web', 'group_name' => 'Genarel_Store_Supplier'],
            ['name' => 'general.store.supplier.active', 'guard_name' => 'web', 'group_name' => 'Genarel_Store_Supplier'],

            ['name' => 'general.store.purchase .view', 'guard_name' => 'web', 'group_name' => 'Genarel_Store_Purchase '],
            ['name' => 'general.store.purchase.create', 'guard_name' => 'web', 'group_name' => 'Genarel_Store_Purchase '],

            ['name' => 'general.store.invoice.view', 'guard_name' => 'web', 'group_name' => 'Genarel_Store_Invoice'],
        
            ['name' => 'general.store.distributtion .view', 'guard_name' => 'web', 'group_name' => 'Genarel_Store_Distributtion '],
            ['name' => 'general.store.distributtion.create', 'guard_name' => 'web', 'group_name' => 'Genarel_Store_Distributtion '],



// technical permisiom
['name' => 'technical.store.product.view', 'guard_name' => 'web', 'group_name' => 'Technical_Store_product'],
['name' => 'technical.store.product.create', 'guard_name' => 'web', 'group_name' => 'Technical_Store_product'],
['name' => 'technical.store.product.edit', 'guard_name' => 'web', 'group_name' => 'Technical_Store_product'],
['name' => 'technical.store.product.delete', 'guard_name' => 'web', 'group_name' => 'Technical_Store_product'],


['name' => 'technical.store.invoice.view', 'guard_name' => 'web', 'group_name' => 'Technical_Store_invoice'],

['name' => 'technical.store.distributtion.view', 'guard_name' => 'web', 'group_name' => 'Technical_Store_distributtion '],
['name' => 'technical.store.distributtion.create', 'guard_name' => 'web', 'group_name' => 'Technical_Store_distributtion '],

['name' => 'technical.store.refund.view', 'guard_name' => 'web', 'group_name' => 'Technical_Store_refund'],
['name' => 'technical.store.refund.create', 'guard_name' => 'web', 'group_name' => 'Technical_Store_refund'],
['name' => 'technical.store.refund.invoice', 'guard_name' => 'web', 'group_name' => 'Technical_Store_refund'],


            //  film permision
['name' => 'film.store.product.view', 'guard_name' => 'web', 'group_name' => 'Film_Store_product'],
['name' => 'film.store.product.create', 'guard_name' => 'web', 'group_name' => 'Film_Store_product'],
['name' => 'film.store.product.edit', 'guard_name' => 'web', 'group_name' => 'Film_Store_product'],
['name' => 'film.store.product.delete', 'guard_name' => 'web', 'group_name' => 'Film_Store_product'],


['name' => 'film.store.invoice.view', 'guard_name' => 'web', 'group_name' => 'Film_Store_invoice'],

['name' => 'film.store.distributtion.view', 'guard_name' => 'web', 'group_name' => 'Film_Store_distributtion '],
['name' => 'film.store.distributtion.create', 'guard_name' => 'web', 'group_name' => 'Film_Store_distributtion '],

['name' => 'film.store.refund.view', 'guard_name' => 'web', 'group_name' => 'Film_Store_refund'],
['name' => 'film.store.refund.create', 'guard_name' => 'web', 'group_name' => 'Film_Store_refund'],
['name' => 'film.store.refund.invoice', 'guard_name' => 'web', 'group_name' => 'Film_Store_refund'],


            //  Book permision
 ['name' => 'book.store.product.view', 'guard_name' => 'web', 'group_name' => 'Book_Library_Store_product'],
 ['name' => 'book.store.product.create', 'guard_name' => 'web', 'group_name' => 'Book_Library_Store_product'],
  ['name' => 'book.store.product.edit', 'guard_name' => 'web', 'group_name' => 'Book_Library_Store_product'],
 ['name' => 'book.store.product.delete', 'guard_name' => 'web', 'group_name' => 'Book_Library_Store_product'],
                
                
['name' => 'book.store.invoice.view', 'guard_name' => 'web', 'group_name' => 'Book_Library_Store_invoice'],
             
  ['name' => 'book.store.distributtion.view', 'guard_name' => 'web', 'group_name' => 'Book_Library_Store_distributtion '],
 ['name' => 'book.store.distributtion.create', 'guard_name' => 'web', 'group_name' => 'Book_Library_Store_distributtion '],
              
    
        ];

        

        Permission::insert($permissions);

    }
}
