<!-- Navigacia -->

<nav class="navbar navbar-expand-lg sticky-top" id="navigation">
    <div class="container-xl">
        <a class="navbar-brand" href="index.php">BeDEV</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-md-center" id="navbarText">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="categories.php">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="instructors.php">Instructors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="courses.php">Courses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="shop.php">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php">Cart
                        <!-- Vypis poctu produktov, ktore sa aktualne nachadzaju v kosiku vedla Nazvu "Cart", ak v kosiku nie je nic, tak sa nic nevypise -->
                        <?php
                        echo (isset($_SESSION['shopping_cart']) && count($_SESSION['shopping_cart'])) > 0 ? count($_SESSION['shopping_cart']) : '';
                        ?>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>