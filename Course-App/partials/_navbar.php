<nav class="navbar navbar-expand-lg bg-primary navbar-dark">
    <div class="container">
        <a href="app.php" class="navbar-brand">Yazılım Öğreniyorum</a>
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a href="app.php" class="nav-link active">Anasayfa</a>
            </li>
            <?php if(isAdmin()) : ?>
                <li class="nav-item">
                    <a href="admin-categories.php" class="nav-link">Yönetici Kategorileri</a>
                </li>
                <li class="nav-item">
                    <a href="admin-courses.php" class="nav-link">Yönetici Kursları</a>
                </li>
            <?php endif; ?>
        </ul>
        <ul class="navbar-nav me-2">
            <?php if(isLoggedIn()) : ?>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link">Çıkış Yap</a>
                </li>
                <li class="nav-item">
                    <a href="login.php" class="nav-link">Hoş geldin, <?php echo $_SESSION["username"]; ?></a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a href="login.php" class="nav-link">Giriş Yap</a>
                </li>
                <li class="nav-item">
                    <a href="register.php" class="nav-link">Kaydol</a>
                </li>
            <?php endif; ?>
        </ul>
        <form action="courses.php" class="d-flex">
            <input type="text" name="q" class="form-control me-2" placeholder="Ara">
            <button type="submit" class="btn btn-success">Ara</button>
        </form>
    </div>
</nav>