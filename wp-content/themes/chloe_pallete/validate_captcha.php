<?php 
session_start();

$security_code = isset($_POST['warranty_captcha'])?$_POST['warranty_captcha']:"";
$form = isset($_POST['form'])?$_POST['form']:"";

$sessionKey="security_code";
if(!empty($form)){
	$sessionKey ="security_code_".$form;
	$security_code = isset($_POST[$form.'_captcha'])?$_POST[$form.'_captcha']:"";
}

if($_SESSION[$sessionKey] == $security_code){
    echo json_encode(['valid' => true]);
}
else{
    echo json_encode(['valid' => false]);
} 

?>