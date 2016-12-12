@extends('layouts.master')

@section('title', 'Start a twine')

@section ('content')
    <h2>Start a twine</h2>
    <form method='POST' action='/twines'>

        {{ csrf_field() }}
        Title: <input type='text' name='title'>

        <input type='submit' value='Start your twine'>
    </form>
@endsection
