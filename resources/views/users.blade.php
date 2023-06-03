@extends('layouts.app')

@section('main')
    @include('parts.backmenu')
    @include('parts.crudUsers')
    {{ $users->links() }}
@endsection
