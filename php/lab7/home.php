<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
<main>
    <form name="Test" method="POST" class="main-form" action="sort.php" target="_blank">
        <div>
            <h3>Таблица элементов</h3>
            <table id="elements">
                <tr>
                    <td><label>№1</label></td>
                    <td class="element-row"><input type="text" name="element0"></td>
                </tr>
            </table>
            <input type="hidden" name="arrLength" id="arrLength" value="1">
        </div>
        <div style="text-align: right;">
            <button type="button" name="add" class="form-btn" onclick="addElement('elements');">Добавить еще один элемент</button>
        </div>

        <div>
            <h3>Cпособ сортировки</h3>
            <select name="opt">
                <option>Сортировка выбором</option>
                <option>Пузырьковый алгоритм</option>
                <option>Алгоритм Шелла</option>
                <option>Алгоритм садового гнома</option>
                <option>Быстрая сортировка</option>
                <option>Встроенная функция PHP для сортировки списков по значению</option>
            </select>
        </div>
        <div class="btn-sort">
            <button type="submit"  name="sort" id="idsort" class="form-btn">Сортировать массив</button>
        </div>
    </form>
</main>

<footer></footer>
<script>
    function addElement(id) {
        const table = document.getElementById(id)
        const input = document.getElementById('arrLength')
        const cell = document.createElement('tr')
        cell.innerHTML = `
            <td><label>№${++input.value}</label></td>
            <td class="element-row"><input type="text" name="element${input.value}"></td>
        `
        table.appendChild(cell)
    }

</script>
</body>
</html>
