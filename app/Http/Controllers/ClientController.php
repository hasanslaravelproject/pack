<?php
namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ClientController extends Controller
{
    public function index()
    {
        $abcs = Client::all();
        return view('client.index', compact('abcs'));
        return Response()->json($abcs);
    }

    public function create(Request $request)
    {

$std= Client::orderBy('created_at', 'desc')->first();
        if ($std) {
            $stid = $std->s_id +1;
    }else{
            $stid = 1000;

    }
        $img= "";
    if ($image = $request->file('s_image')) {
        $name = $stid;
        $extension = $image->getClientOriginalExtension();
        $imageName = $name . '.' . $extension;
        $path = public_path('backend/image/im1');

        $image->move($path, $imageName);
        $img = $imageName;
    }
        Client::create([
            'clientname' => strtoupper( $request->input('clientname')),
            's_image' =>  $img,
            's_id' =>  $stid,
            'clientname' => strtoupper( $request->input('clientname')),
            'email' =>  strtoupper( $request->input('email')),
            'packageid' => strtoupper( $request->input('packageid')),
            'expirydate' =>strtoupper( $request->input('expirydate')),
            'status' =>  0,
        ]);
        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
            "info" => $stid,
        ]);
    }
    public function delete(Request $request)
    {
        $id = $request->input('id');
        $std= Client::find($id);
        $image_path = "backend/image/im1/std->s_image";
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        Client::destroy($id);
        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
            "info" => $id,
        ]);
    }

    public function edit($id)
    {
        $stu = Client::find($id);
        //return view('hasan.index', compact('stu'));
        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
            "m" => "client",
            "ms" => $stu,
        ]);
    }
    public function update(Request $request)
    {
        $id = $request->input('inid');
        $stu = Client::find($id);
        $img= "";
        if ($image = $request->file('s_image')) {
            $name = $stu->s_id;
            $extension = $image->getClientOriginalExtension();
            $imageName = $name . '.' . $extension;
           $path = public_path('backend/image/im1');
            $image->move($path, $imageName);
            $img = $imageName;
        }

        Client::where('id',$id)->update([
            'clientname' => strtoupper( $request->input('clientname')),
            's_image' => $img,
        ]);
        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
        ]);
    }
    public function status($id){
        $std = Client::find($id);
        if ($std->status == 1){
            $t = "Deactivated";

            Client::where('id',$id)->update([
                'status' =>  0,
            ]);
        }else{
            $t = "Activated";
            Client::where('id',$id)->update([
                'status' =>  1,
            ]);
        }
        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
            "ms" => $std->status,
            "info" => "Client status Changed to ".$t,

        ]);
    }
}
