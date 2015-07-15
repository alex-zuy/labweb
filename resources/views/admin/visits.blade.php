@extends('master')

@section('main')
    <div class="container">
        <div class="row">
            <h1>Visits</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            Date, time
                        </th>
                        <th>
                            Page
                        </th>
                        <th>
                            IP
                        </th>
                        <th>
                            Host
                        </th>
                        <th>
                            Browser
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($visits as $visit)
                        <tr>
                            <td>{{ PrettyDate::parse($visit->created_at)->toDayDateTimeString() }}</td>
                            <td>{{ $visit->page }}</td>
                            <td>{{ $visit->ip }}</td>
                            <td>{{ $visit->host }}</td>
                            <td>{{ $visit->user_agent }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $visits->render() !!}
        </div>
    </div>

@endsection
