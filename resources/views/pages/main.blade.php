@extends('app')

@section('title')
    Main page
@endsection

@section('content')
    <h1>
        Table
    </h1>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <td>Name Surname Patronymic</td>
                <td>Zuy Alexey Gennadievich</td>
            </tr>
            <tr>
                <td>Lab work</td>
                <td>8+</td>
            </tr>
            <tr>
                <td>Theme</td>
                <td>MVC architecture</td>
            </tr>
        </tbody>
    </table>
    <h1>
        Photo
    </h1>
    <div class="row">
        <div class="col-md-6">
            <a href="#" class="thumbnail">
                <img src="img/main-page.jpg">
            </a>
        </div>
    </div>
@endsection
