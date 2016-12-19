@extends('layouts.master')

@section('delete twine')
Confirm delete: {{ $twine->title }}
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h4>Confirm deletion</h4>

            <form method='POST' action='/twines/{{ $twine->id }}'>

                {{ method_field('DELETE') }}

                {{ csrf_field() }}

                <h3>Are you sure you want to delete this twine? </h3>
                <em>{{ $twine->title }}</em> and all of its content strands will be discarded too.<p>
                    <br/>

                    <input type='submit' value='Delete Entire Twine'>
                    &nbsp;
                    <INPUT class='button button-outline' TYPE="button" onClick="history.go(-1)" VALUE="Cancel">



                    </form>
                </div>
            </div>
        </div>

        @endsection

        @section('body')


        @endsection
