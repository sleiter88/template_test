<?php
/**
 * @Author: Ifmuela
 * @Date:   2020-06-16 16:58:48
 * @Last Modified by:   Ifmuela
 * @Last Modified time: 2020-06-25 06:03:41
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Video;

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
        return view('home');
    }

    /**
     * datas gloabal
     */

    public static function videoList()
    {
        $videos = array();

        if (Auth::user()->role == 'Super Admin') {
            $videos = Video::all();
        } else if (Auth::user()->role == 'Admin') {
            $videos = Video::where('user_id', Auth::id())->get();
        } else {
            $videos = Video::where('user_id', Auth::id())->get();
        }

        // if(count($videos) > 0) {
        //     $dash['videos'] = $videos;
        // }


        return $videos;
    }
}
