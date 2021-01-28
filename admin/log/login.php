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
    <title>::دخول الطالب::</title>


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

<h2 align="center">تسجيل الدخول</h2>  

<?php
session_start();
include("../../connections/post.php");
$message='';
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {

mysqli_set_charset($post,"utf8");
 $query_Recordset1= "select * from temp where email='".mysqli_real_escape_string($post, $_POST["email"])."' and password='".mysqli_real_escape_string($post, $_POST["password"])."'";
$Recordset1 = mysqli_query($post,$query_Recordset1);
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
if($row_Recordset1['email']!=null){
$_SESSION['email']=$row_Recordset1['email'];
header("Location:index.php");
die();
}
else
{
	$message="Invalid Login";
	}
}
?>
<body>

    

                   
                    <div align="center">
                        <form role="form" action="login.php" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="البريد الاليكترونى" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="الرقم السرى" name="password" type="password" value="">
                                </div>
                                                                                    <input type="hidden" name="MM_insert" value="form1" />

                                
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="دخول">
                            </fieldset>
                      </form>
              </div>
                    <div align="center">هل نسيت الرقم السرى؟
                    
                     <a href="forget_password.php">اضغط هنا</a></div>
                                                <div align="center"><?php echo $message;?></div>
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