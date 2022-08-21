<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Option;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $option = new Option();

        $feed_url = $option->getOption('feed_url');
        $feed_active = $option->getOption( 'feed_active');

        return view('home', ['feed_url' => $feed_url, 'feed_active' => $feed_active]);
    }
}
