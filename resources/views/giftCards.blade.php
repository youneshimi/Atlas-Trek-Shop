@extends('layouts.app')

@section('main')
    @include('parts.backmenu')
    @include('parts.crudCards')
    {{ $cards->links() }}
@endsection
