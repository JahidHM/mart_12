@extends('front.layouts.master')
@section('main_content')
<!-- Hero Section -->
   @include('front.sections._hero')

    <!-- Features Section -->
    
@include('front.sections._features')
    <!-- Categories Section -->
    
@include('front.sections._categories')
    <!-- Featured Products Section -->
    
@include('front.sections._featured_products')
    <!-- Newsletter Section -->
@include('front.sections._newsletter')


@endsection