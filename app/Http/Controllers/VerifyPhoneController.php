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
        
        if (!$token->isValid())
            redirect()->back()->withErrors('کد منقضی شده است یا استفاده شده است.');
        if ($token->code !== $request->input('code'))
            redirect()->back()->withErrors('کد نادرست است.');
        $token->update([
            'used' => true
        ]);
    }

}