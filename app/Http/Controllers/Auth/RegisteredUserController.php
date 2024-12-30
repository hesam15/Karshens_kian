<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Token;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

use function Laravel\Prompts\error;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $token = Token::where("user_phone", $request->phone)->first();
        $token = $token->used;

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'phone' => ['required', 'max:11' ,'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if($token){
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
            ]);
    
            $user->assignRole('admin');
    
            event(new Registered($user));
    
            Auth::login($user);
    
            return redirect(route('home', absolute: false));
        }
        
        return redirect()->back()->with('error', 'کد احراز هویت تایید نشده است.')->withInput();

    }

    //Verify Phone
    public function sendVerify(Request $request)
    {
        $request->validate([
            'phone' => ['required', 'max:11' ,'unique:'.User::class],
        ]);

        $data = $request->only('phone');

        $token = Token::where("user_phone", $data['phone'])->first();

        if($token){
            $token->delete();
        }

        $token = Token::create([
            'user_phone' => $data['phone'],
        ]);

        if ($token->sendCode($data['phone'], $token->code)) {
            session()->put("code_id", $token->id);
            session()->put("user_phone", $data['phone']);

            return response()->json([
                'success' => true,
                'message' => 'کد تایید ارسال شد'
            ]);
        }

        $token->delete();
        
        return response()->json([
            'success' => false,
            'message' => 'خطا در ارسال کد تایید'
        ], 422);
    }

    public function verifyCode(Request $request) {
        if (!session()->has('code_id') || !session()->has('user_phone'))
            redirect()->route('loginPhone');
        $token = Token::where('user_phone', session()->get('user_phone'))->find(session()->get('code_id'));
        if (!$token || empty($token->id))
            redirect()->route('loginPhone');
        if (!$token->isValid())
            redirect()->back()->with('error' ,'کد منقضی شده است.');
        if ($token->code !== $request->input('code'))
            redirect()->back()->with("error" ,'کد اشتباه است');
        $token->update([
            'used' => true
        ]);
        
        return true;
    }
}