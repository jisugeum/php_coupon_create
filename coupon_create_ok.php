<?php
session_start();
$prefix = $_POST['prefix'];
$group_num = $_POST['group_num'];
$mysqli = mysqli_connect("localhost", "root","1111","coupon"); //db에 연결

$arr_no=array("1","2","3","4","5","6","7","8","9","0");
$arr_alphabet=array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");

srand((double)microtime()*1000000);

$length = strlen($string);
$count = 0;

while($count<10){
    
    for($i=0;$i<13;$i++)
    {
        if (rand(0,1)==0)
        {
            $str.=$arr_no[rand(0,(count($arr_no)-1))];
        } 
        else
        {
            $str.=$arr_alphabet[rand(0,(count($arr_alphabet)-1))];
        } 
      
    }
    //prefix와 난수 합 16자리
    $coupon_num = $prefix.$str;

    //쿠폰 번호 중복 확인 체크 
    $query = "select count(Cop_num) from coupon where Cop_num='$coupon_num'";
    $result = $mysqli->query($query);   
    $col = mysqli_num_rows($result);

    if($col==1)
    {   
        $query = "INSERT INTO coupon (Cop_num,Cop_Group) VALUES ('$coupon_num','$group_num')";
        $result = $mysqli->query($query);   
        $count++;
    }
    else
    {
        continue;
    }

}
   //쿠폰 생성 후 돌아가기 
   header('Location: ./coupon_create.html?create_ok=Y');
?>