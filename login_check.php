<?php
session_start();
$id = $_POST['id'];
$pw = $_POST['pw'];
$mysqli = mysqli_connect("localhost", "root","1111","user"); //db에 연결

$sql = "SELECT * FROM user WHERE User_Id='$id' ";
$result = $mysqli->query($sql);
if(mysqli_num_rows($result)==1)//일치하는 id가 있을경우
{    

   $row=mysqli_fetch_assoc($result);//sql의 갯수의 값을 받아온다 배열로
   
    if($row['User_Pw']==$pw)
    {
        $_SESSION['User_Id']=$id;
        $_SESSION['Is_Super']=$row['Is_Super'];
        if(isset($_SESSION['User_Id']))
        {   
            if($row['Is_Super']=="O") //관리자 일 경우 와 아닐 경우 페이지 경로가 다르게 설정
            {
                header('Location: ./coupon_edit.php');
            }
            else
            {
                header('Location: ./coupon_use.php');
            }
        }
        else
        {
            echo "세션 저장 실패";
        }
    } 
    else
    {
        echo "PW를 확인해주세요<br>";
        echo "<a href=main.php>뒤로가기</a>";
    }
}
else
{
    echo "ID 혹은 PW를 확인해주세요!<br>";
    echo "<a href=main.php>뒤로가기</a>";
}

?>