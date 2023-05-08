<nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
    <a href="" class="text-decoration-none d-block d-lg-none">
        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
    </a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
        <div class="navbar-nav mr-auto py-0">
            <a href="{{ route('site.index') }}" class="nav-item nav-link">Home</a>
            <a href="{{ route('site.shop') }}" class="nav-item nav-link">Shop</a>
            <a href="{{ route('site.store') }}" class="nav-item nav-link">Store</a>
        </div>
        <div class="navbar-nav ml-auto py-0">
            <a href="{{ route('login') }}" class="nav-item nav-link" target="_blank">Login</a>
            <a href="{{ route('register') }}" class="nav-item nav-link" target="_blank">Register</a>
        </div>
    </div>
</nav>
