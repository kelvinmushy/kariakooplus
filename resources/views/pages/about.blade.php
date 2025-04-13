@extends('layouts.frontend.app')

@section('title', 'About Us - KariakooStore')
@section('meta_description', 'Learn more about KariakooStore - your trusted online electronics and accessories shop in Tanzania.')
@section('meta_keywords', 'about kariakoomall, mykariakoo, kariakoo store, electronics tanzania, online shopping')

@section('top')
<style>
    .about-section {
        background-color: #f8f9fa;
        padding: 60px 0;
    }
    .about-title {
        color: #28a745;
        font-weight: bold;
    }
</style>
@endsection

@section('content')

 

    <section class="about-section">
        <div class="container">
            <div class="row align-items-center mb-5">
                <div class="col-md-6">
                    <img src="{{ asset('images/about-kariakoostore.jpg') }}" class="img-fluid rounded shadow" alt="About KariakooStore">
                </div>
                <div class="col-md-6">
                    <h2 class="about-title mb-4">Welcome to KariakooStore</h2>
                    <p>
                        At KariakooStore, we’re on a mission to bring the vibrant Kariakoo market experience to your fingertips.
                        From quality electronics to the latest computer accessories, radios, bags, and more — we connect you to trusted vendors in Dar es Salaam and beyond.
                    </p>
                    <p>
                        With a user-friendly platform and secure payment options, KariakooStore is your one-stop solution for buying and selling products online in Tanzania.
                    </p>
                </div>
            </div>

            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <i class="bi bi-truck display-4 text-success"></i>
                    <h5 class="mt-3">Fast Delivery</h5>
                    <p>We ensure quick and safe delivery of your products across Tanzania.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <i class="bi bi-shield-check display-4 text-success"></i>
                    <h5 class="mt-3">Trusted Sellers</h5>
                    <p>All vendors are verified for your safety and satisfaction.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <i class="bi bi-chat-square-heart display-4 text-success"></i>
                    <h5 class="mt-3">Customer Support</h5>
                    <p>We’re here to help you 7 days a week for any issues or questions.</p>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('bot')
@endsection
