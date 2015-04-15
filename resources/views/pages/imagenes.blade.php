
@extends('app')
@section('title') Fotos:: @parent @stop
@section('content')
    <div class="row">
        <div class="page-header">
            <h2>Imagenes</h2>
        </div>
    </div>
    @if(count($photoAlbums)>0)
        <div class="row">
            <h2>Album de Fotos</h2>
            @foreach($photoAlbums as $item)
                <div class="col-sm-3">
                    <div class="row">
                        <a href="{{URL::to('photo/'.$item->id.'')}}"
                           class="hover-effect"> @if($item->album_image!="")
                                <img class="col-sm-12"
                                     src="{!!'appfiles/photoalbum/'.$item->folder_id.'/thumbs/'.$item->album_image !!}">
                            @elseif($item->album_image_first!="")
                                <img class="col-sm-12"
                                     src="{!!'appfiles/photoalbum/'.$item->folder_id.'/thumbs/'.$item->album_image_first !!}">
                            @else
                                <img class="col-sm-12" src="{!!'appfiles/photoalbum/default-image.jpg' !!}">
                            @endif
                        </a>

                        <div class=" col-sm-12">{!!$item->name!!}</div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

@endsection