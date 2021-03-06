<?php namespace App\Http\Controllers;

use App\Company;
use App\Schedule;
use App\ScheduleReminder;
use App\User;
use App\orgs;
use Auth;
use Request;
use Session;
use Redirect;
use Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use DCN\RBAC\Models\Role;

class AccountController extends Controller
{
        public function __Construct()
        {
            $this->middleware('permission:create.user', ['only' => ['anyCreate',]]);


        }

    /**
     * @return \Illuminate\Http\RedirectResponse|Redirect
     */
     public function postLogin()
    {


        $credentials = array(
            'email' => Request::input('email'),
            'password' => Request::input('password'),
            'status' => 1
        );
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

          
                return redirect()->intended('user');
           
           
        } else {
            Session::flash('error', 'Your ID or Password Invalid');
            return redirect('/');
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function anyCreate()
    {
        if (Input::all()) {
            $rules = array(
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => "required|email|unique:users,email",
                'org' => "required",
//                'phone' => 'required|phone_number',
                'phone' => 'required',
                'password' => 'required|same:confirm_password|min:6',
            );
            $messages = array(
                'password.same' => 'Password and Confirm password are not Matched',
            );
            /* Laravel Validator Rules Apply */
            $validator = Validator::make(Input::all(), $rules, $messages);
            if ($validator->fails()):
                $validationError = $validator->messages()->first();

                Session::flash('error', $validationError);

                return Redirect::back()->with('input', Input::all());
            else:
                $user = new User();
                $user->first_name = Input::get('first_name');
                $user->last_name = Input::get('last_name');
                $user->email = Input::get('email');
                $user->org = Input::get('org');
                $user->phone = Input::get('phone');
                $user->password = Hash::make(Input::get('password'));
                $user->save();

                $user->roles()->sync([Input::get('role')]);

               return redirect()->intended('user');
                /*$credentials = array(
                    'email' => Request::input('email'),
                    'password' => Request::input('password'),
                    'status' => 1
                );
                if (Auth::attempt($credentials)) {
                    Session::flash('success', 'Thanks For Create Account');
                    return redirect()->intended('user');
                }*/
            endif;
        } else {
            return view('auth.create');
        }
    }

public function anyCreateorg()
    {
        
         if (Input::all()) {
            $rules = array(
                'name' => 'required',
                'about' => 'required',
                'location' => "required",
                'phone' => "required",
//                'phone' => 'required|phone_number',
                
            );
        ;
            /* Laravel Validator Rules Apply */
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()):
                $validationError = $validator->messages()->first();

                Session::flash('error', $validationError);

                return Redirect::back()->with('input', Input::all());
            else:
                $org = new orgs();
                $org->name = Input::get('name');
                $org->about = Input::get('about');
                $org->location = Input::get('location');
                $org->phone = Input::get('phone');
    
                $org->save();

               return redirect()->intended('user/organize');
             
            endif;
        } 
    }
    
    /**
     *
     */
    public function getMailMe()
    {
        $data['mailProfile'] = User::all();
        if ($data['mailProfile']->count()) {
            foreach ($data['mailProfile'] as $key => $mailProfile) {
                if($key == 15)
                    break;
                $eventInfo = Schedule::where('user_id', $mailProfile->id)
                    ->where('start_time', '>=', date('Y-m-d 00:00:00'))
                    ->where('start_time', '<=', date('Y-m-d 23:59:59'))
                    ->get();

                Mail::send('eventMail', array('mailProfile' => $eventInfo), function ($message) use ($mailProfile) {
                    $message
                        ->to($mailProfile->email, $mailProfile->first_name . ' ' . $mailProfile->last_name)
                        ->subject('MEW Scheduler Meeting' . date('Y-m-d'));
                });
            }
        }

    }

    /**
     *
     */
    public function getMailReminder()
    {
        $reminderList = ScheduleReminder::where('reminder_date', date('Y-m-d'))->get();

        $sendEmailNum = 0;
        foreach ($reminderList as $reminder) {
            $mailToAddress = explode(",", $reminder->reminder_email);
            foreach ($mailToAddress as $toAddress) {
                $sendEmailNum++;
                if($sendEmailNum == 15)
                    break;
                Mail::send('email.reminder', array('email' => $reminder), function ($message) use ($toAddress, $reminder) {
//                    $message->from(Auth::user()->email, Auth::user()->first_name . ' ' . Auth::user()->last_name);
                    $message->to($toAddress)->subject($reminder->Schedule->title);
                });
            }
        }
    }

    /**
     * @return Redirect
     */
    public function getLogout()
    {
        Auth::logout();
        return redirect('/');
    }

}