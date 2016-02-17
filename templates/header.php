
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>My site</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <style>
        body {
            padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
        }

        .login{
            width: 300px;
            margin: 0 auto;
        }

    </style>

    <script src="bootstrap/js/jquery-1.12.0.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

</head>

<body>

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="brand" href="?">Тест blog</a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li class="active"><a href="?">Главная</a></li>
                        <?php if (IS_ADMIN): ?>
                            <li><a href="?act=logout">Админ (Выйти)</a></li>
                        <?php else: ?>
                            <li><a href="?act=login">Войти</a></li>
                        <?php endif ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">

