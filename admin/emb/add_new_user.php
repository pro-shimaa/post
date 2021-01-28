<?php
ob_start();
include("../../connections/post.php");
session_start();
if($_SESSION['acc_lvl']==3){
include"e/header.php";
include"e/menu.php";?>


<?php
ob_start();
 // start insert code
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
date_default_timezone_set("Africa/Cairo");
$d=date("Y-m-d h:i:sa");
 mysqli_set_charset($post,"utf8");

$sql = "INSERT INTO login(username,password,acc_lvl,name,create_date) VALUES ('".mysqli_real_escape_string($post,$_POST["username"])."','".mysqli_real_escape_string($post,$_POST["password"])."',2,'".mysqli_real_escape_string($post,$_POST["name"])."','".$d."')";
 mysqli_query($post, $sql);
header('Location: view_users.php');
exit;
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<body>

    <div id="wrapper">



        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                
                
                    <h1 class="page-header">اضافة مستخدم جديد</h1>
                    
                    
                    
                </div>
                <!-- /.col-lg-12 -->
 

  
                   
                    <div class="panel-body">
                        <form method="post"  class="mt-5 px-4" name="form1" action="add_new_user.php" > 
                            
                                <div class="form-group">
<input type="text"  name="name" class="form-control" placeholder="الاسم" required>
                                </div>
                                 <div class="form-group">
<input type="text" id="email"  name="username" class="form-control" placeholder="اسم المستخدم" required>
                                </div>
                                <div class="form-group">
<input type="text"  name="password" class="form-control"  placeholder="الرقم السرى" required>
                                </div>
                            
                                

                                                    <input type="hidden" name="MM_insert" value="form1" />
                 
                            <button id="addBtn" type="submit" class="btn btn-lg btn-success btn-block"> اضافة </button>
                        </form>
    
    
                    </div>
    
    
             
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

   </main>


     </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
<?php 
include"e/footer.php";
}
else
{
	echo'<h2 align="center">غير مسموح بدخول هذه الصفحة</h2>';
	}

?>