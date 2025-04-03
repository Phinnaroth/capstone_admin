<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $product = Product::count();

        $date_awal = date('Y-m-01');
        $date_akhir = date('Y-m-d');

        $data_date = [];
        $data_income = [];

        while (strtotime($date_awal) <= strtotime($date_akhir)) {
            $data_date[] = (int) substr($date_awal, 8, 2);
            $date_awal = date('Y-m-d', strtotime("+1 day", strtotime($date_awal)));
        }

        // $date_awal = date('Y-m-01');

        // // Placeholder for income calculation
        // $data_income = array_fill(0, count($data_date), 0);

        if (auth()->user()) {
            return view('admin.dashboard', compact('product', 'data_date', 'data_income'));
        } 
    }
}