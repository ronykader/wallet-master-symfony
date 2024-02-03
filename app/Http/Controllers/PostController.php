<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): string
    {
        return view('welcome');
    }

    public function show(): View
    {
        return view('app');
    }
}
