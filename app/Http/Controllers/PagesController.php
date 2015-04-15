<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Photo;
use App\VideoAlbum;
use App\PhotoAlbum;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function welcome()
    {

    }
	public function imagenes()
	{
        //		TODO: abstract to model
        $sliders = Photo::join('photo_albums', 'photo_albums.id', '=', 'photos.photo_album_id')->where('photos.slider',
            1)->orderBy('photos.position', 'DESC')->orderBy('photos.created_at', 'DESC')->select('photos.filename',
            'photos.name', 'photos.description', 'photo_albums.folder_id')->get();

        $photoAlbums = PhotoAlbum::select(array(
            'photo_albums.id',
            'photo_albums.name',
            'photo_albums.description',
            'photo_albums.folder_id',
            DB::raw('(select filename from ' . DB::getTablePrefix() . 'photos WHERE album_cover=TRUE and ' . DB::getTablePrefix() . 'photos.photo_album_id=' . DB::getTablePrefix() . 'photo_albums.id LIMIT 1) AS album_image'),
            DB::raw('(select filename from ' . DB::getTablePrefix() . 'photos WHERE ' . DB::getTablePrefix() . 'photos.photo_album_id=' . DB::getTablePrefix() . 'photo_albums.id ORDER BY position ASC, id ASC LIMIT 1) AS album_image_first')
        ))->limit(8)->get();

        return view('pages.imagenes', compact('sliders', 'photoAlbums'));
	}

	public function video()
	{
        $videoAlbums = VideoAlbum::select(array(
            'video_albums.id',
            'video_albums.name',
            'video_albums.description',
            'video_albums.folder_id',
            DB::raw('(select youtube from ' . DB::getTablePrefix() . 'videos WHERE album_cover=TRUE and ' . DB::getTablePrefix() . 'videos.video_album_id=' . DB::getTablePrefix() . 'video_albums.id LIMIT 1) AS album_image'),
            DB::raw('(select youtube from ' . DB::getTablePrefix() . 'videos WHERE ' . DB::getTablePrefix() . 'videos.video_album_id=' . DB::getTablePrefix() . 'video_albums.id ORDER BY position ASC, id ASC LIMIT 1) AS album_image_first')
        ))->limit(8)->get();

        return view('pages.video', compact('videoAlbums'));
	}

}
