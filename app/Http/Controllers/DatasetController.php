<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Dataset;

class DatasetController extends Controller
{
    public function index(){
        $dataset = Dataset::orderBy('created_at', 'desc')->where('class', 'positive')->paginate(25);

        return view('datasets.index', compact('dataset'));
    }
}
