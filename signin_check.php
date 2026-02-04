<?php
$email = $_GET['email'];
$name = $_GET['name'];
$pw = $_GET['pw'];
$pw_check = $_GET['pw_check'];
?>
<div>
    이메일:     
    <?= $email ?>
</div>
<div>
    이름: 
    <?= $name ?>
</div>
<div>
    비밀번호: 
    <?= $pw ?>
</div>
<div>
    비밀번호 확인: 
    <?= $pw_check ?>
</div>