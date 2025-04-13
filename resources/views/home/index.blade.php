@extends('layouts.frontend.app')

@section('title', 'Create Electronic Device Ad')
@section('top')
    <style>
        .card:hover {
            transform: scale(1.02);
            transition: transform 0.3s ease-in-out;
        }
    </style>

@endsection
@section('content')

    <div class="container">

        <livewire:product-filter />

        @livewireStyles


    </div>

@endsection

@section('bot')
    @livewireScripts
@endsection