<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="./index.html">RentCar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="/">Home</a>
                </li>
                <li class="nav-item">
                    @guest('customer')
                        <a class="nav-link" href="{{ route('login-page') }}">Login</a>
                    @endguest

                    @auth('customer')
                        <a class="nav-link" href="{{ route('customer-dashboard') }}">Dashboard</a>
                    @endauth
                </li>
            </ul>
        </div>
    </div>
</nav>
