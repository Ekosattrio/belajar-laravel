<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a href="#" class="navbar-brand">Dashboard</a>
        <a href="{{ route('products.form') }}" class="nav-link text-white">Products</a>
        <form method="POST" action="{{ route('logout') }}" class="d-inline">
            @csrf
            <button class="btn btn-danger btn-sm">Logout</button>
        </form>
    </div>
</nav>
