<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Lemonada&display=swap" rel="stylesheet">
    <title>Вороков Артур Юрьевич. Группа 201-322 Лабораторная работа 3. Использование GET‐параметров в ссылках.
        Виртуальная клавиатура.</title>
</head>

<body>
    <header>
        <p>Logo</p>
    </header>


    <section class="main-section">
        <?php
        if (!isset($_GET['store']))
            $_GET['store'] = '';
        else
            if (isset($_GET['key']))
            $_GET['store'] .= $_GET['key'];
        echo '<div class="result">' . $_GET['store'] . '</div>';

        echo '<div class="buttons">';
        for ($i = 0; $i <= 9; $i++) {
            $store = $_GET['store'];
            echo "<a href='?key=$i&store=$store'>$i</a>";
        }
        echo '</div>'
        ?>

        <a class="reset" href="index.php">СБРОС</a>

    </section>
    <footer>
        <p>Copyright © 2021 All Rights Reserved</p>
    </footer>
</body>

</html>