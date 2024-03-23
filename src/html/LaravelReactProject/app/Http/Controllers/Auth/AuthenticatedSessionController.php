<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{

    public function store(LoginRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            # emailとpasswordのキーを持つ連想配列から値を取り出して、credentials変数に代入する
            $credentials = $request->only('email', 'password');
    
            # credentials変数の情報を渡し、Authファサードを介してログイン処理を行う。DB内のユーザーと一致したらattemptでtrue、存在しなかったらfalseを返す。
            if(Auth::attempt($credentials)) {
                # ユーザーを認証する
                $request->authenticate();
    
                # セッションIDの発行
                $request->session()->regenerate();
    
                return response()->json([
                    'status' => 'success',
                    'message' => 'ログインが成功しました'
                ], 200);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'ログインに失敗しました'
                ], 401);
           }
        } catch (\Illuminate\Auth\AuthenticationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => '予期せぬエラーが発生しました'
            ], 500);
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): Response
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->noContent();
    }
}
