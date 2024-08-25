<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-primary navbar-dark" style="background-color: black; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">
    <!-- Left navbar links -->
    <ul class="navbar-nav" style="align-items: center;">
        <?php if (isset($_SESSION['login_id'])) : ?>
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="" role="button" style="padding-right: 20px; display: flex; align-items: center;">
                    <div class="menu-icon" style="background: #e0e0e0; width: 33px; height: 33px; border-radius: 50%; display: flex; justify-content: center; align-items: center; transition: background-color 0.3s ease;">
                        <i class="fas fa-bars" style="font-size: 18px; color: black;"></i>
                    </div>
                </a>
            </li>
        <?php endif; ?>
        <li class="nav-item" style="display: flex; align-items: center;">
            <a class="nav-link" href="./" role="button" style="display: flex; align-items: center;">
                <img src="AssetsH/Logo2.png" alt="Logo" style="max-height: 30px;">
            </a>
        </li>
    </ul>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var menuIcon = document.querySelector(".menu-icon");

            menuIcon.addEventListener("mouseover", function() {
                menuIcon.style.backgroundColor = "#ddd";
            });

            menuIcon.addEventListener("mouseout", function() {
                menuIcon.style.backgroundColor = "white";
            });
        });
    </script>


    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <?php if (isset($_SESSION['rs_id'])) : ?>
            <li class="nav-item">
                <a class="nav-link" href="ajax.php?action=logout">
                    <i class="fas fa-user"></i>
                    <?php
                    $name_parts = explode(' ', $_SESSION['rs_name']);
                    if (count($name_parts) > 1) {
                        $formatted_name = $name_parts[1] . ' ' . $name_parts[0];
                    } else {
                        $formatted_name = $_SESSION['rs_name'];
                    }
                    echo ucwords($formatted_name);
                    ?>
                    <i class="fa fa-sign-out-alt"></i>
                </a>
            </li>
        <?php endif; ?>
    </ul>
</nav>
<!-- /.navbar -->