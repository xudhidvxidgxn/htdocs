<?php
require_once "../db.php";

$mode = $_POST['mode'] ?? $_GET['mode'] ?? "";

switch ($mode) {
    case 'create':
        $pstmt = $db->prepare("INSERT INTO users (name, userid, password) VALUES (:name, :userid, :password)");
        $pstmt->execute([
            "name" => $_POST['name'],
            "userid" => $_POST['userid'],
            "password" => $_POST['password']
        ]);

        header("Location: /users/list.php");
        break;

    case 'update':
        $pstmt = $db->prepare("UPDATE users set name = :name, password = :password WHERE id = :id");
        $pstmt->execute([
            "name" => $_POST['name'],
            "password" => $_POST['password'],
            "id" => $_POST['id']
        ]);
        header("Location: /users/list.php");
        break;

    case 'delete':
        $pstmt = $db->prepare("DELETE FROM users WHERE id = :id");
        $pstmt->execute([
            "id" => $_GET['id']
        ]);

        header("Location: /users/list.php");
        break;

    case 'login':
        $pstmt = $db->prepare("SELECT * FROM users WHERE userid = :userid AND password = :password");

        $pstmt->execute([
            'userid' => $_POST['userid'],
            'password' => $_POST['password']
        ]);

        $user = $pstmt->fetch();

        if (!$user) {
            header("Location: /users/login.php");
            exit;
        }

        $_SESSION['user'] = $user;

        header("Location: /users/list.php");
        exit;

        break;

    case 'logout':
        unset($_SESSION['user']);

        header("Location: /users/list.php");
        exit;

        break;
}

// 
// $host = 'localhost'; // ip주소
// 
// $dbname = '20260131web';
// 
// // DB 유저 아이디
// $user = 'root';
// 
// // DB 유저 패스워드
// $password = '';
// 
// // 문자 인코딩
// $charset = 'utf8mb4';
// 
// // Data Source Name (DB 연결 설정)
// $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
// 
// // PDO 약자: Prepared Data Objects
// $options = [
//     // ATTR = attribute(속성)
//     // ERRMODE 설정 => WARNING
//     // 에러 처리 방식 => 에러가 발생하면 warning 경고 문구를 띄우겠다.
//     PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
// 
//     // 기본 FETCHMODE 설정 => FETCHOBJ     
//     // 기본 fetch 방식 => object 형식
//     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
// ];
// 
// try {
//     $db = new PDO($dsn, $user, $password, $options);
// } catch (PDOException $e) {
//     die("접속 실패 " . $e->getMessage());
// }
// 
// // board['user_id'] => FETCH_ASSOC
// // $board->user_id -> FETCH_OBJ
// 
// echo 'userid : ' . $_POST['userid'] . "<br />"; // fm
// echo 'password : ' . $_POST['password'] . "<br />"; // fm
