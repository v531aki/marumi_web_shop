<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel; 
use App\Exports\CategoriesExport; 

class CategoryController extends Controller
{
    public function export(){
        return Excel::download(new CategoriesExport, 'categories.xlsx'); 
    }
}
