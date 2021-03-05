<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Lemonada&display=swap" rel="stylesheet">
    <title>Вороков Артур Юрьевич. Лабораторная работа 1 Конвертация статического контента в динамический</title>
</head>

<body>
    <header>
        <nav>
            <a href="<?php
                        $ref = 'index.php';
                        $text = 'Home';
                        $current_page = true;
                        echo $ref;
                        ?>" class="menu_item <?php
                                                if ($current_page)
                                                    echo 'active';
                                                ?>"><?php echo $text ?></a>

            <a href="about.php" class="menu_item">About</a>
            <a href="contact.php" class="menu_item">Contact</a>
        </nav>
    </header>
    <section class="introduce">
        <div class="wrapper">
            <h1 class="main_title">We make your future waste-free!</h1>
            <div class="flex_wrapper">
                <h2 class="sub_title">Scroll bellow</h2>
                <svg class="arrow" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 48 48">
                    <path d="M6 8l18 32L42 8H6zm6.75 4h22.5L24 32 12.75 12z" fill='white' />
                </svg>
            </div>
        </div>
    </section>
    <section class="services_wrapper">
        <h2>What we can do?</h2>
        <div class="services">
            <div class="services__card">
                <?php
                echo '<img src="./img/img' . (date('s') % 2) . '.jpg" alt="Меняющаяся фотография">';
                ?>
                <p class="service_title">We take out the garbage around the clock</p>
                <p>You can order a bunker truck at any convenient time of the day or night.</p>
            </div>
            <div class="services__card">
                <?php
                echo '<img src="./img/img' . (date('s') % 2) . '.jpg" alt="Меняющаяся фотография">';
                ?>
                <p class="service_title">Professional movers</p>
                <p>We have only professional movers. You will always get quality help.</p>
            </div>
            <div class="services__card">
                <?php
                echo '<img src="./img/img' . (date('s') % 2) . '.jpg" alt="Меняющаяся фотография">';
                ?>
                <p class="service_title">All your garbage will be recycled</p>
                <p>Your garbage will be recycled into something new with a 100% probability</p>
            </div>
        </div>
    </section>
    <section class="prices">
        <table>
            <tr>
                <td>Order price</td>
                <td>Price per hour</td>
                <td>Price for recycling</td>
            </tr>
            <tr>
                <td>20$</td>
                <td>10$</td>
                <td>100$</td>
            </tr>
        </table>
    </section>
    <footer>
        <p>Copyright © 2020 All Rights Reserved</p>
    </footer>
</body>

</html>