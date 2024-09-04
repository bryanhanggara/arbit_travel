<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\travelPackage;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $items = travelPackage::with(['galleries'])->take(4)->get();

        $items_pad = travelPackage::with(['galleries'])->skip(0)->take(3)->get();
        $items_pad_next = travelPackage::with(['galleries'])->skip(3)->take(3)->get();

        $items_mob = travelPackage::with(['galleries'])->skip(0)->take(2)->get();
        $items_mob_next = travelPackage::with(['galleries'])->skip(2)->take(2)->get();
        return view('pages.home', [
            'items' => $items,
            'items_pad' => $items_pad,
            'items_pad_next' => $items_pad_next,
            'items_mob' => $items_mob,
            'items_mob_next' => $items_mob_next
        ]);
    }
    
     
}
