<?php

namespace App\Http\Controllers;

use App\Models\Shop;    //モデルを使用
use Illuminate\Http\Request;    //アプリケーションが処理している現在のHTTPリクエストを操作し、リクエストとともに送信される入力、クッキー、およびファイルを取得するオブジェクト指向の手段を提供
use Illuminate\Support\Facades\DB;  //DBクラスでもクエリビルダでもDBファサードによる記述のためIlluminate\Support\Facades\DBをuseします。
use Illuminate\Support\Facades\Hash;    //保存するユーザーパスワードに対し、安全なBcryptとArgon2ハッシュを提供。登録と認証で自動的にBcrypt使用します。
use Carbon\Carbon;  //DateTimeクラスを継承した日時を扱う

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //一覧取得
    public function index()
    {
        $items = Shop::all();
        return response()->json([
            'message' => 'User got successfully',
            'data' => $items
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //詳細
    public function store($shop_id, Request $request)
    {
        $items = Shop::where('shop_id',$shop_id)->first();
        return response()->json([
            'message' => 'User got successfully',
            'data' => $items
        ], 200);
    }
}
