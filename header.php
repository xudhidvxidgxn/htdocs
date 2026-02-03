<?php require_once "db.php"; ?>
<!doctype html>
<html lang="ko">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
</head>

<body>
    <style>
        header {
            display: flex;
            width: 100%;
            height: 60px;
            border-bottom: 1px solid #ddd;
            justify-content: space-between;
        }

        header nav ul {
            display: flex;
            /*gap: 30px;*/
            list-style-type: none;
            gap: 10px;
        }
    </style>
    <header>
        <div class="logo">logo</div>
        <nav>
            <?php if (isset($_SESSION['user'])): ?>
                <ul>
                    <li>Home</li>
                    <li>About</li>
                    <li><?= $_SESSION['user']->name ?></li>
                    <li><a href="/users/action.php?mode=logout">로그아웃</a></li>
                </ul>
            <?php else: ?>
                <ul>
                    <li><a href="/users/login.php">로그인</a></li>
                    <li><a href="/users/create.php">회원가입</a></li>
                </ul>
            <?php endif; ?>
        </nav>
    </header>