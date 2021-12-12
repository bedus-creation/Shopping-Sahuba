<?php

namespace App\Application\Base\Controllers;

use App\Core\Http\Controllers\Controller;
use App\Domain\Base\Models\Media;
use App\Domain\Base\Resources\MediaResources;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

/**
 * Class MediaController
 *
 * @package App\Http\Controllers\Utils
 */
class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $medias = Media::query()
            ->orderBy('id', 'desc')
            ->limit(20)->get();

        $files = MediaResources::Collection($medias);

        return response()->json(["data" => $files]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'file' => 'required|file|max:5000|mimes:' . $this->getAllowedFileTypes()
        // ]);

        if ($fileUid = $request->file->store('', 'public')) {
            $img = Image::make($request->file);

            $big = $img->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save('storage/upload/600-'.$fileUid);


            $medium = $img->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save('storage/upload/300-'.$fileUid);

            $small = $img->resize(100, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save('storage/upload/100-'.$fileUid);

            return Media::create([
                'type' => 'image',
                'base_url' => url('/'),
                'in_json' => json_encode([
                    'sizes' => [
                        'small' => getimagesize($request->file),
                        'medium' => getimagesize($request->file),
                        'big' => getimagesize($request->file),
                    ],
                    'images' => [
                        'small' => Storage::url('upload/100-'.$fileUid),
                        'medium' => Storage::url('upload/300-'.$fileUid),
                        'big' => Storage::url('upload/600-'.$fileUid),
                    ],
                ]),
            ]);
        }

        return response(['msg' => 'Unable to upload your file.'], 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Media $media)
    {
        return (string) $media->delete();
    }
}
