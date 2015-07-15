@extends('app')

@section('title')
    Education test
@endsection

@section('content')
    <h1>Test</h1>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">Test on subject 'Physics'</div>
        </div>
        <div class="panel-body">
            @include('errors')
            {!! Form::open([
                'url' => 'education/test',
                'method' => 'POST',
                'class' => 'form'
            ]) !!}
            <div class="form-group">
                <label for="full_name" class="control-label">Full name</label>
                {!! Form::text('full_name', '', ['class' => 'form-control', 'id' => 'full_name']) !!}
            </div>
            <div class="form-group">
                <label for="gender" class="control-label">Gender</label>
                <div>
                    <div class="radio">
                        <label>
                            {!! Form::radio('gender', 'male', null) !!}
                            Male
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            {!! Form::radio('gender', 'female', null) !!}
                            Female
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="group" class="control-label">Group</label>
                {!! Form::select('group',
                    array_merge($groups, ['unselected' => 'Unselected']),
                    'unselected',
                    ['class' => 'form-control', 'id' => 'group'])
                !!}
            </div>
            <div class="form-group">
                <label for="answer_one" class="control-label">1. What particles constitute Beta-radiation.</label>
                {!! Form::text('answer_one', '', ['class' => 'form-control', 'id' => 'answer_one']) !!}
            </div>
            <div class="form-group">
                <label for="answer_two" class="control-label">2. Usage of lever gives benefit in ... </label>
                <div class="checkbox">
                    <label>
                        {!! Form::checkbox('answer_two[]', 'power', null) !!}
                        Power
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        {!! Form::checkbox('answer_two[]', 'force', null) !!}
                        Force
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="answer_three" class="control-label">3. "For every action, there is an equal and opposite reaction". This quote belongs to ... </label>
                {!! Form::select('answer_three',
                    array_merge($answerThreeAlternatives, ['unselected' => 'Unselected']) , 'unselected',
                    ['class' => 'form-control'])
                !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Submit', ['class' => 'form-control btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>

@endsection
