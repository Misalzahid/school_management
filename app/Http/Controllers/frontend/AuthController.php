<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('frontend.auth.login');
    }
    public function registerForm()
    {

        return view('frontend.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone_no' => 'required',
            'address' => 'required',
            // 'image' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
        ]);
        // if ($request->hasFile('image')) {
        //     $file = $request->file('image');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = time() . '.' . $extension;
        //     $file->move(public_path('admin/assets/images/users/'), $filename);
        //     $image = 'public/admin/assets/images/users/' . $filename;
        //     // return $image;
        // } else {
        //     $image = 'public/admin/assets/images/users/1675332882.jpg';
        // }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_no = $request->phone_no;
        $user->address = $request->address;
        $user->password = bcrypt($request->password);
        // $user->image = $image;
        $user->save();

        return redirect()->route('login')->with(['status' => true, 'message' => 'Register Successfully']);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::guard('user')->attempt($credentials)) {
            return redirect()->intended('index')
                ->withSuccess('Signed in');
        }
        return redirect("login")->withSuccess('Login details are not valid');

    }
    public function logout()
    {
        Auth::guard('user')->logout();
        return redirect('login');

        return redirect()->route('login')->with(['status' => true, 'message' => 'Logout Successfully']);
    }
}
