@extends('layouts.master')

@section('title', 'Show twines')

@section ('content')
    <div class="content">
        <hr/>
        @foreach($twines as $twine)
        <a href='/twines/{{ $twine->id }}/edit'> {{ $twine -> title }}  <i class='fa fa-pencil'></i></a>
             <br/>
            <span class="info">
                created on {{ substr(($twine -> created_at),0,10)  }}
            </span><br/><br/>
        @endforeach
    </div>
@endsection
