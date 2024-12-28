<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Token;
use Illuminate\Http\Request;

class VerifyPhoneController extends Controller
{
    public function verifyPhone(Request $request) {
        $request->validate([
            'code' => 'required|numeric'
        ]);
        if (!session()->has('code_id') || !session()->has('user_phone'))
            redirect()->route('loginPhone');
        $token = Token::where('user_phone', session()->get('user_phone'))->find(session()->get('code_id'));
        if (!$token || empty($token->id))
            redirect()->route('loginPhone');
        if (!$token->isValid())
            redirect()->back()->withErrors('The code is either expired or used.');
        if ($token->code !== $request->input('code'))
            redirect()->back()->withErrors('The code is wrong.');
        $token->update([
            'used' => true
        ]);
        $user = User::find(session()->get('user_phone'));
        $rememberMe = session()->get('remember');
        auth()->login($user, $rememberMe);
        return redirect()->route('index');
    }

}