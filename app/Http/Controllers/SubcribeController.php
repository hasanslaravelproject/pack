<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Subscription;
use Carbon\Carbon;
use session;

class SubcribeController extends Controller
{
    public function index($id)
    {
        $abcs = Client::where('id',$id)->first();
        session(['cli_id' => $abcs->id]);
        $pack = Subscription::where("status",1)->get();

        return view('subscribe.index', compact('pack'));
    }

    public function create($id){
        $client = Client::where('id',session('cli_id'))->first();
        $pack = Subscription::where("id",$id)->first();
        $hour = $pack->validity * 24;


        $expireday = date("Y-m-d H:i:s", strtotime('+'.$hour.' hours'));

        Client::where('id',$client->id)->update([
            'packageid' => $pack->packageid,
            'expirydate' => $expireday,
        ]);


         return redirect('clients');

    }

}
