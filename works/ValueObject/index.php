<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../../main.css">
    <title>ValueObject</title>
</head>
<body>
<header class="header-page">
    <nav class="header-page__menu">
        <a href="/">На головну</a>
    </nav>
</header>
<div class="page">
    <h1 class="page__home-title">
        ДЗ 2. Створити клас ValueObject для кольорів у форматі RGB
    </h1>
    <section class="page__task-section">
        <h2 class="task-section__title">
            Власне сам класс ValueObject
        </h2>
        <pre>
             <?php
             require_once "ValueObject.php";
             $clr = new ValueObject(0, 10, 15);
             print_r($clr);
             ?>
        </pre>
    </section>
    <section class="page__task-section">
        <h2 class="task-section__title">
            Робота методу equals
        </h2>
        <?php
        $clrTwo = new ValueObject(0, 10, 15);
        $clrThree = new ValueObject(23, 10, 15);
        ?>
        <pre>
                    $clrTwo = new ValueObject(0, 10, 15);
                    $clrThree = new ValueObject(23, 10, 15);
                    var_dump($clr->equals($clrTwo));
                    var_dump($clr->equals($clrThree));
             <?php
             var_dump($clr->equals($clrTwo));
             var_dump($clr->equals($clrThree));
             ?>
        </pre>
    </section>

    <section class="page__task-section">
        <h2 class="task-section__title">
            Робота методу random
        </h2>
        <pre>
             <?php
             print_r($clr::random());
             ?>
        </pre>
    </section>
    <section class="page__task-section">
        <h2 class="task-section__title">
            Робота методу mix
        </h2>
        <pre>
             <?php
             $mixedColors = $clr->mix($clr::random());
             var_dump($mixedColors->getRed());
             var_dump($mixedColors->getBlue());
             var_dump($mixedColors->getGreen());
             ?>
        </pre>
    </section>

</div>
</body>
</html>


