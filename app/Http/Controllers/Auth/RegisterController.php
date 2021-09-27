<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\UserPayment;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        try {
            $create = $this->create($request->all());
            if ($create) {
                return back()->with([
                    'message' => trans('auth.register_success'),
                ]);
            } else {
                return back()->withErrors([
                    'message' => trans('auth.somting_wrong'),
                ]);
            }
        } catch (\Exception $e) {
                return back()->withErrors([
                    'message' => trans('auth.somting_wrong'),
                ]);
        }
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
            'name' => ['required', 'string', 'max:255', 'alpha_spaces'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'numeric', 'digits:10'],
            'mobile' => ['required', 'numeric', 'digits:10'],
            'company_name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'password_rules'],
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
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'mobile' => $data['mobile'],
            'company_name' => $data['company_name'],
            'address' => $data['address'],
            'password' => Hash::make($data['password']),
        ]);

        // The entry use for userpayment details and type
        if ($user) {
            UserPayment::create([
                'user_id' => $user->id,
                'payment_mode_id' => defaultPaymentMode(),
                'amount' => 0,
                'payment_type'=> UserPayment::PAYMENT_TYPE_REGISTER
            ]);
        }

        return $user;
    }
}