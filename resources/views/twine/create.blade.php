@extends('layouts.master')

@section('title', 'New twine')

@section ('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>START NEW TWINE</h2>
            <form method='POST' action='/twines'>

                {{ csrf_field() }}

                <div class='form-group'>
                    <label>Type of Twine</label>
                    <select name='type_id'>
                        @foreach($types_for_dropdown as $type_id => $name)
                        <option
                        value='{{ $type_id }}'
                        >{{ $name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class='form-group'>
                    <label>Title: </label>
                    <input type='text' id='title' name='title' value='{{ old('title', 'The Tuna Wars') }}'>
                    <div class='error'>
                        {{ $errors->first('title') }}
                    </div>
                </div>

                <div class='form-group'>
                    <label>Starter</label> &nbsp; &nbsp; <a href="javascript:window.location.href=window.location" id="randomSelect">Select Random Starter (Reset)</a>
                    <select id='starters_dropdown' name='starter_id'>
                        @foreach($starters_for_dropdown as $starter_id => $starter_text)
                        <option
                        value='{{ $starter_id }}'
                        >{{ $starter_text }}</option>
                        @endforeach
                    </select>
                </div> <br>

                <div>
                    <input type='submit' value='Create new twine'>
                    &nbsp;
                    <INPUT class='button button-outline' TYPE="button" onClick="location.href='/'" VALUE="Cancel">
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('body')

    <script>
        var select = document.getElementById('starters_dropdown');
        var items = select.getElementsByTagName('option');
        var index= Math.floor(Math.random() * items.length);
        select.selectedIndex = index;
    </script>

@endsection
