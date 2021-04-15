<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Лабораторная работа 5. Динамическое формирование контента и меню. Таблица умножения</title>
</head>
<body>
    <header>
        <img src="./img/Mospolytech_logo.jpg" alt="Mospolytech">
        <?php
            if(isset($_GET['num'])) {
                $num = $_GET['num'];
                if(isset($_GET['type'])) {
                    $type = $_GET['type'];
                    if ( $type === 'div') {
                        echo "<a href='?num=$num&type=table' class ='menu_item'>Табличная верстка</a>";
                        echo "<a href='?num=$num&type=div' class ='menu_item menu_active'>Блочная верстка</a>";
                    }
                    elseif ($type === 'table') {
                        echo "<a href='?num=$num&type=table' class ='menu_item menu_active'>Табличная верстка</a>";
                        echo "<a href='?num=$num&type=div' class ='menu_item'>Блочная верстка</a>";
                    }
                }
                else {
                    echo "<a href='?num=$num&type=table' class ='menu_item'>Табличная верстка</a>";
                    echo "<a href='?num=$num&type=div' class ='menu_item'>Блочная верстка</a>";

                }
            }
            else {

                if(isset($_GET['type'])) {
                    $type = $_GET['type'];
                    if($type === 'div') {
                        echo "<a href='?type=table' class ='menu_item'>Табличная верстка</a>";
                        echo "<a href='?type=div' class ='menu_item menu_active'>Блочная верстка</a>";
                    }
                    elseif ($type === 'table') {
                        echo "<a href='?type=table' class ='menu_item menu_active'>Табличная верстка</a>";
                        echo "<a href='?type=div' class ='menu_item'>Блочная верстка</a>";
                    }
                }
                else  {
                    echo "<a href='?type=table' class ='menu_item'>Табличная верстка</a>";
                    echo "<a href='?type=div' class ='menu_item'>Блочная верстка</a>";
                }


            }
        ?>
    </header>
    <main>
        <!-- левая часть страницы -->

        <div class="div_column">

                <?php

                if(isset($_GET['type'])) {
                    $type = $_GET['type'];
                    if(isset($_GET['num'])) {
                        echo "<a href='index.php?type=$type'class='main-menu a'>Вся таблица умножения</a>";
                    }
                    else {
                        echo "<a href='index.php?type=$type'class='main-menu a selected'>Вся таблица умножения</a>";
                    }

                }
                else {
                    if(isset($_GET['num'])) {
                        echo "<a href='index.php?'class='main-menu a'>Вся таблица умножения</a>";
                    }
                    else {
                        echo "<a href='index.php?'class='main-menu a selected'>Вся таблица умножения</a>";
                    }
                }

                    for ($i=2; $i<10;$i++){
                        if(isset($_GET['type'])) {
                            $type = $_GET['type'];
                            if(isset($_GET['num']) && $_GET['num'] == $i) {
                                echo "<a href='?num=$i&type=$type' class='main-menu a selected'>Таблица умножения на ".$i.'</a>';
                            }
                            else {
                                echo "<a href='?num=$i&type=$type' class='main-menu a'>Таблица умножения на ".$i.'</a>';
                            }

                        }
                        else {
                            if(isset($_GET['num'])) {
                                if ($_GET['num'] == $i) {
                                    echo "<a href='?num=$i' class='main-menu a selected'>Таблица умножения на ".$i.'</a>';
                                }
                                else {
                                    echo "<a href='?num=$i' class='main-menu a'>Таблица умножения на ".$i.'</a>';
                                }

                            }
                            else {
                                echo "<a href='?num=$i' class='main-menu a'>Таблица умножения на ".$i.'</a>';
                            }

                        }
                    }
                ?>
        </div>
        <!-- основная часть страницы -->
        <div class= "div_result">
            <?php
            if(isset($_GET['num']) && isset($_GET['type'])) {
                    if( $_GET['type'] === 'div') {
                        doDiv($_GET['num']);
                    }
                    elseif ( $_GET['type'] === 'table') {
                        doTable($_GET['num']);
                    }
                    else {
                        doDiv($_GET['num']);
                    }
            }
            elseif (isset($_GET['type'])) {
                for ($i = 2; $i <= 10; $i++) {
                    $type = $_GET['type'];
                    if ($_GET['type'] === 'div') {
                        doDiv($i);
                    } elseif ($_GET['type'] === 'table') {
                        doTable($i);
                    }
                }
            }
            elseif (isset($_GET['num'])) {
                    doDiv($_GET['num']);
            }
            else {
                for ($i = 2; $i <= 10; $i++) {
                    doDiv($i);
                }
            }
            ?>
        </div>
        
     <?php
     //Функция для формирования таблиц 
        function doTable ($num){
                $result = '<table>';
                for ($i=2; $i < 10; $i++) {
                    if(isset($_GET['type'])) {
                        $type = $_GET['type'];
                        $result .= "<tr>"."<td> <a class='num_a' href='index.php?num=$num&type=$type'>$num</a>". ' * ' ."<a class='num_a' href='index.php?num=$i&type=$type'>$i</a> </td>". '<td>'.$num*$i .'</td>'. '</tr>';
                    }
                    else {
                        $result .= "<tr>"."<td> <a class='num_a' href='index.php?num=$num'>$num</a>". ' * ' ."<a class='num_a' href='index.php?num=$i'>$i</a> </td>". '<td>'.$num*$i .'</td>'. '</tr>';
                    }
                }
                echo $result . '</table>';

        }
       //Функция для формирования блоков
        function doDiv ($num){
                $result = '<div>';
                for ($i=2; $i < 10; $i++) {
                    if(isset($_GET['type'])) {
                        $type = $_GET['type'];
                        $result .= "<p>"."<a class='num_a' href='index.php?num=$num&type=$type'>$num</a>". ' * ' ."<a class='num_a' href='index.php?num=$i&type=$type'>$i</a>". ' = '.$num*$i . '</p>';
                    }
                    else {
                        $result .= "<p>"."<a class='num_a' href='index.php?num=$num'>$num</a>". ' * ' ."<a class='num_a' href='index.php?num=$i'>$i</a>". ' = '.$num*$i . '</p>';
                    }
                }
                echo $result . '</div>';
        }

    ?>   
           
    </main>
    <footer>
        <p><?php
            if(isset($_GET['type'])) {
                $type = $_GET['type'];
                if($type === 'div') {
                    echo 'Выбрана блочная верстка.&nbsp';
                }
                elseif ($type === 'table') {
                    echo 'Выбрана табличная верстка.&nbsp';
                }
            }
            else {
                echo 'Верстка не выбрана.&nbsp';
            }

            if(isset($_GET['num'])) {
                $num = $_GET['num'];
                echo "Таблица умножения на $num.&nbsp";
            }
            else {
                echo 'Вся таблица умножения.&nbsp';
            }

            date_default_timezone_set("Europe/Moscow");
            echo date('Дата: d.m.y Время: H:i');?>

        </p>
    </footer>
</body>
</html>