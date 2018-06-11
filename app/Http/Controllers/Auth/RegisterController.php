<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Mail\RegistrationUser;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |


    */

    use RegistersUsers;


    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/usuarios';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {/**
       * $this->middleware('guest');
        */
    }


    public function register(Request $request)
    {
        $this->validator($request->all())->validate();


        event(new Registered($user = $this->create($request->all())));
        flash('Usuario creado con éxito.')->success();
        return redirect('/usuarios');

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *  'password' => 'required|string|min:6|confirmed',
     * @param  array  $data
     * @return \App\User
     */

 /**
 *   protected function create(array $data)
 *   {
 *       return User::create([
  *          'name' => $data['name'],
   *         'email' => $data['email'],
    *        'password' => Hash::make($data['password']),
     *       'role_id' => $data['role']
      *  ]);

      *  Mail::to($user)
    *}
     */



    protected function create(array $data)
    {


     $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make('123'),
            'role_id' => $data['role']
        ]);


        Mail::to($user)->send(new RegistrationUser);

         /**
*        Mail::to($user)->send(new RegistrationUser);
*/

    }
}
