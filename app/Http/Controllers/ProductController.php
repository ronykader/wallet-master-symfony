<?php

namespace App\Http\Controllers;

use App\KpiSetup;
use Illuminate\View\View;

class ProductController
{
    public function products(): View
    {
        $products = KpiSetup::all();
        return view('product', compact('products'));
    }
}
