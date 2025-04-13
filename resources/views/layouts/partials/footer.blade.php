<footer class="bg-dark text-light pt-5 pb-4 mt-5">
    <div class="container text-md-left">
        <div class="row text-md-left">

            <!-- About -->
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold text-warning">KariakooStore</h5>
                <p>
                    Shop the best deals on electronics, accessories, computers, radios, and bags. Fast delivery and secure shopping experience right from the heart of Kariakoo.
                </p>
            </div>

            <!-- Links -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Quick Links</h5>
                <p><a href="{{ url('/') }}" class="text-light text-decoration-none">Home</a></p>
                <p><a href="{{ url('/') }}" class="text-light text-decoration-none">Shop</a></p>
                <p><a href="{{ url('/about') }}" class="text-light text-decoration-none">About Us</a></p>
                {{-- <p><a href="{{ url('/contact') }}" class="text-light text-decoration-none">Contact</a></p> --}}
            </div>

            <!-- Contact -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Contact</h5>
                <p><i class="bi bi-house-door-fill me-2"></i> Dar es Salaam, Tanzania</p>
                <p><i class="bi bi-envelope-fill me-2"></i> support@kariakoostore.co.tz</p>
                <p><i class="bi bi-phone-fill me-2"></i> +255 744 091 391</p>
                <p><i class="bi bi-whatsapp me-2"></i> +255 255 744 091 391</p>
            </div>

            <!-- Social -->
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mt-3 text-center">
                <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Follow Us</h5>
                <a class="btn btn-outline-light btn-floating m-1" href="#"><i class="bi bi-facebook"></i></a>
                <a class="btn btn-outline-light btn-floating m-1" href="#"><i class="bi bi-twitter"></i></a>
                <a class="btn btn-outline-light btn-floating m-1" href="#"><i class="bi bi-instagram"></i></a>
                <a class="btn btn-outline-light btn-floating m-1" href="#"><i class="bi bi-youtube"></i></a>
            </div>
        </div>

        <hr class="my-3">

        <div class="row align-items-center">
            <div class="col-md-12 text-center">
                <p class="mb-0">&copy; {{ date('Y') }} KariakooStore. All rights reserved.</p>
                <small>Related brands: <strong>kariakoomall</strong>, <strong>mykariakoo</strong></small>
            </div>
        </div>
    </div>
</footer>
