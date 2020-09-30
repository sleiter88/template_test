<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClientVideo;
use App\Client;
use App\Video;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 'Super Admin') {
            $clientVideos = ClientVideo::all();
        } else if (Auth::user()->role == 'Admin') {
            
            // join user and business by user_id and take all videos 
        } else {
            $clientVideos = ClientVideo::join('videos', 'videos.id', '=', 'client_videos.video_id')
                                ->where('user_id', Auth::id())
                                ->get();
        }
        
        dd($clientVideos);
        return view('client_videos.index', compact('clientVideos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // clients for this user log in 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  clients for this user log in 
        // take user business_id and create client with this business_id and validate de same email client nor repit for business
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
