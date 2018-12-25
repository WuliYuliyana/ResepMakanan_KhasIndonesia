<?php
session_start();
if(isset($_POST["captcha"])&&$_POST["captcha"]!=""&&$_SESSION["code"]==$_POST["captcha"])
{
echo "Captcha Okay!";
//Place other codes here to execute when captcha is passed
}
else
{
die("Wrong Captcha Code!");
}
?>