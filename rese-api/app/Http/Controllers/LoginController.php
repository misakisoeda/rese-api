<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;    //アプリケーションが処理している現在のHTTPリクエストを操作し、リクエストとともに送信される入力、クッキー、およびファイルを取得するオブジェクト指向の手段を提供
use Illuminate\Support\Facades\DB;  //DBクラスでもクエリビルダでもDBファサードによる記述のためIlluminate\Support\Facades\DBをuseします。
use Illuminate\Support\Facades\Hash;    //保存するユーザーパスワードに対し、安全なBcryptとArgon2ハッシュを提供。登録と認証で自動的にBcrypt使用します。

class LoginController extends Controller
{
   public function post(Request $request)
   {
       $items = DB::table('users')->where('email', $request->email)->first();
       if (Hash::check($request->password, $items->password)) {
           return response()->json(['auth' => true], 200);
       } else {
           return response()->json(['auth' => false], 200);
       }
   }
}
