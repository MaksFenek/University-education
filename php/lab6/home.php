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
    <form name="Test" method="POST" class="main-form">
        <div class="form-row">
            <label for="name">ФИО</label> <input type="text" name="fullname" required>
        </div>
        <div class="form-row">
            <label for="number">Номер группы</label> <input type="text" name="number" required>
        </div>
        <div class="form-row">
            <label for="about">Немного о себе</label>
            <textarea name="about"></textarea>
        </div>
        <div class="form-row">
            <label for="A">Значение А:</label>
            <input type="text" name="A" required>
        </div>
        <div class="form-row">
            <label for="B">Значение В:</label> 
            <input type="text" name="B" required>
        </div>
        <div class="form-row">
            <label for="C">Значение С:</label> 
            <input type="text" name="C" required>
        </div>
        <div class="form-row">
            <label for="method">Метод вычисления</label>
            <select name="method">
                <option>Найти минимум</option>
                <option>Площадь треугольника</option>
                <option>Периметр треугольника</option>
                <option>Среднее арифметическое</option>
                <option>Найти максимум</option>
                <option>Произведение чисел</option>
            </select>
        </div>
        <div class="form-row">
            <label for="answer">Ваш ответ:</label> <input type="text" name="answer">
        </div>
        <div class="form-row">
            <label for="email">Отправить результат на email?</label>
            <input type="checkbox" name="chekemail" id="send">
        </div>
        <div class="form-row form-email">
            <label for="email">Ваш email:</label> <input type="text" name="email">
        </div>
        <div class="form-row">
            <label>Отображение</label>
            <select name="view">
                <option value="print">Версия для печати</option>
                <option value="browser" selected>Версия для просмотра в браузере</option>
            </select> 
        </div>
        <div class="form-row">
            <button type="submit" class="form-btn">Проверить</button>
        </div>
    </form>
</main>
<footer></footer>
