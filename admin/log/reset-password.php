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
            <div style="width:700px; margin:50 auto;">

<h2 align="center">إعادة تعين الرقم السرى</h2>  
<?php
ob_start();
$error="";
include("../../connections/post.php");

if (isset($_GET["email"])){

$query = mysqli_query($post,"SELECT * FROM temp WHERE email='".mysqli_real_escape_string($post,$_GET["email"])."'");
$row = mysqli_num_rows($query);
if ($row==""){
$error .= '<h2>Invalid Link</h2>
<p>The link is invalid/expired. Either you did not copy the correct link from the email, 
or you have already used the key in which case it is deactivated.</p>';
	}else{
	$row = mysqli_fetch_assoc($query);
	?>
    <br />
	<form method="post" action="" name="update" class="mt-5 px-4">
	<input type="hidden" name="action" value="update" />
                                <div class="form-group" align="right">
	<input type="password" name="pass1" id="password" class="form-control" maxlength="15" placeholder="الرقم السرى"  pattern=".{6,}" required="" oninvalid="this.setCustomValidity('من فضلك ادخل الرقم السرى  فيما لايقل عن 6 ارقام او حروف')"   oninput="setCustomValidity('')" />
                                </div> 
    <br /><br />
	<input type="password" placeholder="اعد ادخال الرقم السرى" class="form-control" name="pass2" id="txtCPassword" maxlength="15" required="" oninvalid="this.setCustomValidity('من فضلك  ادخل الرقم السرى')" pattern=".{6,}"  oninput="setCustomValidity('')" />
    <br /><br />
	<input type="hidden" name="email" value="<?php echo $email;?>"/>
    <div align="center">
	<input type="submit" id="reset" value="Reset Password" class="btn  btn-danger " />
    </div>
	</form>
<?php

		}
if($error!=""){
	echo "<div class='error'>".$error."</div><br />";
	}			
} // isset email key validate end


if(isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"]=="update")){
$pass1 = mysqli_real_escape_string($post,$_POST["pass1"]);
$pass2 = mysqli_real_escape_string($post,$_POST["pass2"]);
$email = $_POST["email"];

	if($error!=""){
		echo "<div class='error'>".$error."</div><br />";
		}else{
mysqli_query($post,"UPDATE temp SET password='".$pass1."' WHERE `email`='".$email."';");	

header('Location: success_reset.php');
exit;
		}		
}
?>
</div>
    </div>
    </section>

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
                            <a><i class="fas fa-envelope mr-3 "> Email:aaaa@sss.com</a></i>
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



</div>
</body>
</html>
<script>
	var password = document.getElementById("password")
  , confirm_password = document.getElementById("txtCPassword");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
	</script>