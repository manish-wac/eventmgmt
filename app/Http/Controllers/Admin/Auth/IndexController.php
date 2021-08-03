<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AdminUser;
use Illuminate\Support\Str;
use App\Jobs\Admin\ResetPasswordAdmin;
use Illuminate\Support\Facades\URL;
use App\Http\Requests\Admin\AdminLoginRequest;
use App\Http\Requests\Admin\AdminForgotPasswordRequest;
use App\Http\Requests\Admin\UpdatePasswordAdmin;
use Illuminate\Support\Facades\Hash;
use Auth;
use DB;

class IndexController extends Controller
{
    public function loadLoginView (Request $request)
    {
        return view('admin.auth.login');
    }

    public function adminLogin (AdminLoginRequest $request)
    { 
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        
        if(Auth::guard('admin')->attempt($credentials)) {
            $request->session()->put('LoggedUser', Auth::guard('admin')->user()->email);

            return redirect('admin-dashboard');
        }
        else return back()->with('fail', 'Invalid credentials.')->withInput();
    }

    public function loadAdminDashboard ()
    {
        return view('admin.auth.dashboard');
    }

    public function adminForgotPassword (AdminForgotPasswordRequest $request)
    {        
        if($user = AdminUser::where('email', $request->forgot)->first()) {

            $token = Str::random(64);
			
            DB::table('password_resets')->where('email', $request->forgot)->delete();
			DB::table('password_resets')->insert(
				['email' => $request->forgot, 'token' => $token, 'created_at' => date('Y-m-d H:i:s')]
			);

            $details = [
                'name' => $user->toArray()['name'],
                'to_email' => $user['email'],
                'subject' => 'Reset Password!',
                'url' => URL::signedRoute('admin.auth.reset-password', ['token' => $token, 'email' => $user['email']])
            ];
            ResetPasswordAdmin::dispatch($details);

            return back()->with('forgot-success', 'Password recovery link will send to ' . $request->forgot);            
        }
        else return back()->with('forgot-fail', "Account does not exists.")->withInput();
    }

    public function adminResetPassword(Request $request, $token, $email) 
    {
        if (! $request->hasValidSignature()) abort(401);

        if(DB::table('password_resets')->where('email', $email)->where('token', $token)->first()) {
            // $request->session()->put('resetUser', $email);
            return view('admin.auth.login', compact('email'));
        } else abort(403, 'Unauthorized action.');
    }

    public function adminUpdatePassword(UpdatePasswordAdmin $request) 
    {
        $userEmail = $request->session()->get('resetUser');
        if($userEmail) {

            $update = AdminUser::where('email', $userEmail)->update(['password' => Hash::make($request->new_password)]);

            if($update) {
                DB::table('password_resets')->where('email', $request->forgot)->delete();

                $request->session()->forget('resetUser');

                return back()->with('reset-success', 'Password updated successfully. Please login for futher process.');    

            } return back()->with('reset-fail', "Password couldn't updated. Please try again later.")->withInput();

        } else return back()->with('reset-fail', "Unauthorized action.")->withInput(); 
    }

    public function adminLogout(Request $request)
    {
        Auth::logout();
        $request->session()->forget('LoggedUser');
        return redirect(route('admin.auth.login'));
    }
}
