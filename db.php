<?php
session_start();

$host = 'localhost'; // ip주소

$dbname = '4주차_과제'; // DB 이름

// DB 유저 아이디
$user = 'root';

// DB 유저 패스워드
$password = '';

// 문자 인코딩
$charset = 'utf8mb4';

// Data Source Name (DB 연결 설정)
$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

// PDO 약자: Prepared Data Objects
$options = [
    // ATTR = attribute(속성)
    // ERRMODE 설정 => WARNING
    // 에러 처리 방식 => 에러가 발생하면 warning 경고 문구를 띄우겠다.
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,

    // 기본 FETCHMODE 설정 => FETCHOBJ     
    // 기본 fetch 방식 => object 형식
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
];

try {
    $db = new PDO($dsn, $user, $password, $options);
} catch (PDOException $e) {
    die("접속 실패 " . $e->getMessage());
}

// board['user_id'] => FETCH_ASSOC
// $board->user_id -> FETCH_OBJ