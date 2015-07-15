@extends('app')

@section('title')
    Contacts
@endsection

@section('content')
    <h1>Success !</h1>
@endsection

@section('additional-scripts')

    @parent

    <script>
        $(function() {
            window.location.href = "mailto:zuy_alexey@mail.ru";
        });
    </script>
@endsection
