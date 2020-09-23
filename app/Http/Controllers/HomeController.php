<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\HistoryDetection;
use App\model\Dataset;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $historyDetection = HistoryDetection::all()->where('class', 'positive')->count();
        $predicted = HistoryDetection::all()->count();
        $dataset = Dataset::all()->count();
        
        return view('dashboard', compact('historyDetection', 'dataset', 'predicted'));
    }
}
