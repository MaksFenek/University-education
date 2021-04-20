<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Использование форм. Тест математических знаний</title>
</head>
<header>
    <img src = "img\Mospolytech_logo.jpg">
    </header>
<main>
    <?php
    $result = null;

    if( isset( $_POST['A'] ) ) // если из формы были переданы данные
    {
        if( $_POST['method'] == 'average' ) // если вычисляется среднее арифметическое
        {
            $result = round( ($_POST['A']+$_POST['B']+$_POST['C'])/3, 2 );
        }
        else if( $_POST['method'] == 'perimeter' ) // если вычисляется периметр
            {
                $result = $_POST['A']+$_POST['B']+$_POST['C'];
            }
        else if( $_POST['method'] == 'area') {
            $s = ($_POST['A']+$_POST['B']+$_POST['C']) / 2;
            $result = sqrt($s * ($s - $_POST['A']) * ($s - $_POST['B']) * ($s - $_POST['C']));
        }
        else if ($_POST['method'] == 'multiply') {
            $result = $_POST['A']*$_POST['B']*$_POST['C'];
        }
        else if ($_POST['method'] == 'min') {
            $result = min($_POST['A'],$_POST['B'],$_POST['C']);
        }
        else if ($_POST['method'] == 'max') {
            $result = max($_POST['A'],$_POST['B'],$_POST['C']);
        }
    }

    if( isset( $result ) )// если форма была обработана
    {
        $out_text='ФИО: '.$_POST['fullname'].'<br>'; // подготавливаем содержимое отчета
        $out_text.='Группа: '.$_POST['number'].'<br>';
        if($_POST['about'] ) $out_text.='<br>'.$_POST['about'].'<br>';
        $out_text.='Решаемая задача: ';
        if( $_POST['method'] == 'average' ) $out_text.='СРЕДНЕЕ АРИФМЕТИЧЕСКОЕ';
        else if( $_POST['method'] == 'perimeter' ) $out_text.='ПЕРИМЕТР ТРЕУГОЛЬНИКА';
            else if( $_POST['method'] == 'min' ) $out_text.='МИНИМАЛЬНОЕ ЗНАЧЕНИЕ';
        else if( $_POST['method'] == 'max' ) $out_text.='МАКСИМАЛЬНОЕ ЗНАЧЕНИЕ';
        else if( $_POST['method'] == 'multiply' ) $out_text.='ПРОИЗВЕДЕНИЕ ЧИСЕЛ';
        else if( $_POST['method'] == 'area' ) $out_text.='ПЛОЗАДЬ ТРЕУГОЛЬНИКА';
        if($result === $_POST['answer']) $out_text.='<br><b>ТЕСТ ПРОЕДЕН</b><br>'; else
            $out_text.='<br><b>ОШИБКА: ТЕСТ НЕ ПРОЙДЕН!</b><br>';
        echo $out_text; // выводим отчет в браузер
        if( array_key_exists('send_mail', $_POST) ) // если нужно отправить результаты
        {
            // отправляем результаты по почте простым письмом
            mail( $_POST['mail'], 'Результат тестирования',
                str_replace('<br>', "\r\n", $out_text),
                "From: auto@mami.ru\n"."Content-Type: text/plain; charset=utf-8\n" );
            // выводим соответствующее сообщение в браузер
            echo 'Результаты теста были автоматически отправлены на e-mail '.$_POST['email'];
        }
        echo '<a href="?F='.$_POST['fullname'].'&G='.$_POST['number'].
            '" id="back_button">Повторить тест</a>';
    }
    else // если форма не обработана (данные не переданы в РНР)
    {
        $fullname = $_GET['F'];
        $group = $_GET['G'];
        echo "<form name='Test' method='POST' class='main-form'>
        <div class='form-row'>
            <label for='name'>ФИО</label> <input type='text' name='fullname' value='$fullname' required>
        </div>
        <div class='form-row'>
            <label for='number'>Номер группы</label> <input type='text' name='number' value='$group' required>
        </div>
        <div class='form-row'>
            <label for='about'>Немного о себе</label>
            <textarea name='about'></textarea>
        </div>
        <div class='form-row'>
            <label for='A'>Значение А:</label>
            <input type='text' name='A' required>
        </div>
        <div class='form-row'>
            <label for='B'>Значение В:</label> 
            <input type='text' name='B' required>
        </div>
        <div class='form-row'>
            <label for='C'>Значение С:</label> 
            <input type='text' name='C' required>
        </div>
        <div class='form-row'>
            <label for='method'>Метод вычисления</label>
            <select name='method'>
                <option value='min'>Найти минимум</option>
                <option value='area'>Площадь треугольника</option>
                <option value='perimeter'>Периметр треугольника</option>
                <option value='average'>Среднее арифметическое</option>
                <option value='max'>Найти максимум</option>
                <option value='multiply'>Произведение чисел</option>
            </select>
        </div>
        <div class='form-row'>
            <label for='answer'>Ваш ответ:</label> <input type='text' name='answer'>
        </div>
        <div class='form-row'>
            <label for='email'>Отправить результат на email?</label>
            <input type='checkbox' name='chekemail' id='send'>
        </div>
        <div class='form-row form-email'>
            <label for='email'>Ваш email:</label> <input type='text' name='email'>
        </div>
        <div class='form-row'>
            <label>Отображение</label>
            <select name='view'>
                <option value='print'>Версия для печати</option>
                <option value='browser' selected>Версия для просмотра в браузере</option>
            </select> 
        </div>
        <div class='form-row'>
            <button type='submit' class='form-btn'>Проверить</button>
        </div>
    </form>";
    }
    ?>

</main>
<footer></footer>
<script>
    /** @type {HTMLInputElement} */
    const input = document.querySelector('.form-email')
    /** @param {HTMLInputElement} e */
    document.getElementById('send')?.addEventListener('change',(e)=> {
        if(e.target.checked) {
            input.classList.remove('form-email')
        }
        else {
            input.classList.add('form-email')
        }
    })
</script>