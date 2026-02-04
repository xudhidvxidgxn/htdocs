<?php require_once('db.php'); ?>

<?php if (isset($_SESSION['userid'])): ?>
    Hello, <?= $_SESSION['name'] ?> !
    <div><a href="logout.php">로그아웃</a></div>
<?php else: ?>
    <form action="login_check.php" method="GET">
        <div>
            <input type="text" name="email" placeholder="example@domain.com">
        </div>
        <div>
            <input type="password" name="pw" placeholder="비밀번호">
        </div>
        <div style="display: flex; gap: 10px;">
            <button type="submit">로그인</button>
            <a href="signin.php">회원가입</a>
        </div>
    </form>
<?php endif; ?>