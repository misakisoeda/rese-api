<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;    //アプリケーションが処理している現在のHTTPリクエストを操作し、リクエストとともに送信される入力、クッキー、およびファイルを取得するオブジェクト指向の手段を提供
use Illuminate\Support\Facades\DB;  //DBクラスでもクエリビルダでもDBファサードによる記述のためIlluminate\Support\Facades\DBをuseします。
use Illuminate\Support\Facades\Hash;    //保存するユーザーパスワードに対し、安全なBcryptとArgon2ハッシュを提供。登録と認証で自動的にBcrypt使用します。

class LikesController extends Controller
{

    public function post(Request $request)
    {
        $now = Carbon::now();
        $param = [
            "user_id" => $request->user_id,
            "shop_id" => $request->shop_id,
            "created_at" => $now,
            "updated_at" => $now
        ];
        DB::table('likes')->insert($param);
        return response()->json([
            'message' => 'Like created successfully',
            'data' => $param
        ], 200);
    }

    public function delete(Request $request)
    {
        DB::table('likes')->where('shop_id', $request->shop_id)->where('user_id', $request->user_id)->delete();
        return response()->json([
            'message' => 'Like deleted successfully',
        ], 200);
    }
}
