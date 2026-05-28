<div class="row">
  <div class="col-12">
    <?php $hal = $_REQUEST['hal'] ?? 'home'; ?>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand " href="#">HELLO IM RAII</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav justify-content-center w-100">
            <a class="nav-link <?= $hal === 'home' ? 'active' : '' ?>" aria-current="page" href="index.php?hal=home">HOME</a>
            <a class="nav-link <?= $hal === 'aboutme' ? 'active' : '' ?>" href="index.php?hal=aboutme">ABOUT ME</a>
            <a class="nav-link <?= $hal === 'kontak' ? 'active' : '' ?>" href="index.php?hal=kontak">CONTACT ME</a>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle <?= in_array($hal, ['mystudies','level']) ? 'active' : '' ?>" href="index.php?hal=mystudies" id="navbarDropdown" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                MY STUDIES
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="index.php?hal=level">Level</a></li>
                <li><a class="dropdown-item" href="index.php?hal=mystudies">Studies</a></li>
              </ul>
            </li>
          </div>
          <?php if (!empty($_SESSION['username'])): ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle"></i> <?= htmlspecialchars($_SESSION['username']) ?>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <li><span class="dropdown-item-text">Role: <strong><?= htmlspecialchars($_SESSION['role'] ?? 'User') ?></strong></span></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
              </ul>
            </li>
          <?php else: ?>
            <a class="btn btn-outline-success ms-auto" href="index.php?hal=login">Login</a>
          <?php endif; ?>
        </div>
      </div>
    </nav>
  </div>
</div>