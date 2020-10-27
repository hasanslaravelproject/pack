<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;

class SubscriptionController extends Controller
{

    public function index()
    {
        $abcs = Subscription::all();

        return view('subscriptionpack.index', compact('abcs'));
        return Response()->json($abcs);
    }

    public function create(Request $request)
    {
$p_id =rand(1000,9999);
        $img= "";
    if ($image = $request->file('s_image')) {
        $name = $p_id;
        $extension = $image->getClientOriginalExtension();
        $imageName = $name . '.' . $extension;
        $path = public_path('backend/image/im1');

        $image->move($path, $imageName);
        $img = $imageName;
    }
        Subscription::create([
            'packagename' => strtoupper( $request->input('packagename')),
            's_image' =>  $img,
            'packageid' => $p_id,
            'type' => $request->input('type'),
            'validity' => $request->input('validity'),
            'price' => $request->input('price'),

            'status' =>  0,
        ]);
        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
            "info" => $p_id,
        ]);
    }
    public function delete(Request $request)
    {
        $id = $request->input('id');
        $std= Subscription::find($id);
        $image_path = "backend/image/im1/$std->s_image";
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        Subscription::destroy($id);
        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
            "info" => $id,
        ]);
    }

    public function edit($id)
    {
        $stu = Subscription::find($id);
        //return view('hasan.index', compact('stu'));
        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
            "m" => "subscriptionpack",
            "ms" => $stu,
        ]);
    }
    public function update(Request $request)
    {
        $id = $request->input('inid');
        $stu = Subscription::find($id);
        $img= "";
        if ($image = $request->file('s_image')) {
            $name = $stu->s_id;
            $extension = $image->getClientOriginalExtension();
            $imageName = $name . '.' . $extension;
            $path = public_path('backend/image/im1');
            $image->move($path, $imageName);
            $img = $imageName;
        }

        Subscription::where('id',$id)->update([
            'packagename' => strtoupper( $request->input('packagename')),
            's_image' => $img,
        ]);
        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
        ]);
    }
    public function status($id){
        $std = Subscription::find($id);
        if ($std->status == 1){
            $t = "Deactivated";

            Subscription::where('id',$id)->update([
                'status' =>  0,
            ]);
        }else{
            $t = "Activated";
            Subscription::where('id',$id)->update([
                'status' =>  1,
            ]);
        }
        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
            "ms" => $std->status,
            "info" => "Subscription status Changed to ".$t,

        ]);
    }
}
