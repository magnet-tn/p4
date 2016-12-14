@extends('layouts.master')

@section('title', 'Show twines')

@section ('content')
    <div class="content">
        <hr/>
        @foreach($twines as $twine)
            {{ $twine -> title }} / created on {{ substr(($twine -> created_at),0,10)  }}<br/><br/>
        @endforeach
    </div>
@endsection
