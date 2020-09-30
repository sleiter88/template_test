<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use App\Business;
use Image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $business = Business::all();
        // // dd($business);
        // return view('business.index', compact('business'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $business = Business::where('status', 1)->get();
       
        // return view('business.create', compact('business'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
          'business' => ['required'],
          'country' => ['required'],
          'code_zip' => ['required'],
          'state' => ['required'],
          'population' => ['required'],
          'adress' => ['required'],
          'whatsapp' => ['required'],
          'web' => ['required'],
          'phone' => ['required'],
          'email' => ['required', 'unique:business'],
        ]);

        $data = $request->all();

        if($request->file('profile_avatar') != null) {
            // ruta de las logo guardadas
            $ruta = public_path().'/uploads/business/';

            // recogida del form
            $imagenOriginal = $request->file('profile_avatar');

            // crear instancia de imagen
            $imagen = Image::make($imagenOriginal);

            // generar un nombre aleatorio para la imagen
            $temp_name = $this->random_string() . '.' . $imagenOriginal->getClientOriginalExtension();

            $imagen->resize(300,300);

            // guardar imagen
            // save( [ruta], [calidad])
            $imagen->save($ruta . $temp_name, 100);

            $data["logo"] = $ruta.$temp_name;
        }
        else{
            // ruta de las logo guardadas
            $ruta = public_path().'/uploads/business/';

            $data["logo"] = $ruta.'logo_unknown.png';
        }

        $data["subscription"] = date("Y-m-d");
        $data["status"] = 1;

        $business = Business::create($data);

        return redirect()->route('admin.business.index')->with('msg' ,'Negocio agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $business = Business::find($id);
        $user = User::find(Auth::id());

        return view('business.show', compact('business', 'user'));
    }

    /**
     * show details of business user login
     */
    public function myBusiness()
    {
        
        $business = Business::find(Auth::user()->business_id);
        $users = User::where('business_id', $business->id)->paginate(9);

        return view('business.show', compact('business', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $business = Business::findOrFail($id);

        return view('business.edit', compact('business'));
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
        $this->validate(request(), [
            'business' => ['required'],
            'country' => ['required'],
            'code_zip' => ['required'],
            'state' => ['required'],
            'population' => ['required'],
            'adress' => ['required'],
            'whatsapp' => ['required'],
            'web' => ['required'],
            'phone' => ['required'],
            'email' => ['required', 'unique:business'],
        ]);

        $data = $request->all();

        $data["communication"] = $request->input('communication') == 'on'? 1 : 0;
        $business = Business::findOrFail($id);

        $business->update($data);

        return redirect()->route('admin.business.index')->with('msg', 'Negocio editado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->role != 'Super Admin') {
            return back()->with('err', "Permisos denegados");
        }

        $business = Business::findOrFail($id);

        // $business->delete();

        return back()->with('msg', 'Successfull');
    }

    /**
     * change status business
     */

    public function changeStatus($business_id)
    {
        $business = Business::find($business_id);
        $business->status = !$business->status;
        $business->save();

        return back()->with('msg', 'Successfull');
    }

    /**
     * all users by business
     */
    public function allUserBusiness($id)
    {
        $users = User::where('business_id', $id)->get();
        
        return $users;
    }

    /*******************************
    *   APi                        *
    ********************************/

    /**
     * business list
     */
    public function getBusinessList()
    {
        return response(['data' => Business::all()], 200);
    }

    /**
     * get Business by ID
     */
    public function getBusinessById(Request $request)
    {
        $data = User::where('id', $request->input('business_id'))->first();

        return response(['data' => $data], 200);
    }

    //  Allow Access
    public function allowAccess(Request $request)
    {
        $user = User::find($request->user()->id);
        $business = Business::find($user->business_id);

        if (!$business->status) {
            return response(['data' => 'Business denied'], 401);
        }

        if (!$user->status) {
            return response(['data' => 'User denied'], 430);
        }

        return response(['data' => 'success'], 200);
    }

    // generar random
    protected function random_string()
    {
        $key = '';
        $keys = array_merge( range('a','z'), range(0,9) );

        for($i=0; $i<10; $i++)
        {
            $key .= $keys[array_rand($keys)];
        }

        return $key;
    }
}
