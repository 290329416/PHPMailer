<?php
header("Content-type:text/html;charset=utf-8");
// include_once('class.phpmailer.php');
// $text = $_POST['text'];
// $content = $_POST['content'];
// $Tomail = $_POST['mail'];

// //实例化发送邮件对象
// $mail = new PHPMailer;
// //设置邮件编码
// $mail->CharSet = 'UTF-8';
// //设置使用SMTP服务
// $mail->IsSMTP();
// //启用SMTP验证
// $mail->SMTPAuth = true;
// //SMTP服务器
// $mail->Host =  'smtp.qq.com';
// //服务器端口号
// $mail->Port = 25;
// //SMTP 用户名和密码
// $mail->Username = '455638383@qq.com';
// $mail->password = 'z2991960*';
// //发送地址
// $mail->SetFrom('290329416@qq.com');
// //回复地址
// $mail->AddReplyTo('455638383@qq.com');
// //主题
// $mail->subject = $text;
// //内容
// $mail->MsgHTML($content);
// //收件人地址
// $mail->AddAddress($Tomail);
// //发送
// if(!$mail->Send()) {
//         echo 'Mailer Error: ' . $mail->ErrorInfo;
//     } else {
// 		  echo "Message sent!恭喜，邮件发送成功！";
//     }


$text = $_POST['text'];
$content = $_POST['content'];
$Tomail = $_POST['mail'];


require './PHPMailerAutoload.php';  
$mail = new PHPMailer;  
$mail->isSMTP();                                      // 设置邮件使用SMTP  
$mail->Host = 'smtp.qq.com';                     // 邮件服务器地址  
$mail->SMTPAuth = true;                               // 启用SMTP身份验证  
$mail->CharSet = "UTF-8";                             // 设置邮件编码  
$mail->setLanguage('zh_cn');                          // 设置错误中文提示  
$mail->Username = '455638383@qq.com';              // SMTP 用户名，即个人的邮箱地址  
$mail->Password = 'z2991960';                        // SMTP 密码，即个人的邮箱密码  
//$mail->SMTPSecure = 'tls';                            // 设置启用加密，注意：必须打开 php_openssl 模块  
$mail->Priority = 3;                                  // 设置邮件优先级 1：高, 3：正常（默认）, 5：低  
$mail->From = '455638383@qq.com';                 // 发件人邮箱地址  
$mail->FromName = '赵AAA';                     // 发件人名称  
//$mail->addAddress('liruxing1715@163.com', 'Lee');     // 添加接受者  
$mail->addAddress($Tomail);               // 添加多个接受者  
$mail->addReplyTo('290581416@qq.com', '赵庆洋'); // 添加回复者  
//$mail->addCC('liruxing1715@sina.com');                // 添加抄送人  
//$mail->addCC('512848303@qq.com');                     // 添加多个抄送人  
//$mail->ConfirmReadingTo = 'liruxing@wanzhao.com';     // 添加发送回执邮件地址，即当收件人打开邮件后，会询问是否发生回执  
//$mail->addBCC('734133239@qq.com');                    // 添加密送者，Mail Header不会显示密送者信息  
//$mail->WordWrap = 50;                                 // 设置自动换行50个字符  
$mail->addAttachment('./1.jpg');                      // 添加附件  
//$mail->addAttachment('/tmp/image.jpg', 'one pic');    // 添加多个附件  
$mail->isHTML(true);                                  // 设置邮件格式为HTML  
$mail->Subject = $text;  
$mail->Body    = $content.date('Y-m-d H:i:s');  
//$mail->AltBody = 'This is the 主体 in plain text for non-HTML mail clients';  
  
if(!$mail->send()) {  
    echo 'Message could not be sent.';  
    echo 'Mailer Error: ' . $mail->ErrorInfo;  
    exit;  
}
echo '发送成功';  