<?php
namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

class UsersController extends Controller{
    /**
     * @var object
     */
    private $client;

    /**
     * DefaultController constructor.
     */
    public function __construct()
    {
        $this->client = DB::table('oauth_clients')->where('id', 2)->first();
    }
    public function signUp(Request $request){

        $user = new User($request->all());
        $user->password = Hash::make($user->password);
        if(!$user->save()) {
            throw new HttpException(500);
        }
        $request->request->add([
           // 'username' => $request->name,
            'username' => $request->email,
            'password' => $request->password, //Hash::make($request->password); //$request->password;
            'grant_type' => 'password',
            'client_id' => $this->client->id,
            'client_secret' => $this->client->secret,
            'scope' => ''
        ]);
        $proxy = Request::create(
            'oauth/token',
            'POST'
        );
        return Route::dispatch($proxy);
    }
} 