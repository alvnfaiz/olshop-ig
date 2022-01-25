<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InstagramUser;
use App\Models\CallbacksModel;
use App\Http\Requests\StoreInstagramUserRequest;
use App\Http\Requests\UpdateInstagramUserRequest;

class InstagramUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instagram_user = InstagramUser::all();

        if($instagram_user!=null) {
            return view('Admin.instagram', [
                'instagramUsers' => $instagram_user
            ]);
        }else{
            return view('Admin.instagram', [
                'instagramUsers' => null
            ]);
        }
    }

    public function login(Request $request){
        $client_id = env('INSTAGRAM_CLIENT_ID');
        $redirect_uri = env('INSTAGRAM_REDIRECT_URI');
        $client_secret = env('INSTAGRAM_CLIENT_SECRET');
        $code = request()->get('code');
        $request->session()->put('code', $code);
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://graph.facebook.com/v12.0/oauth/access_token?client_id='. $client_id.'&redirect_uri='.$redirect_uri.'&client_secret='.$client_secret.'&code=' . $code);
        $access_token = json_decode($response->getBody())->access_token;
        CallbacksModel::where('name', 'access_token')
            ->update(['value'=>$access_token]);
        CallbacksModel::where('name', 'token_type')
            ->update(['value'=>json_decode($response->getBody())->token_type]);
        CallbacksModel::where('name', 'expires_in')
            ->update(['value'=>json_decode($response->getBody())->expires_in]);
        $data = CallbacksModel::all();
        dd($data);
        //dd($response->getBody()->getContents());
        // header("Content-Type: application/json");
        // return json_encode($response->getBody()->getContents());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $instagram_user = InstagramUser::get()[1];
        return view('Admin.instagram.create', [
            'instagram_user' => $instagram_user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\Illuminate\Http\Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://www.instagram.com/'.$request->username.'/?__a=1');
        $response = json_decode($response->getBody()->getContents());
        $instagram_user = new InstagramUser();
        $instagram_user->id = $response->graphql->user->id;
        $instagram_user->username = $request->username;
        $instagram_user->password = $request->password;
        $instagram_user->full_name = $response->graphql->user->full_name;
        $instagram_user->profile_picture = $response->graphql->user->profile_pic_url_hd;
        $instagram_user->bio = $response->graphql->user->biography;
        $instagram_user->website = $response->graphql->user->external_url;
        $instagram_user->is_private = $response->graphql->user->is_private;
        $instagram_user->media_count = $response->graphql->user->edge_owner_to_timeline_media->count;
        $instagram_user->follows_count = $response->graphql->user->edge_follow->count;
        $instagram_user->followed_by_count = $response->graphql->user->edge_followed_by->count;
        $instagram_user->save();
        return redirect()->route('admin.instagram.index');
        // return response()
        //     ->json(json_decode($response->getBody()->getContents(), true, JSON_UNESCAPED_SLASHES))
        //     ->header('Content-Type', 'application/json');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InstagramUser  $instagramUser
     * @return \Illuminate\Http\Response
     */
    public function show(InstagramUser $instagramUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InstagramUser  $instagramUser
     * @return \Illuminate\Http\Response
     */
    public function edit(InstagramUser $instagramUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInstagramUserRequest  $request
     * @param  \App\Models\InstagramUser  $instagramUser
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInstagramUserRequest $request, InstagramUser $instagramUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InstagramUser  $instagramUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(InstagramUser $instagramUser)
    {
        //
    }
}
