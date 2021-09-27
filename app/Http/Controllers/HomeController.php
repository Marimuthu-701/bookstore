<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

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

    public function profile(Request $request)
    {
        return view('profile');
    }

    public function profileEdit(Request $request)
    {
        return view('profile_edit');
    }

    public function profileUpdate(Request $request)
    {
        if($request->all()){
            $this->validator($request->all())->validate();
            $user =Auth::user();
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->mobile = $request->mobile;
            $user->company_name = $request->company_name;
            $user->address = $request->address;
            $user->save();
            if($user->save()){
                return redirect()->route('profile')->with('message','Profile Updated');
            } else {
                return back()->withErrors(['message' => trans('auth.somting_wrong')]);                
            }
        }
        return back()->withErrors(['message' => trans('auth.somting_wrong')]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric'],
            'company_name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string'],
        ]);
    }


}

