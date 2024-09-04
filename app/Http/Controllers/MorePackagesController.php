<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\travelPackage;

class MorePackagesController extends Controller
{
    public function index(Request $request)
    {
        $minPrice = travelPackage::min('price');
        $maxPrice = travelPackage::max('price');
    
        $filterMinPrice = $request->input('min_price', $minPrice);
        $filterMaxPrice = $request->input('max_price', $maxPrice);
        
        $keyword = $request->keyword;
        $packages = TravelPackage::with(['galleries'])
            ->where(function($query) use ($keyword) {
                $query->where('title', 'LIKE', '%' . $keyword . '%')
                      ->orWhere('location', 'LIKE', '%' . $keyword . '%')
                      ->orWhere('type', 'LIKE', '%' . $keyword . '%');
            })
            ->whereBetween('price', [$filterMinPrice, $filterMaxPrice])
            ->get();
            
        return view('pages.more', compact('keyword','packages','minPrice', 'maxPrice', 'filterMinPrice', 'filterMaxPrice'));
    }

}
