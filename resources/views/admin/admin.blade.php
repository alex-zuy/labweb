@extends('master')

@section('main')
    @include('menu')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2 col-sm-offset-2">
                <div class="list-group">
                    <button data-href="{{ route('my-blog.create-record') }}" class="list-group-item">
                        <h4 class="list-group-item-heading">Create blog record</h4>
                        <p class="list-group-item-text">Create new blog record by filling form</p>
                    </button>
                    <button data-href="{{ route('my-blog.load-from-file') }}" class="list-group-item">
                        <h4 class="list-group-item-heading">Load blog records</h4>
                        <p class="list-group-item-text">Load blog records from CSV file</p>
                    </button>
                    <button data-href="{{ route('admin.guest-book-editor') }}" class="list-group-item">
                        <h4 class="list-group-item-heading">Guest book editor</h4>
                        <p class="list-group-item-text">Load guest book messages from file</p>
                    </button>
                    <button data-href="{{ route('admin.visits') }}" class="list-group-item">
                        <h4 class="list-group-item-heading">Visits</h4>
                        <p class="list-group-item-text">View visit log</p>
                    </button>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="row">
                    <div class="embed-responsive embed-responsive-4by3">
                        {{--Фреймовая структура? Ну ладно ...--}}
                        <iframe id="iframe" src="{{ route('my-blog.create-record') }}"
                                class="embed-responsive-item">
                        </iframe>
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
            $('button[data-href]').click(function(e) {
                $('#iframe').attr('src', $(e.delegateTarget).attr('data-href'));
            });
        });
    </script>

@endsection
