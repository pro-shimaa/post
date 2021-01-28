<?php
session_start();
include("../../connections/post.php");
$message='';
include"e/header.php";
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {

mysqli_set_charset($post,"utf8");
 $query_Recordset1= "select * from login where username='".mysqli_real_escape_string($post,$_POST["email"])."' and password='".mysqli_real_escape_string($post,$_POST["password"])."'";
$Recordset1 = mysqli_query($post,$query_Recordset1);
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
if($row_Recordset1['username']!=null){
$_SESSION['name']=$row_Recordset1['username'];

$_SESSION['acc_lvl']=$row_Recordset1['acc_lvl'];
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

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">تسجيل الـدخول</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="login.php" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="اسم المستخدم" name="email" type="text" autofocus>
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
                                                <div align="center"><?php echo $message;?></div>

                </div>

            </div>
        </div>
    </div>
<?php 
include"e/footer.php";
?>