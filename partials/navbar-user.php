<nav class="navbar navbar-expand-lg bg-navigation-primary">
    <div class="container-fluid px-5">
        <a class="navbar-brand ms-3" href="../user/">
            <img src="../assets/HerbaPluss.svg" alt="" width="200" height="50">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-center d-none d-sm-block" id="navbarSupportedContent">
            <form class="d-flex w-50" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
        <a href="../user/keranjang.php" class="text-white navbar-hover me-2">
            <i class="fa-solid fa-cart-shopping fa-xl "></i>
        </a>
        <a href="../user/profil.php" class="text-white navbar-hover">
            
        </a>
        <div class="dropdown-center">
            <a class="text-white"  data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-user-circle fa-2xl mx-3"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="../user/profil.php">Akun Saya</a></li>
                <li><a class="dropdown-item" href="../user/">Pesanan Saya</a></li>
                <li><a class="dropdown-item" href="../config/auth-logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>