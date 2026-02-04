<?php require_once('db.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signin 페이지</title>
</head>

<body>
    <form method="GET">
        <div>
            <label for="email">Email </label>
            <input type="email" name="email" id="email" placeholder="example@domain.com" autocomplete="off">
        </div>
        <div>
            <label for="name">이름 </label>
            <input type="text" name="name" id="name" placeholder="이름" autocomplete="off">
        </div>
        <div>
            <label for="pw">비밀번호 </label>
            <input type="password" name="pw" id="pw" placeholder="비밀번호" autocomplete="off">
        </div>
        <div>
            <label for="pw_check">비밀번호 확인 </label>
            <input type="password" name="pw_check" id="pw_check" placeholder="비밀번호 확인" autocomplete="off">
        </div>
        <button type="submit">회원가입</button>
    </form>
    <?php require_once('signin_check.php') ?>
</body>

</html>