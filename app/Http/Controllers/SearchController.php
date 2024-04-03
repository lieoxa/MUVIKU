<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Rekomendasi;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search() {
        $banner = Banner::all();
        $rekomendasis = Rekomendasi::all();
        
        return view('user.search', compact('banner','rekomendasis'));
    }
}
