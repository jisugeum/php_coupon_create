<?php
session_start();
if(!isset($_SESSION['User_Id']))
{
    header('Location: ./login.html');
}

if($_SESSION['Is_Super']=='O')
{
    header('Location: ./coupon_edit.php');
}
else
{
    header('Location: ./coupon_use.php');
}

?>