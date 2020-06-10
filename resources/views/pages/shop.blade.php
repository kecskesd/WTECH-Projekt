@extends('layouts.app')

@section('title', 'Shop')

@section('content')

    @include('includes.filter')
    @include('includes.products')
    {{$products->links()}}

@endsection
