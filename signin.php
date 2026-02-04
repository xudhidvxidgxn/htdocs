<?php require_once('db.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login 페이지</title>
</head>

<body>
    <form action="signin_check.php" method="GET">
        <div>
            <label for="email">Email </label>
            <input type="email" name="email" id="email" placeholder="example@domain.com">
        </div>
        <div>
            <label for="name">이름 </label>
            <input type="text" name="name" id="name" placeholder="이름">
        </div>
        <div>
            <label for="pw">비밀번호 </label>
            <input type="password" name="pw" id="pw" placeholder="비밀번호">
        </div>
        <div>
            <label for="pw_check">비밀번호 확인 </label>
            <input type="password" name="pw_check" id="pw_check" placeholder="비밀번호 확인">
        </div>
        <button type="submit">회원가입</button>
    </form>
</body>

</html>