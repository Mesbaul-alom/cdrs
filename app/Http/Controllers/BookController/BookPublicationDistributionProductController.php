<?php

namespace App\Http\Controllers\BookController;;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book_publication_distribution;
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
class BookPublicationDistributionProductController extends Controller
{
    //
}
