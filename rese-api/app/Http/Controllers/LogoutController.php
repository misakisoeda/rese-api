<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;    //アプリケーションが処理している現在のHTTPリクエストを操作し、リクエストとともに送信される入力、クッキー、およびファイルを取得するオブジェクト指向の手段を提供

class LogoutController extends Controller
{
    public function post(Request $request)
    {
        return response()->json(['auth' => false], 200);
    }
}
