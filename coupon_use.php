<?php
session_start();
if(!isset($_SESSION['userid']))
{
    header('Location: ./login.html');
}

echo "로그인 되었습니다.";

echo "<a href=logout.php>로그아웃</a>"
?>