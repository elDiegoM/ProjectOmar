<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;

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
    protected $redirectTo = '/notes';

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // Start transaction!
        DB::beginTransaction();
        try {
            DB::insert('INSERT INTO users (name,email,password,menuroles) values (?,?,?, ?)', [$data['name'],$data['email'],Hash::make($data['password']),'user']);
            DB::connection('pgsql2')->insert('INSERT INTO users (name,email,password,menuroles) values (?,?,?, ?)', [$data['name'],$data['email'],Hash::make($data['password']),'user']);
            DB::connection('pgsql3')->insert('INSERT INTO users (name,email,password,menuroles) values (?,?,?, ?)', [$data['name'],$data['email'],Hash::make($data['password']),'user']);
        } catch (ValidationException $e) {
            DB::rollback();
        } catch (\Exception $e) {
            DB::rollback();
        }
        DB::commit();
    }
}
