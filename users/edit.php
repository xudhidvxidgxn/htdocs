
<?php require_once "../header.php"; ?>

<?php
if (!isset($_GET['id'])) {
    //에러 처리
    die("아이디가 없습니다.");
}

$id = $_GET['id'];

$pstmt = $db->prepare("SELECT * FROM users WHERE id = :id");
$pstmt->execute(["id" => $id]);
$user = $pstmt->fetch();

if (!$user) {
    die("없는 유저입니다.");
}
?>

<form action="action.php" method="POST">
    <input type="hidden" name="mode" value="update">
    <input type="hidden" name="id" value="<?= $user->id ?>">

    <div>
        <label for="name">이름</label>
        <input type="text" name="name" id="name" value="<?= $user->name ?>">
    </div>
    <div>
        <label for="userid">아이디</label>
        <input type="text" name="userid" id="userid" value="<?= $user->userid ?>" disabled>
    </div>
    <div>
        <label for="password">비밀번호</label>
        <input type="password" name="password" id="password" value="<?= $user->password ?>">
    </div>
    <button type="submit">회원수정</button>
</form>

<?php require_once "../footer.php"; ?>