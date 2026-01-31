<!doctype html>
<html lang="ko">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
</head>

<body>
    <?php
    // php: 동적 컨텡츠를 만드는 언어다
    // php는 브라우저에서 읽을 수 없다. => 즉, 서버가 필요하다.
    // php 코드를 어떻게 해석하지? => php 인터프리터    
    // 인터프리터가 한 줄 한 줄 읽어들인다. (해석한다.)

    // php에서 자주 사용하는 함수: require_once, foreach

    // 이 파일을 불러오는 함수(키워드)
    require_once "header.php";
    ?>

    <!-- $db -->
    <!--index.html

        // GET: 편지 내용이 공개 되어잉ㅆ다. (편지지 안에 들어간 상태, 편지 내용 자체가 밖에 오픈)
        //      => 검색
        // POST: 편지지 안에 잘 넣어서, 편지 내용이 공개되지 않도록 한다.
        //      => 회원가입, 로그인, 글 작성
          
        <a href="https://naver.com">naver.com</a>-->
    <form action="action.php" method="POST">
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
</body>

</html>