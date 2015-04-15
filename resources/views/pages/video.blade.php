@extends('app')
@section('title') Videos :: @parent @stop
@section('content')
    <div class="row">
        <div class="page-header">
            <h2>Videos</h2>
        </div>
    </div>
    @if(count($videoAlbums)>0)
        <div class="row">
            <h2>Album de Videos</h2>
            @foreach($videoAlbums as $item)
                <div class="col-sm-3">
                    <div class="row">
                        <a href="{{URL::to('video/'.$item->id.'')}}">
                            @if($item->album_image!="")
                                <img class="col-sm-12"
                                     src="{{{'http://img.youtube.com/vi/'.$item->album_image.'/hqdefault.jpg' }}}">
                            @elseif($item->album_image_first!="")
                                <img class="col-sm-12"
                                     src="{{{'http://img.youtube.com/vi/'.$item->album_image_first.'/hqdefault.jpg' }}}">
                            @else
                                <img class="col-sm-12" src="{{'appfiles/photoalbum/default-image.jpg' }}">
                            @endif
                        </a>

                        <div class=" col-sm-12">{!!$item->name!!}</div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

@endsection