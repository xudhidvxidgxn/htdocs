<?php if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['email'], $_GET['pw'])): ?>
<?php require_once('db.php');
    $pstmt = $db->prepare("SELECT * FROM members WHERE email = :email AND password = :password");

    $pstmt->execute([
        'email' => $_GET['email'],
        'password' => $_GET['pw']
    ]);

    $user = $pstmt->fetch();

    if (!$user) {
        header("Location: index.php");
        exit;
    }

    $_SESSION['userid'] = $user->id;
    $_SESSION['name'] = $user->name;

    header("Location: index.php");
    exit;
?>
<?php endif; ?>