<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClientVideo;
use App\Option;
use App\Video;
use App\User;
use App\VideoPresentation;
use App\Client;
use App\Business;
use App\VideoMake;

class ClientVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    /**
     * client video presentation
     */
    public function showVideo($token)
    {
        $clientVideo = ClientVideo::where('token', $token)->first();
        $client = Client::find($clientVideo->client_id);
        $video = Video::find($clientVideo->video_id);
        $user = User::find($video->user_id);
        $videoMake = VideoMake::where('video_id', $video->id)->get();

        return view('clientvideos.showvideo', compact('clientVideo', 'client', 'video', 'videoMake', 'user'));
    }

    /**
     * client video list link
     */
    public function indexLink($video_id)
    {
        $clientVideos = ClientVideo::where('video_id', $video_id)->get();
        $video = Video::find($video_id);

        return view('clientvideos.linkvideo', compact('clientVideos', 'video'));
    }
}
