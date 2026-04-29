<nav class="navbar navbar-expand-lg navbar-dark bg-pink shadow-sm">
  <div class="container">

    <a class="navbar-brand fw-bold" href="index.php">
      🛍️ Ribinkkoch'store
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">

      <!-- MENU -->
      <ul class="navbar-nav me-auto">

        <li class="nav-item">
          <a class="nav-link active text-white" href="index.php">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white" href="produk.php">Produk</a>
        </li>

      </ul>

      <!-- SEARCH -->
      <form class="d-flex mx-3" method="GET" action="produk.php">
        <input class="form-control rounded-pill me-2" type="search" name="cari" placeholder="Cari produk...">
        <button class="btn btn-light rounded-pill">Cari</button>
      </form>

      <!-- KANAN -->
      <!-- <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white" href="cart.php">🛒 Keranjang</a>
        </li>
      </ul> -->

    </div>
  </div>
</nav>