<!DOCTYPE html5>
<html lang="en">

<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../site/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../site/css/bootstrap-rtl.css">
    <link rel="stylesheet" href="../../site/css/all.min.css">
    <link rel="stylesheet" href="../../site/css/index_style.css">
    <link rel="stylesheet" href="../../site/css/fontsArabic.css">
    <link rel="icon" href="../../site/images/4.png">
    <title>::Reset Password ::</title>


</head>

<body>

    <header>

        <nav class="nav2 navbar navbar-expand-lg fixed-top  p-2">
            <div class="container-fluid">
                <a class="navbar-brand mb-2" href="../../site/index.html">الدراسات العليا</a>
                <button class="navbar-toggler mr-3" type="button" data-toggle="collapse"
                    data-target="#navbar-togglerDemo02" aria-controls="navbar-togglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line" style="margin-bottom: 0;"></span>
                </button>

              <div class="collapse navbar-collapse" id="navbar-togglerDemo02">
                            <ul class="navbar-nav" style="position:relative;">
                                <li class="nav-item active p-2 ">
                                    <a class="nav-link Arabic" href="../../site/index.html">الرئيسية <span
                                            class="sr-only">(current)</span></a>
                                </li>
                                
                                <li class="nav-item active p-2">
                                    <a class="nav-link " href="../../site/faq.html">اسئلة شائعة <span
                                            class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item active p-2">
                                    <a class="nav-link " href="../../site/program.html">برامج الدراسات العليا <span
                                            class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item active p-2">
                                    <a class="nav-link " href="../../site/program.html">اللائحة <span
                                            class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item active bor p-2">
                                    <a class="nav-link" href="../../site/contact.html">
                                        اتصل بنا                                        <span class="sr-only">(current)</span></a>
                                </li>
                               <li class="nav-item active p-2">
                                    <a class="nav-link" href="register.php">التسجيل <span
                                            class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item active p-2">
                                    <a class="nav-link" href="login.php">تسجيل الدخول <span
                                            class="sr-only">(current)</span></a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </nav>


    </header>
    
       <section id="contact" class="py-5">

        <div class="container">
           
           
            <div class="row">
<?php
$error="";
include("../../connections/post.php");
require("PHPMailer/PHPMailerAutoload.php");

?>

<div style="width:700px; margin:50 auto;">

<h2 align="center">إعادة تعين الرقم السرى</h2>   

<?php
if(isset($_POST["email"]) && (!empty($_POST["email"]))){
$email = mysqli_real_escape_string($post,$_POST["email"]);
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$email = filter_var($email, FILTER_VALIDATE_EMAIL);
if (!$email) {
  	$error .="<h3 align='center'>ايميل غير صحيح</h3>";
	}else{
	$sel_query = "SELECT * FROM temp WHERE email='".$email."'";
	$results = mysqli_query($post,$sel_query);
	$row = mysqli_num_rows($results);
	if ($row==""){
		$error .= "<h3 align='center'>لايوجد مستخدم مسجل بهذا البريد الاليكترونى!</h3>";
		}
	}
	if($error!=""){
	echo "<div class='error'>".$error."</div>
	<br /><a href='javascript:history.go(-1)'>Go Back</a>
	</div>
    </div>
    </section>
	";
		}else{



$output='<p align="right">عزيزى الطالب,</p>';
$output='<p align="right">السلام عليكم ورحمة الله وبركاته</p>';

$output.='<p align="right">من فضلك اضغط على اللينك التالى لاستعادة الرقم السرى.</p>';
$output.='<p align="right">-------------------------------------------------------------</p>';
$output.='<p align="right"><a href="http://193.227.44.175/admin/log/reset-password.php?email='.$email.'" target="_blank">إعادة ضبط الرقم السرى</a></p>';		
$output.='<p align="right">-------------------------------------------------------------</p>';
$output.='<p align="right">وحدة التعليم الإليكترونى - بكلية الهندسة - جامعة الأزهر</p>';
$body = $output; 
$subject = "إعادة تعين الرقم السرى - وحدة التعليم الإليكترونى بكلية الهندسة";
$email_to = $email;
$fromserver = "post.eng.az@gmail.com"; 
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com";
$mail->Username   = "post.eng.az@gmail.com";
$mail->Password   = "Azhar@1234";
 $mail->IsHTML(true);
$mail->From = "post.eng.az@gmail.com";
$mail->FromName = "الدراسات العليا بكلية الهندسة - جامعة الازهر ";
$mail->Sender = $fromserver; // indicates ReturnPath header
$mail->Subject = $subject;
$mail->Body = $body;
$mail->AddAddress($email_to);
if(!$mail->Send()){
//echo "Mailer Error: " . $mail->ErrorInfo;
}else{
echo "
<h3 align='center'>تم ارسالة رسالة الى بريدك الاليكترونى لاعادة تعين الرقم السرى</h3>
</div>
    </div>
    </section>
";
	}

		}	

}else{
?>
           
           
<form method="post" action="" name="reset" class="mt-5 px-4"><br /><br />
                                <div class="form-group" align="right">

<label><strong>ادخل البريد الاليكترونى:</strong></label><br /><br />
<input type="email"  class="form-control" name="email" placeholder="البريد الالكترونى " required="" oninvalid="this.setCustomValidity('من فضلك ادخل البريد الإليكترونى')"   oninput="setCustomValidity('')" />
                                </div>
<div align="center">
<input type="submit" value="Reset Password" class="btn  btn-danger ">
</div>
</form>
 </div>
    </div>
    </section>
<?php }


 ?>

          <!-------------------------------------------------------------------->

          <footer id="footer ">
      
            <div class="footerBottom pt-4 pb-3 px-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 ">
                        <p class="text-center"> كلية الهندسة جامعة الازهر 2021&copy; وحدة التعليم الالكترونى </p>
                    </div>
                    <div class="col-md-6">
                        <div class="soialIcon float-right px-5 myArb">
                         <a><i class="fas fa-envelope mr-3 "> Email:post.eng.az@gmail.com</a></i>
                            <a><i class="fas fa-phone-alt mr-3"> Tel:02-22629594  </a></i>
                          
      
                    </div>

                </div>
            </div>
        </div>
     

    </footer>


    <script src="../../site/js/jquery-3.4.1.min.js"></script>
    <script src="../../site/js/popper.min.js"></script>
    <script src="../../site/js/bootstrap.min.js"></script>
    <script src="../../site/js/index.js"></script>

</body>

</html>


