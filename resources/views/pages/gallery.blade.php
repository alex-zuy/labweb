@extends('app')

@section('title')
    Gallery
@endsection

<?php
    $alts = [
        'АК',
        'M4A1',
        'Winchester',
        'Вторая мировая',
        'M3A3 Бредли',
        'Не знаю что это',
        'T72',
        'Атомная подводная лодка',
        'M1A1 Abrams',
        'Винтовка',
        'M249',
        'T72',
        'Фауст-Патрон',
        'Неизвестный танк',
        'Два пришвартованых авианосца'
    ];
    foreach(range(1, 15) as $i) {
        $photos[] = ['name' => $alts[$i -1], 'fileName' => "img/gallery-photo-$i.jpg"];
    }
?>

@section('content')
    <h1>Gallery</h1>
    <div class="row col-md-12 gallery-photo-previews">
        @foreach($photos as $index => $photo)
            <a class="thumbnail col-md-3" data-toggle="modal" data-target="#photo-view" data-carousel-index="{{$index}}">
                <img src="{{$photo['fileName']}}" alt="{{$photo['name']}}">
            </a>
        @endforeach
    </div>

    <!-- Modal window setup -->
    <div class="modal fade" id="photo-view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Photo</h4>
                </div>
                <div class="modal-body">

                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="">

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            @foreach($photos as $index => $photo)
                                <div class="item{{$index == 0 ? ' active' : ''}}">
                                    <img src="{{$photo['fileName']}}" alt="{{$photo['name']}}">
                                    <div class="carousel-caption">
                                        {{$photo['name']}}
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('additional-scripts')

    @parent

    <script>
        $(function() {
            $('div.gallery-photo-previews a.thumbnail')
                    .mouseenter(function(e) {
                        var index = parseInt($(e.currentTarget).attr('data-carousel-index'));
                        $('#photo-view').carousel(index);
                    });
        });
    </script>

@endsection
