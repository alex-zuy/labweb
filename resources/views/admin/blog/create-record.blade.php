@extends('master')

@section('main')
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">Record creation form</div>
            <div class="panel-body">
                @include('admin.blog.record-form')
            </div>
        </div>
        <h2>All records</h2>
        @include('blog.paginated-view', ['buttonLabel' => 'Edit'])
    </div>
@endsection

@section('additional-scripts')

    @parent

    <script>
        $(function() {
            var GET_FORM_URL = '{{ action('BlogRecordsController@edit') }}';
            var PATCH_FORM_URL = '{{ action('BlogRecordsController@update') }}';

            $('div[data-blog-record-id] button').click(function(e) {
                var blogRecordId = $(this).attr('data-blog-record-id');
                var modal = $('#modal').modal('show').get(0);
                var modalBody = $(modal).find('div.modal-body').get(0);
                $(modal).find('h4.modal-title').text('Edit blog record');
                var loadCallback = function() {
                    $(this).find('form').submit(function(e) {
                        e.preventDefault();
                        $.ajax(PATCH_FORM_URL, {
                            method: 'PATCH',
                            data: {
                                blog_record_id: blogRecordId,
                                subject: this['subject'].value,
                                text: this['text'].value,
                                _token: this['_token'].value
                            },
                            success: patchFormCallback
                        });
                    });
                };
                var patchFormCallback = function(response) {
                    if(response.status == 'retry') {
                        $(modalBody).html(response.html);
                        loadCallback.apply(modalBody);
                    }
                    else {
                        $(modal).modal('hide');
                        var form = $(modal).find('form').get(0);
                        var div = $('div[data-blog-record-id='+blogRecordId+']').get(0);
                        $(div).find('div.row>h3').text(form['subject'].value);
                        $(div).find('div.row>div>p').text(form['text'].value);
                    }
                };
                $(modalBody)
                        .load(GET_FORM_URL, 'blog_record_id='+blogRecordId, loadCallback);
            });
        });
    </script>

@endsection
