@extends('layouts.app')

@section('main')
    @auth
        @include('parts.backmenu')
    @endauth

    @include('parts.profile')
@endsection
