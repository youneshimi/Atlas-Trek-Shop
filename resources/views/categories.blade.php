@extends('layouts.app')

@section('main')
    @include('parts.backmenu')
    @include('parts.crudCategories')
    {{ $categories->links() }}
@endsection
