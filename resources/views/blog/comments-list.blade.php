@foreach($comments as $comment)
    <blockquote class="blockquote-reverse">
        <p>{{$comment->text}}</p>
        <footer>{{ $comment->user->name }}, {{ PrettyDate::parse($comment->updated_at)->toDayDateTimeString() }}</footer>
    </blockquote>
@endforeach
