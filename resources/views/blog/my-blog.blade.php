@extends('app')

@section('title')
    My blog
@endsection

@section('content')
    <h1>My blog</h1>
    @include('blog.paginated-view', ['buttonLabel' => 'Comment'])
@endsection

@section('additional-scripts')

    @parent

    <script>
        $(function() {
            var GET_FORM_URL = '{{ action('BlogRecordCommentsController@create') }}';
            var POST_FORM_URL = '{{ action('BlogRecordCommentsController@store') }}';
            var GET_COMMENTS_URL = '{{ action('BlogRecordCommentsController@index') }}';

            $('button[data-blog-record-id]').click(function(e) {
                var blogRecordId = $(this).attr('data-blog-record-id');
                var modal = $('#modal').modal('show').get(0);
                var modalBody = $(modal).find('div.modal-body').get(0);
                $(modal).find('h4.modal-title').text('Create comment');
                var loadCallback = function() {
                    $(this).find('form').submit(function(e) {
                        e.preventDefault();
                        $.post(POST_FORM_URL, {
                            text : this['text'].value,
                            blog_record_id : blogRecordId,
                            _token: this['_token'].value
                            }, postResponseCallback);
                    });
                };
                var postResponseCallback = function(response) {
                    if(response.status == 'retry') {
                        $(modalBody).empty().html(response.html);
                        loadCallback.apply(modalBody);
                    }
                    else {
                        $(modal).modal('hide');
                        $('div[data-blog-record-id='+blogRecordId+'] div.comments-block')
                                .empty()
                                .load(GET_COMMENTS_URL, 'blog_record_id='+blogRecordId);
                    }
                };
                $(modalBody)
                        .empty()
                        .load(GET_FORM_URL, 'blog_record_id='+blogRecordId, loadCallback);

            });
        });
    </script>
@endsection
