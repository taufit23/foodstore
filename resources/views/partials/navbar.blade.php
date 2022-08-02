<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container">
        <a class="navbar-brand" href="/">Kuliner Kampar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="mr-auto navbar-nav"></ul>
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('datakategori') }}">Kategori</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('index.tentang') }}">Tentang</a>
                </li>
                @auth
                <li class="nav-item">
                    <a href="{{ (auth()->user()->role == 'admin' ? route('admin.dashboard') : route('toko.dashboard')) }}"
                        class="nav-link" target="_blank">Private Dashboard</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
