<?php if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['email'], $_GET['name'], $_GET['pw'], $_GET['pw_check'])): ?>
    <?php
    require_once('db.php');
    $email = $_GET['email'] ?? '';
    $name = $_GET['name'] ?? '';
    $pw = $_GET['pw'] ?? '';
    $pw_check = $_GET['pw_check'] ?? '';
    ?>
    <div>
        이메일:
        <?= htmlspecialchars($email) ?>
    </div>
    <div>
        이름:
        <?= htmlspecialchars($name) ?>
    </div>
    <div>
        비밀번호:
        <?= htmlspecialchars($pw) ?>
    </div>
    <div>
        비밀번호 확인:
        <?= htmlspecialchars($pw_check) ?>
    </div>


    <?php if ($email && $name && $pw && $pw_check): ?>
        <?php if (!filter_var($email, FILTER_VALIDATE_EMAIL)): ?>
            <div style="color:red;">올바른 이메일 형식이 아닙니다</div>
        <?php elseif ($pw !== $pw_check): ?>
            <div style="color:red;">비밀번호가 일치하지 않습니다</div>
        <?php elseif (strlen($pw) < 8):  ?>
            <div style="color:red;">비밀번호는 8자 이상이어야 합니다</div>
        <?php else:  ?>
            <?php
            $pstmt = $db->prepare('SELECT COUNT(*) FROM members WHERE email = :email');
            $pstmt->execute([
                "email" => $email
            ]);
            if ($pstmt->fetchColumn() > 0):
            ?>
                <div style="color:red;">이미 가입된 이메일입니다</div>
            <?php else: ?>
                <div style="color:green;">통과</div>
                <?php
                $pstmt = $db->prepare('INSERT INTO members (email, name, password) VALUES (:email, :name, :password)');
                $pstmt->execute([
                    "email" => $email,
                    "name" => $name,
                    "password" => $pw
                ]);

                $pstmt = $db->prepare("SELECT * FROM members WHERE email = :email");
                $pstmt->execute([
                    "email" => $email
                ]);
                $user = $pstmt->fetch();

                if (!$user) {
                    header("Location: signin.php");
                    exit;
                }

                $_SESSION['userid'] = $user->id;
                $_SESSION['name'] = $user->name;

                header("Location: index.php");
                exit;
                ?>
            <?php endif; ?>
        <?php endif; ?>
    <?php else: ?>
        <div style="color:orange;">모든 필드를 입력하세요</div>
    <?php endif; ?>
<?php endif; ?>