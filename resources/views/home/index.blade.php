@extends('layouts.frontend.app')

@section('title', 'KariakooStore - Buy Electronics, Accessories, Radios & More')
@section('meta_description', 'Shop quality electronics, computers, accessories, radios, and bags at KariakooStore. Discover top deals online.')
@section('meta_keywords', 'kariakoomall, mykariakoo, electronics, computers, accessories, radios, bags, online shopping, tanzania store')

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
