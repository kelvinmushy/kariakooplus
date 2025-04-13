@extends('layouts.frontend.app')

@section('title', 'Create Electronic Device Ad')
@section('top')


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