@extends('app')

@section('title')
    Contacts
@endsection

@section('content')
    <h1>Contacts</h1>
    <p>
        You may try contact me using form below.
    </p>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Contact form</h3>
        </div>
        <div class="panel-body">
            @include('errors')
            {!! Form::open(['url' => action('ContactsController@submit'), 'class' => 'form-horizontal']) !!}
            <div class="form-group">
                <label for="full-name" class="col-md-2 control-label">Full name</label>
                <div class="col-md-10"  data-toggle="tooltip" data-placement="top" title="Should contain 3 words">
                    {!! Form::text('full-name', '', ['class' => 'form-control', 'id' =>
                    'full-name']) !!}
                </div>
            </div>
            <div class="form-group">
                <label for="phone-number" class="col-md-2 control-label">Phone number</label>
                <div class="col-md-10"  data-toggle="tooltip" data-placement="top" title="Should start with +3 or +7 and contain 9 or 11 digits">
                    {!! Form::text('phone-number', '', ['class' => 'form-control', 'id' =>
                    'phone-number']) !!}
                </div>
            </div>
            <div class="form-group">
                <label for="gender" class="col-md-2 control-label">Gender</label>
                <div class="col-md-10">
                    <div class="radio">
                        <label>
                            {!! Form::radio('gender', 'male') !!}
                            Male
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            {!! Form::radio('gender', 'female') !!}
                            Female
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="age" class="col-md-2 control-label">Age</label>
                <div class="col-md-10">
                    <?php
                    $ages['unselected'] = 'Unspecified';
                    foreach(range(1, 10) as $i) {
                        $ages[$i] = 10 * ($i - 1) . ' - ' . 10 * $i;
                    }
                    ?>
                    {!! Form::select('age', $ages, '-1', ['class' => 'form-control', 'id' => 'age'])
                    !!}
                </div>
            </div>
            <div class="form-group">
                <label for="birth-date" class="col-md-2 control-label">Birth date</label>
                <div class="col-md-10">
                    <div class='input-group date' id='birth-date-picker'>
                        {!! Form::text('form-control', null, ['class' => 'form-control', 'id' => 'form-control']) !!}
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-10 col-md-offset-2">
                    {!! Form::submit('Submit', ['class' => 'form-control btn btn-primary']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('additional-scripts')

    @parent

    <!--Dependency for "bootstrap-datatimepicker"-->
    <script src="/js/moment.js"></script>
    <!--"bootstrap-datatimepicker" for calendar input-->
    <script src="/js/bootstrap-datetimepicker.min.js"></script>
    <link rel="stylesheet" href="/css/bootstrap-datetimepicker.min.css">

    <script>
        $(function () {
            $('#birth-date-picker').datetimepicker();
        });
    </script>

@endsection
