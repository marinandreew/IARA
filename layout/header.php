<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ИАРА</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/hamburgerMenu.css">
    <link rel="stylesheet" type="text/css" href="../css/preLoader.css">
    <link rel="stylesheet" type="text/css" href="../css/up_btn.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../images/iara-logo.png">
</head>
<body>
<section>
    <div class="preload">
        <img src="../images/ship.png" alt="ship" style='width: auto; height: 280px;'>
        <div class="wave wave1"></div>
        <div class="wave wave2"></div>
        <div class="wave wave3"></div>
        <div class="wave wave4"></div>
    </div>
</section>
    <header>
        <div class="container">
            <div>
                <ul>
                    <li><a href='./index.php'><img src="../images/iara-logo.png" alt="logo" style='width: auto; height: 60px;'></a></li>
                </ul>
                <div class="nav-toggle" id="navToggle">
                    <button class="menu" onclick="this.classList.toggle('opened');this.setAttribute('aria-expanded', this.classList.contains('opened'))" aria-label="Main Menu">
                        <svg width="50" height="50" viewBox="0 0 100 100">
                            <path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
                            <path class="line line2" d="M 20,50 H 80" />
                            <path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
                        </svg>
                    </button>
                </div>
            </div>
            <nav>
                <div class="nav-links">
                    <ul>
                        <li><a href="../pages/index.php">Начало</a></li>
                        <li><a href="../pages/registers.php">Регистри</a></li>
                        <li><a href="../pages/tickets.php">Билети</a></li>
                        <li><a href="../pages/inspections.php">Инспекции</a></li>
                        <li><a href="../pages/login.php">Влез</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <script src="../js/preload.js"></script>
    <script src="../js/up_btn.js"></script>
    <script src="../js/main.js"></script>
</body>
<?php ?>
