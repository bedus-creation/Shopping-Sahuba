<?php

namespace App\Http\Controllers\Utils;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Media;
use App\Http\Resources\MediaResources;
use Intervention\Image\ImageManagerStatic as Image;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $files = \File::Files('upload');
		// foreach($files as $file) {
		// 	$name[]=$file->getPath()."/".$file->getFilename();
        // }
        $files=MediaResources::Collection(Media::orderBy('id','desc')->limit(20)->get());
		return response()->json(["data"=>$files]);
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
        // $request->validate([
        //     'file' => 'required|file|max:5000|mimes:' . $this->getAllowedFileTypes()
        // ]);
    
        if ( $fileUid = $request->file->store('', 'public') ) {

            $img = Image::make($request->file);

            $big=$img->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save('storage/upload/600-'.$fileUid);

            
            $medium=$img->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save('storage/upload/300-'.$fileUid);
            
            $small=$img->resize(100, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save('storage/upload/100-'.$fileUid);

            return Media::create([
                'type'=>'image',
                'base_url'=>url('/'),
                'in_json'=>json_encode([
                    'sizes'=>[
                        'small'=>getimagesize($request->file),
                        'medium'=>getimagesize($request->file),
                        'big'=>getimagesize($request->file),
                    ],
                    'images'=>[
                        'small'=>Storage::url('upload/100-'.$fileUid),
                        'medium'=>Storage::url('upload/300-'.$fileUid),
                        'big'=>Storage::url('upload/600-'.$fileUid),
                    ]
                ]),
            ]);

        }
    
        return response(['msg' => 'Unable to upload your file.'], 400);
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
    public function destroy(Media $media)
    {
        return (string) $media->delete();
    }
}
