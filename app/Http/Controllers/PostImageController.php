<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class PostImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:png,jpg,jpeg|max:1024'
        ]);

        // Model
        $imageModel = new Image;

        // Variable
        $order = $request->product_id;
        $username = $request->username;
        $type = $request->type_image;
        $ext = $request->file->extension();
        $fileName = time().'_'.$request->file->getClientOriginalName();
        $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

        // Base64
        $data = file_get_contents($request->file);
        $base64 = 'data:image/'.$ext.';base64, '.base64_encode($data);

        $imageModel->product_id = $order;
        $imageModel->image = $fileName;
        $imageModel->base64 = $base64;
        $imageModel->path = $filePath;
        $imageModel->created_by = $username;
        $imageModel->updated_by = $username;
        $imageModel->type_image = $type;
        $imageModel->status = 1;
        if($imageModel->save())
        {
            // return back();
            return [
                "success" => true,
                "message" => "uploaded successfully"
            ];
        }else{
            return [
                "success" => false,
                "message" => "uploaded unsuccessfully"
            ];
        }
    }

    public function signature(Request $request){
        
        //Build image
        $base64 = $request->signed;
        $uniq_id = uniqid();
        $folderPath = storage_path('app/public/signature/');
	    $image_parts = explode(";base64,", $base64);
	    $image_type_aux = explode("image/", $image_parts[0]);
	    $image_type = $image_type_aux[1];
	    $image_base64 = base64_decode($image_parts[1]);
        $file = $folderPath . $uniq_id . '.'.$image_type;
        $data = file_put_contents($file, $image_base64);

        // Model
        $imageModel = new Image;

        //Variable
        $order = $request->order_signature;
        $username = $request->form5_username;
        $fileName = $uniq_id . '.'.$image_type;
        $filePath = 'signature/'.$uniq_id . '.'.$image_type;

        $imageModel->product_id = $order;
        $imageModel->image = $fileName;
        $imageModel->base64 = $base64;
        $imageModel->path = $filePath;
        $imageModel->type_image = "signature";
        $imageModel->created_by = $username;
        $imageModel->updated_by = "";
        $imageModel->status = 1;
        if($imageModel->save())
        {
            // return back();
            return [
                "success" => true,
                "message" => "uploaded successfully"
            ];
        }else{
            return [
                "success" => false,
                "message" => "uploaded unsuccessfully"
            ];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
