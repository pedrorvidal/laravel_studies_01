@extends('layouts.main_layout')
@section('content')

<p class="display-6 text-secondary text-center py-5">CONTENT</p>

@if(!empty($myName))
    <p>{{ $myName }}</p>
@endif

@endsection
