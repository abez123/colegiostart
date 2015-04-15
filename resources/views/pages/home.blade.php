@extends('app')
@section('title') Home :: @parent @stop
@section('content')
<div class="row">
    <div class="page-header">
        <h2>Noticias</h2>
    </div></div>

    @if(count($articles)>0)
        <div class="row">
            <h2>Avisos</h2>
            @foreach ($articles as $post)
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-8">
                            <h4>
                                <strong><a href="{{URL::to('news/'.$post->id.'')}}">{!!
                                        $post->title !!}</a></strong>
                            </h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <a href="{{URL::to('news/'.$post->id.'')}}" class="thumbnail"><img
                                        src="http://placehold.it/260x180" alt=""></a>
                        </div>
                        <div class="col-md-10">
                            <p>{!! $post->introduction !!}</p>

                            <p>
                                <a class="btn btn-mini btn-default"
                                   href="{{URL::to('news/'.$post->id.'')}}">Leer más</a>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p></p>

                            <p>
                                <span class="glyphicon glyphicon-user"></span> by <span
                                        class="muted">{!! $post->author->name !!}</span> | <span
                                        class="glyphicon glyphicon-calendar"></span> {!! $post->created_at !!}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif




@endsection

@section('scripts')
    @parent
    <script>
        $('#myCarousel').carousel({
            interval: 4000
        });
    </script>
@endsection
@stop
