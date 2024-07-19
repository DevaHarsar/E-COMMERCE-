<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<style>
    .navbar-nav .nav-link {
        color: white;
    }

    .navbar-nav .nav-link:hover {
        color: #ccc;
    }

    .navbar-nav .nav-item.active .nav-link {
        color: #fff;
        font-weight: bold;
        background-color: rgba(255, 255, 255, 0.1);
    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Farm_MART</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item <?= ($current_page == 'index.php') ? 'active' : '' ?>">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item <?= ($current_page == 'categories.php') ? 'active' : '' ?>">
                <a class="nav-link" href="categories.php">Collections</a>
            </li>
            <li class="nav-item <?= ($current_page == 'cart.php') ? 'active' : '' ?>">
                <a class="nav-link" href="cart.php">Cart</a>
            </li>
            <!-- <li class="nav-item <?= ($current_page == 'order_details.php') ? 'active' : '' ?>">
                <a class="nav-link" href="order_details.php">Order_details</a>
            </li> -->
            <?php if (isset($_SESSION['auth_user']) && isset($_SESSION['auth_user']['last_order_id'])): ?>
              <li class="nav-item <?= ($current_page == 'order_page.php') ? 'active' : '' ?>">
           <a class="nav-link" href="order_page.php?order_id=<?= $_SESSION['auth_user']['last_order_id']; ?>">
            View Order
           </a>
           </li>


           <?php endif; ?>
            <?php if (isset($_SESSION['auth'])): ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <?= $_SESSION['auth_user']['name']; ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="logout.php">LOGOUT</a>
                </div>
            </li>
            <?php else: ?>
            <li class="nav-item">
                <a class="nav-link" href="register.php">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
            </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var navLinks = document.querySelectorAll('.navbar-nav .nav-link');

        navLinks.forEach(function (link) {
            link.addEventListener('click', function () {
                navLinks.forEach(function (item) {
                    item.parentElement.classList.remove('active');
                });
                link.parentElement.classList.add('active');
            });
        });
    });
</script>
