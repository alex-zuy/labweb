<?php
/**
 * @var App\BlogRecord records[]
 */

?>

{!! $records->render() !!}
@foreach($records as $record)
    <div data-blog-record-id="{{$record->id}}">
        <blockquote>
            <div class="row">
                <h3>{{$record->subject}}</h3>
                @if($record->image_mime_type != null)
                    <div class="col-sm-3">
                        <a class="thumbnail" href="#">
                            <img src="{{action('BlogRecordsController@fetchImage', ['blogId' => $record->id])}}">
                        </a>
                    </div>
                @endif
                <div class="col-sm-9">
                    <p>{{$record->text}}</p>
                    <footer>{{ PrettyDate::parse($record->created_at)->toDayDateTimeString() }}</footer>
                </div>
            </div>
            @if(Auth::check())
                <button data-blog-record-id="{{$record->id}}" class="btn btn-default btn-xs">
                    {{ $buttonLabel }}
                </button>
            @endif
        </blockquote>
        <div class="comments-block">
            @include('blog.comments-list', ['comments' => $record->comments()->get()])
        </div>
    </div>
@endforeach

{!! Form::open([
'url' => route('my-blog.set-records-per-page'),
'method' => 'POST',
'id' => 'records-per-page-form',
]) !!}
<div class="form-group col-sm-4">
    <label for="per-page" class="control-label">Records per page</label>
    {!! Form::select(
    'per-page',
    [3 => 3, 5 => 5, 10 => 10, 20 => 20],
    session('blog-records-per-page', 3),
    ['class' => 'form-control', 'id' => 'per-page']
    ) !!}
</div>
{!! Form::close() !!}

<div class="modal fade" id="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script>
    $(function () {
        var form = $('#records-per-page-form').get(0);
        $(form['per-page']).change(function (e) {
            $(form).submit();
        });
    });
</script>
