<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Mail\ForgotPassword;
use App\Mail\RegisterUser;
use App\Mail\WelcomeUser;
use App\Token;
use App\VideoPresentation;
use App\User;
use App\Business;
use App\Social;
use Image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        // dd($users);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $businessModels = Business::where('status', 1)->get();
        $roles = array('Manager' => 'Manager', 'Admin' => 'Admin', 'Super Admin' => 'Super Admin');
        $business = array('' => '--Seleccionar');

        foreach ($businessModels as $key => $businessModel) {
            $business[$businessModel->id]  = $businessModel->business;
        }

        return view('users.create', compact('roles', 'business'));
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
          'name' => ['required'],
          'email' => ['required', 'unique:users'],
        ]);

        $data = $request->all();

        if($request->file('profile_avatar') != null) {
            // ruta de las imagenes guardadas
            $ruta = public_path().'/uploads/users/';

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

            $data["avatar"] = $ruta.$temp_name;
        }
        else{
            // ruta de las imagenes guardadas
            $ruta = public_path().'/uploads/users/';

            $data["avatar"] = $ruta.'profile.png';
        }

        $passw = mb_split('@', $data["email"]);
        $data["password"] = Hash::make($passw[0]);
        $data["admin"] = 0;
        $data["status"] = 1;

        $user = User::create($data);

        return redirect()->route('admin.users.index')->with('msg' ,'Usuario insertado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        // dd($user);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $businessModels = Business::where('status', 1)->get();
        $roles = array('Manager' => 'Manager', 'Admin' => 'Admin', 'Super Admin' => 'Super Admin');
        $business = array('' => '--Seleccionar');

        foreach ($businessModels as $key => $businessModel) {
            $business[$businessModel->id]  = $businessModel->business;
        }

        return view('users.edit', compact('user', 'roles', 'business'));
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
          'name' => ['required'],
        ]);

        $data = $request->all();

        $user = User::findOrFail($id);

        $user->update($data);

        return redirect()->route('admin.users.index')->with('msg', 'Usuario modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::id() == $id) {
            return back()->with('err', "error");
        }

        $user = User::findOrFail($id);

        $user->delete();

        return back()->with('msg', 'Usuario eliminado con éxito');
    }

    /**
     * change status user
     */
    public function changeStatus($user_id)
    {
        $user = User::find($user_id);
        $user->status = !$user->status;
        $user->save();

        return back()->with('msg', 'Successfull');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changePassword()
    {
        $user = Auth::user();
        return view('users.change', compact('user'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storePassword(Request $request)
    {
        $users = User::find(Auth::id());

        $this->validate($request, [
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'password_confirmation' => 'required|same:password'
        ]);

        //$users->is_deleted = 0;

        $users->password = Hash::make($request->password);
        $users->save();

        return redirect()->route('admin')->with('msg', 'Successfull');
    }

    /**
    * [register description]
    * @param  Request $request [Data User]
    * @return [type]           [Data Recharge]
    */
    public function register(Request $request)
    {
        $data = $request->all();

        // return Validator::make($data, [
        //     'name' => ['required', 'string', 'max:255'],
        //     // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'email' => ['required', 'string', 'email', 'max:255'],
        //     'password' => ['required', 'string', 'min:6', 'confirmed'],
        // ]);

        // take user if exist see status if is true login if not active
        $user = User::where('email', $data['email'])
                ->first();

        if ($user) {

            if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'status' => 0])) {
                // activate user
                $user->status = 1;
                $user->save();

                $credentials = $request->only('email', 'password');
                Auth::attempt($credentials);

                return redirect()->route('/')->with('msg', 'Successfull');
    
            } else {
                return view('404');
            }

            $user->status = 1;
            $user->save();

        } else {
            return view('403');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function gallery()
    {
        // $user = User::find(Auth::id());
        $galleries = VideoPresentation::where('user_id', Auth::id())->get();
        // dd($user);
        return view('users.gallery', compact('galleries'));
    }

    /*******************************
    *   APi                        *
    ********************************/
    public function getUserList()
    {
        return response(['data' => User::all()], 200);
    }

    /**
     * Handling the register user request
     */
    public function registerPassword(Request $request)
    {
        $data = $request->all();

        $user = User::where('email', '=', $request->input('email'))->first();

        if ($user) return response(['data' => 'Este usuario ya existe'], 430);


        $data['password'] = Hash::make($request->input('password'));

        $data['admin'] = 0;
        $data['status'] = 1;

        $user = User::create($data);
        $newUser = User::where('id', $user->id)->first();

        if (!$newUser) {
            return response(['data' => 'Something wrong :('], 500);
        }

        return response(['data' => 'Email sent.'], 201);
    }

    /**
     * Handling the register user request
     */
    public function registerSocial(Request $request)
    {
        $data = $request->all();

        // return response(['data' => $data], 201);

        $exist = User::where('email', $request->input('email'))->first();

        if ($exist) {

            // return response(['data' => 'Este usuario ya existe'], 430);
            return response(['data' => 'Create user.'], 201);
        }

        $data['password'] = Hash::make('codeals');

        $data['admin'] = 0;
        $data['status'] = 1;

        $user = User::create($data);
        $newUser = User::where('id', $user->id)->first();

        $socialite['user_id'] = $newUser->id;
        $socialite['social'] = $request->input('social');
        $socialite['token'] = $request->input('token');
        $social = Social::create($socialite);

        if (!$newUser) {

            return response(['data' => 'Exist!!!'], 200);
        }

        return response(['data' => 'Create user.'], 201);
    }

    /**
     * Handling the active user request
     */
    public function activeUser()
    {
        $user = User::find($request->user()->id);
        if (!$user) { return response(['data' => 'Not Found.'], 404); }

        $business = Business::find($user->business_id);
        if (!$business->status) { return response(['data' => 'Business denied'], 401); }

        $user->status = 1;
        $user->save();

        return response(['data' => 'User active.'], 201);
    }

    /**
     * Handling the forgot password email request
     */
    public function forgotPassword(Request $request)
    {
        $users = User::where('email', $request->input('email'))->get();

        if ($users->isEmpty()) {
            return response(['data' => 'Check if the email is correct'], 403);
        }

        $user = $users[0];

        $token = Token::create([
            'user_id' => $user->id,
            'token' => uniqid(),
            'expire_at' => Carbon::now()->addHour(),
        ]);

        Mail::to($user)->send(new ForgotPassword($token, $request));

        return response(['data' => 'Email sent.'], 200);
    }

    /**
     * Hanlding the request to reset the password
     */
    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['data' => $validator->errors()], 433);
        }

        $token = $request->input('token');
        $dBToken = DB::table('tokens')
            ->where('token', $token)
            ->where('expire_at', '>', Carbon::now())
            ->first();

        if (!$dBToken) {
            return response(['data' => 'Wrong token.'], 403);
        }

        $user = User::where('id', $dBToken->user_id)->first();
        $user->password = bcrypt($request->input('password'));
        $user->save();

        DB::table('tokens')->where('id', $dBToken->id)->delete();

        return response(['data' => 'Password changed.'], 200);
    }

    //  change password
    public function changePasswordApi(Request $request)
    {
        $user = User::where('id', $request->user()->id)->first();

        $data['password'] = Hash::make($request->input('password'));
        $user->update($data);

        return response(['data' => $user], 200);
    }

    //  Allow Access
    public function allowAccess($secretUpdate)
    {
        if ($secretUpdate != env('API_UPDATE', 'kamisama')) return response(['data' => 'Need Update'], 401);

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
