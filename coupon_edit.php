<?php
session_start();


echo "로그인 되었습니다.<br>";
echo "관리자페이지입니다.<br>";
echo "<a href=coupon_create.php>쿠폰 생성 페이지로 이동</a><br>";
echo "<a href=coupon_list.php>쿠폰 리스트 보기</a><br>";
echo "<a href=coupon_dashborad.php>대쉬보드 현황판</a><br>";
echo "<a href=logout.php>로그아웃</a>";
?>