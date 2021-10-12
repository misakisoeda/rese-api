<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\User;
use App\Models\Shop;
use Illuminate\Http\Request;    //アプリケーションが処理している現在のHTTPリクエストを操作し、リクエストとともに送信される入力、クッキー、およびファイルを取得するオブジェクト指向の手段を提供
use Illuminate\Support\Facades\DB;  //DBクラスでもクエリビルダでもDBファサードによる記述のためIlluminate\Support\Facades\DBをuseします。
use Illuminate\Support\Facades\Hash;    //保存するユーザーパスワードに対し、安全なBcryptとArgon2ハッシュを提供。登録と認証で自動的にBcrypt使用します。
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;  //DateTimeクラスを継承した日時を扱う

class LikesController extends Controller
{

    // public function index(Request $request)
    // {
    //     // $author_name1 = User::all();
    //     // $author_name2 = Like::all();
    //     // $author_name3 = Shop::all();

    //     // return response()->json([
    //     //     'message' => 'User got successfully',
    //     //     'data1' => $author_name1,
    //     //     'data2' => $author_name2,
    //     //     'data3' => $author_name3,
    //     // ], 200);

    //     $user_id = $request->user_id;
    //     // $likesdata=Like::where('user_id',$user_id)->with(['shop'=>function($query){
    //     //     $query->with('area','genre');
    //     // }])->get();

    //     return response()->json([
    //         'message'=>'OK',
    //         'data'=>$user_id
    //         ],200);
    // }

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
            'message' => 'Like created successfully, index',
            'data' => $param
        ], 200);

        return response()->json([$param]);
    }

    // public function index(Request $request)
    // {
    //     $author_name1 = User::all();
    //     $author_name2 = Like::all();
    //     $author_name3 = Shop::all();

    //     // $user_id = $request->user_id;
    //     $user_id = 2;
    //     $likesdata = Like::where('user_id', $user_id)->with(['shop' => function($query){
    //         $query->with('shop_area');
    //     }])->get();

    //     return response()->json([
    //         'message' => 'User got successfully',
    //         'dataaaa' => $user_id,
    //         'databbb' => $likesdata,
    //         'data1' => $author_name1,
    //         'data2' => $author_name2,
    //         'data3' => $author_name3,
    //     ], 200);
    // }


    public function index(Request $request)
    {

        $user1 = Auth::user();

        $user = User::all();
        $like = Like::find(1);


        // $likesdata = User::where('user_id', $user_id)->with(['shop' => function($query){
        //     $query->with('shop_area');
        // }])->get();

        // $user_id=$request->user_id;
        // foreach ($user->ranks as $rank) {
        //     $rank->id;//会員ランクのID表示
        //     $rank->name;//会員ランクの名前表示
        // }

        // $items = Like::all();
        // $user_id = $request->user_id;
        // $likesdata = Like::where('user_id', $user_id)->with(['shop' => function($query){
        //     $query->with('shop_area');
        // }])->get();
        // foreach ($items as $item) {
        //     $item;
        // }
        // return view('book.index', ['items'=>$items]);
        return response()->json([
            'message' => 'OK',
            'data3' => $user1,
            'data' => $user,
            'data2' => $like,
        ],200);
    }




    public function destroy(Request $request)
    {
        $param = [
            "user_id" => $request->user_id,
            "shop_id" => $request->shop_id
        ];
        DB::table('likes')->where('user_id', $request->user_id)->where('shop_id', $request->shop_id)->delete();
        return response()->json([
            'message' => 'Like created successfully, delete',
            'data' => $param
        ], 200);
    }
}
