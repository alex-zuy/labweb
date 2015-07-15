@extends('app')

@section('title')
    Browse history
@endsection

@section('content')
    <h1>Browse history</h1>
    <table class="table browse-history">
        <thead>
            <tr>
                <th>Page</th>
                <th>Visits during session</th>
                <th>Visits in total</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
@endsection

@section('additional-scripts')

    @parent

    <script>
        $(function() {
            var STORAGE_KEY = 'browse_history';

            var cookie = $.cookieStorage.setPath('/');

            if(cookie.isSet(STORAGE_KEY) && $.sessionStorage.isSet(STORAGE_KEY)) {
                var tbody = $('table.browse-history').get(0);
                cookie.keys(STORAGE_KEY).forEach(function(page) {
                    $(document.createElement('TR'))
                            .append(
                                $(document.createElement('TD'))
                                        .text(page))
                            .append(
                                $(document.createElement('TD'))
                                        .text(cookie.get(STORAGE_KEY+'.'+page)))
                            .append(
                                $(document.createElement('TD'))
                                        .text($.sessionStorage.isSet(STORAGE_KEY+'.'+page) ?
                                            $.sessionStorage.get(STORAGE_KEY+'.'+page) :
                                            0))
                            .appendTo(tbody);
                });
            }
        });
    </script>
@endsection
