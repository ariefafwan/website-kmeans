<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgb(76, 76, 175)">
    <div class="container px-3 py-2">
        <a class="navbar-brand text-light" href="#">GIS & K-Means Budidaya Bandeng</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <a class="nav-link fs-5 text-light" href="{{ route('dashboard') }}"><i class="bi bi-speedometer2"></i> Dashboard</a>
                <a class="nav-link fs-5 text-light" href="{{ route('desa.index') }}"><i class="bi bi-houses-fill"></i></i> Desa</a>
                <a class="nav-link fs-5 text-light" href="{{ route('data.index') }}"><i class="bi bi-book"></i> Data</a>
                <a class="nav-link fs-5 text-light" href="{{ route('kmeans.index') }}"><i class="bi bi-clipboard-data"></i> Kmeans</a>
                <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="nav-link fs-5 text-light"><i class="bi bi-door-open"></i> Logout</button>
                </form>
            </div>
        </div>
    </div>
</nav>