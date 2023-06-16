<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgb(80, 192, 149)">
    <div class="container px-3 py-2">
        <a class="navbar-brand text-info-emphasis" href="#">KOPRAL BABI</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <a class="nav-link fs-5 text-info-emphasis" href="{{ route('dashboard') }}"><i class="bi bi-speedometer2"></i> Dashboard</a>
                <a class="nav-link fs-5 text-info-emphasis" href="{{ route('data.index') }}"><i class="bi bi-book"></i> Data</a>
                <a class="nav-link fs-5 text-info-emphasis" href="{{ route('kmeans.index') }}"><i class="bi bi-clipboard-data"></i> Kmeans</a>
                <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="nav-link fs-5 text-info-emphasis"><i class="bi bi-door-open"></i> Logout</button>
                </form>
            </div>
        </div>
    </div>
</nav>