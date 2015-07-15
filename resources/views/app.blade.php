{{-- base template for all app pages --}}

@extends('master')


@section('main')
    @include('menu')

    <div class="container">
        <div class="content">
            <div class="row col-md-8 col-md-offset-2">
                @yield('content')
            </div>
        </div>
    </div>
@endsection

@section('additional-scripts')
    <script src="/js/jquery.cookie.js"></script>
    <script src="/js/jquery.storageapi.js"></script>
    <script>
        $(function() {
            var PAGE_TITLE = $('title').text().trim();

            if(PAGE_TITLE.length == 0) {
                var a = $(document.createElement('A')).attr('href', window.location.href).get(0);
                PAGE_TITLE = a.pathname.length == 0 ? 'Home' : a.pathname;
            }

            $.cookieStorage.setPath('/');

            var updateStorage = function(storage) {
                var key= 'browse_history.'+PAGE_TITLE;
                if(storage.isSet(key)) {
                    var visits = parseInt(storage.get(key));
                    storage.set(key, visits + 1);
                }
                else {
                    storage.set(key, 1);
                }
            };

            updateStorage($.cookieStorage);
            updateStorage($.sessionStorage);
        });
    </script>
@endsection
