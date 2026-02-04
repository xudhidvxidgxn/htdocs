
<?php require_once "../header.php"; ?>

<?php
//$pstmt = $db->prepare("SELECT * FROM users WHERE id = :id");
//$pstmt->execute(['id' => 4]);

$sql = "SELECT * FROM users";
$params = [];
if (isset($_GET['id'])) {
    $sql .= " WHERE id = :id";
    $params["id"] = $_GET['id'];
}

$pstmt = $db->prepare($sql);
$pstmt->execute($params);

$users = $pstmt->fetchAll();

//var_dump($users);
?>

<table>
    <thead>
        <tr>
            <th>아이디</th>
            <th> 이름</th>
            <th> 유저아이디</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user->id ?></td>
                <td><?= $user->name ?></td>
                <td><?= $user->userid ?></td>
                <td>
                    <a href="/users/edit.php?&id=<?= $user->id ?>">
                        수정
                    </a>
                </td>
                <td>
                    <a href="/users/action.php?mode=delete&id=<?= $user->id ?>">
                        삭제
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once "../footer.php"; ?>