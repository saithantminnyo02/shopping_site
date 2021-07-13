<?php
session_start();
if (isset($_COOKIE['key']) || isset($_SESSION['key'])) {
  header("Location:account.php");
}
$siteName="StartUp";
function clear($input){
  $input= trim($input);
  $input= stripslashes($input);
  $input= htmlspecialchars($input);
  return $input;
}
 $srvnam= "localhost";
 $user  = "root";
 $pass  = "";
 $dbname="StartUp";
// $conn =mysqli_connect($srvnam,$user,$pass,$dbname);
function query($qry){
  global $conn;
  return mysqli_query($conn,$qry);
}
function queries($qry){
  global $conn;
  return mysqli_multi_query($conn,$qry);
}
function rows($qry){
  return mysqli_num_rows($qry);
}
function generateKey($email){
  mt_srand(time());
  $key=mt_rand();
  $key=md5($key.$email);
  return $key;
}
function setCokie($value){
 $time=8640*30;
 setcookie("key",$value,time()+$time);
}
function setSession($value){
  $_SESSION["key"]=$value;
}
