<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Калькулятор</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="view">
        <h1 class="view__title">Калькулятор</h1>
        <form action="calc.php" class="calc" method="post">
            <input type="text" class="calc__input" name="string" value="<?=$_GET['msg']?>">
            <div class="calc__buttons">
                <button class="calc__button calc__number">1</button>
                <button class="calc__button calc__number">2</button>
                <button class="calc__button calc__number">3</button>
                <button class="calc__button calc__remove"><</button>
                <button class="calc__button calc__number">4</button>
                <button class="calc__button calc__number">5</button>
                <button class="calc__button calc__number">6</button>
                <button class="calc__button calc__delete">C</button>
                <button class="calc__button calc__number">7</button>
                <button class="calc__button calc__number">8</button>
                <button class="calc__button calc__number">9</button>
                <button class="calc__button calc__number">+</button>
                <button class="calc__button calc__number">0</button>
                <button class="calc__button calc__number">-</button>
                <button class="calc__button calc__number">*</button>
                <button class="calc__button calc__number">/</button>
                <button class="calc__button calc__button--big calc__number">(</button>
                <button class="calc__button calc__button--big calc__number">)</button>
            </div>
            <button class="calc__button calc__button--full" name="calc">Решить</button>
        </form>
    </main>
    <script src="main.js"></script>
</body>
</html>