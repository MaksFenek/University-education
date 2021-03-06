<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Lemonada&display=swap" rel="stylesheet">
    <title>Вороков Артур Юрьевич. Группа 201-322 Лабораторная работа 2. Вариант 4. Циклические алгоритмы. Условия в алгоритмах. Табулирование функций.</title>
</head>

<body>
    <header>
        <p>Logo</p>
    </header>
    <section class="introduce">
        <div class="wrapper">
            <h1 class="main_title">Лабораторная работа 2. Вариант 4</h1>
        </div>
    </section>
    <section class="main">
        <?php
        $x = -10;
        $encounting = 500;
        $step = 2;
        $type = 'C';
        $max = 100;
        $min = -5;
        if ($type == 'B')
            echo '<ul>';
        elseif ($type == 'C')
            echo '<ol>';
        elseif ($type == 'D')
            echo '<table>';
        elseif ($type == 'E')
            echo '<div>';

        for ($i = 0; $i < $encounting; $i++, $x += $step) {

            if ($x <= 10)
                $f = (5 - $x) / (1 - $x / 5);
            elseif ($x > 10 and $x < 20)
                $f = pow($x, 2) / 4 + 7;
            elseif ($x >= 20)
                $f = 2 * $x - 21;

            if ($f >= $max || $f < $min) break;

            if ($type == 'A') {
                echo "f($x) = $f";
                if ($i < $encounting - 1)
                    echo '<br>';
            } elseif ($type == 'B' or $type == 'C') {

                echo "<li> f($x) = $f</li>";
            } elseif ($type == 'D') {
                echo "<td> f($x) = $f</td>";
            } elseif ($type == 'E') {
                echo "<div> f($x) = $f</div>";
            }
        }
        if ($type == 'B')
            echo '</ul>';
        elseif ($type == 'C')
            echo '</ol>';
        elseif ($type == 'D') {
            echo "</table>";
        } elseif ($type == 'E') {
            echo "</div>";
        }
        ?>
    </section>
    <footer>
        <p>Copyright © 2021 All Rights Reserved</p>
    </footer>
</body>

</html>