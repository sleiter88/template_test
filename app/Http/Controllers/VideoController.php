<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Video;
use App\VideoPresentation;
use App\VideoMake;
use App\Option;
use App\Client;
use App\ClientVideo;
use App\Product;
use App\Feature;
use App\User;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 'Super Admin') {
            $videos = Video::all();
        } else if (Auth::user()->role == 'Admin') {

            // join user and business by user_id and take all videos
        } else {
            $videos = Video::where('user_id', Auth::id())->get();
        }
        return view('videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $features = Feature::join('products', 'products.id', '=', 'features.product_id')
            ->where('business_id', Auth::user()->business_id)
            ->get();

        $roles = array('Manager' => 'Manager', 'Admin' => 'Admin', 'Super Admin' => 'Super Admin');
        $clientsList = Client::where('business_id', Auth::user()->business_id)->get();
        $clients = array();

        foreach ($clientsList as $key => $client) {
            $clients[$client->email] = $client->email;
        }

        $gestor = User::find(Auth::id());
        $videoPresentation = VideoPresentation::where('user_id', Auth::id())->get();


        // return view('videos.create', compact('roles', 'features'));
        return view('videos.create2', compact('roles', 'features', 'clients', 'gestor', 'videoPresentation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // create video and take id
        $data = $request->all();

        // dd($data);

        $data["user_id"] = Auth::id();
        $data["token"] = uniqid();
        $data["whatsapp"] = Auth::user()->whatsapp;
        $data["skype"] = Auth::user()->skype;
        $data["phone"] = Auth::user()->phone;
        $data["video"] = $data["token"].".mp4";
        $data["open"] = $request->input('open');
        $data["end"] = $request->input('end');
        $data["cta_1"] = ($request->input('cta_1') !== null) ? $request->input('cta_1') : 0;
        $data["cta_2"] = ($request->input('cta_2') !== null) ? $request->input('cta_2') : 0;
        $data["cta_3"] = ($request->input('cta_3') !== null) ? $request->input('cta_3') : 0;
        $options = $request->input('option_id');
        $clients = $request->input('clients');

        $convertToTS = "";
        $generateVideo = "";
        $rmToTS = "";

        // rutas
        $rutaTs = public_path().'/record/ts/';
        $rutaOutput = public_path().'/record/output/';
        $rutaOption = public_path().'/record/option/';
        $rutaGestor = public_path().'/record/gestor/';

        $video = Video::create($data);


        // video open gerente
        if ($request->input('open')) {
            $openVideo = VideoPresentation::find($request->input('open'));
            $videoNameOpen = uniqid();
            $convertToTS = 'ffmpeg -i '. $rutaGestor.$openVideo->video .' -c copy -bsf:v h264_mp4toannexb -f mpegts '.$rutaTs.$videoNameOpen.'.ts;';
            $generateVideo = $rutaTs.$videoNameOpen.'.ts|';
            $rmToTS = 'rm -Rf '. $rutaTs.$videoNameOpen .'.ts;';
        }

        // take ids options an create table video make
        foreach ($options as $key => $option) {

            $videoOption = Option::find($option);

            $indicador = $key + 1;
            $videoName = uniqid();

            $videoMake = VideoMake::create([
                'video_id' => $video->id,
                'option_id' => $option,
                'position' => $indicador,
            ]);

            $convertToTS .= 'ffmpeg -i '. $rutaOption.$videoOption->video .' -c copy -bsf:v h264_mp4toannexb -f mpegts '.$rutaTs.$videoName.'.ts;';
            $rmToTS .= 'rm -Rf '. $rutaTs.$videoName.'.ts;';

            if (count($options) == $indicador) {
                $generateVideo .= $rutaTs.$videoName.'.ts';
            } else {
                $generateVideo .= $rutaTs.$videoName.'.ts|';
            }

        }

        // video close gerente
        if ($request->input('end')) {
            $endVideo = VideoPresentation::find($request->input('end'));
            $videoNameEnd = uniqid();
            $convertToTS .= 'ffmpeg -i '. $rutaGestor.$endVideo->video .' -c copy -bsf:v h264_mp4toannexb -f mpegts '.$rutaTs.$videoNameEnd.'.ts;';
            $generateVideo .= '|'.$rutaTs.$videoNameEnd.'.ts';
            $rmToTS .= 'rm -Rf '. $rutaTs.$videoNameEnd.'.ts;';
        }

        $generateVideoFinal = "ffmpeg -i 'concat:".$generateVideo."' -c copy -bsf:a aac_adtstoasc ".$rutaOutput.$data["token"].".mp4";

        $output = shell_exec($convertToTS);
        $output = shell_exec($generateVideoFinal);
        $output = shell_exec($rmToTS);

        // delete video if error

        // create link for clients
        foreach ($clients as $key => $client) {
            $idClient = Client::where('email', $client)
                            ->where('business_id', Auth::user()->business_id)
                            ->first();

            $clientVideo = ClientVideo::create([
                'client_id' => $idClient->id,
                'video_id' => $video->id,
                'token' => uniqid()
            ]);
        }

        return redirect()->route('admin.clientvideos.linkvideo', $video->id)->with('msg' ,'Video generado con éxito');
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
     * show videos by clients
     */
    public function showVideo($token)
    {
        $clientVideo = ClientVideo::where('token', $token) ->first();
        $video = Video::findOrFail($clientVideo->video_id);
        $client = Client::findOrFail($clientVideo->client_id);
        $options = Option::join('video_makes', 'video_makes.option_id', '=', 'options.id')
                        ->where('video_id', $video->id)
                        ->select('options.*')
                        ->orderBy('options.position')
                        ->get();

        return view('clients.show', compact('clientVideo', 'video', 'client', 'options'));
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
        $video = Video::findOrFail($id);

        if (Auth::id() != $video->user_id && Auth::user()->role != 'Admin') {
            return back()->with('err', "error");
        }

        $video->delete();

        return back()->with('msg', 'Video eliminado con éxito');
    }
}
