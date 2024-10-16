<?php

namespace App\Http\Controllers;
use App\Models\Part;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Part as PartResource;
use App\Http\Controllers\BaseController as BaseController;



use Illuminate\Http\Request;

class PartAController extends BaseController
{

    public function index()
    {

        $part=Part::all();
        return $this->sendResponse(PartResource::collection($part),
            ' All body parts  successfully');
    }
    public function store(Request $request)
    {
        //$input = $request->all();

        //$validator=Validator::make($input,['name_of_part'=>'required|max:30',
          //  'image_url'=>'required|img:jpeg,png,bmp,jpg,gif,svg|max:2048',

        //]);
      /*  if ($validator->fails()){
            return $this->sendError('something is wrong',$validator->errors());
        }*/
      /*  $img_url = $this -> saveImage($request->img_url,folder:'images/');
        $part= Part::create([
            'name_of_part'=>$request->name_of_part,
            'image_url'=>$img_url,

        ]);*/
          //$part=Part::create($input);
        //return $this->sendResponse(new PartResource($part),'part added successfully');


        $input = $request->all();
        $validator=Validator::make($input,['name_of_part'=>'required',

        ]);
        if ($validator->fails()){
            return $this->sendError('something is wrong',$validator->errors());
        }
        $part=Part::create($input);
        return $this->sendResponse(new PartResource($part),'part added successfully');

    }

    public function show($id)
    {
        $part=Part::find($id);
        if (is_null($part)){
            return $this->sendError('this part is not found');

        }
        return  $this->sendResponse(new PartResource($part),'part of body shown successfully');
    }
    public function update(Request $request, $part)
    {
        $input=$request->all();
        $validator=Validator::make($input,['name_of_part'=>'required|max:30',
            'image_url'=>'required|img:jpeg,png,bmp,jpg,gif,svg|max:2048',
        ]);
        if ($validator->fails()){
            return $this->sendError('something is wrong',$validator->errors());
        }
        $part->name_of_part=$input['name_of_part'];
      //  $part->image_url=$input['image_url'];
        $part->save();
        return  $this->sendResponse(new PartResource($part),'this part of body updated successfully');

    }
    public function destroy(Part $part)
    {
        $part->delete();
        return  $this->sendResponse(new PartResource($part),'exercise deleted successfully');

    }

   /* public function saveImage($photo ,$folder){
        $newimage = $photo->getclientOriginalExtension();
        $img_url = time().'.'.$newimage;
        $path = $folder;
        $photo ->move($path, $img_url);
        return $img_url;
    }*/


}
