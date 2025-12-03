<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalReports = Item::count();
        $totalLost = Item::where('type', 'lost')->count();
        $totalFound = Item::where('type', 'found')->count();
        $resolved = Item::where('status', 'resolved')->count();

        $recentReports = Item::latest()->take(5)->get();

        return view('dashboard', compact(
            'totalReports',
            'totalLost',
            'totalFound',
            'resolved',
            'recentReports'
        ));
    }
}