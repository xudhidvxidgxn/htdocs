<?php require_once "../header.php"; ?>

<form action="action.php" method="POST">
    <input type="hidden" name="mode" value="create">
    <div>
        <label for="name">이름</label>
        <input type="text" name="name" id="name">
    </div>
    <div>
        <label for="userid">아이디</label>
        <input type="text" name="userid" id="userid">
    </div>
    <div>
        <label for="password">비밀번호</label>
        <input type="password" name="password" id="password">
    </div>
    <button type="submit">회원가입</button>
</form>

<?php require_once "../footer.php"; ?>