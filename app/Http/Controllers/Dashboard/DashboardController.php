<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Site;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    /**
     * Show the confirm password view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $sites = Site::where('user_id', auth()->id())->paginate(10);
        return view('dashboard.index', compact('sites'));
    }
}
