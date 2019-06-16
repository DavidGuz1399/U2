<?php

namespace U2\Http\Controllers\Auth;

use U2\User;
use U2\Role;
use U2\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'name' => ['required', 'string', 'max:255'],
            'user_name'=>['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'city'=>['required', 'string','max:100'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \U2\User
     */
    protected function create(array $data)
    {
        $role_user=Role::where('name','usuario')->first();
        $user=new User();
        $user=User::create([
            'name' => $data['name'],
            'user_name'=>$data['user_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'city'=> $data['city'],
            // 'slug'=>'Hola',
        ]
        );
        $user->roles()->attach($role_user);
        return $user;
    }
}
