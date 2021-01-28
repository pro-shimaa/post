<?php
ob_start();
session_start();
if($_SESSION['acc_lvl']==2||$_SESSION['acc_lvl']==3){
include("../../connections/post.php");
include"e/header.php";
include"e/menu.php";?>


<?php
ob_start();
 // start insert code
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {

 mysqli_set_charset($post,"utf8");

$sql = "INSERT INTO subject(subject,subject_date,std_id) VALUES ('".mysqli_real_escape_string($post,$_POST["subject"])."','".mysqli_real_escape_string($post,$_POST["subject_date"])."','".mysqli_real_escape_string($post,$_POST["std"])."')";
 mysqli_query($post, $sql);
header('Location: view_subject.php?id='.mysqli_real_escape_string($post,$_POST["std"]));
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
                
                
                    <h1 class="page-header">اضافة مواد  الطالب</h1>
                    
                    
                    
                </div>
                <!-- /.col-lg-12 -->
 

  
                   
                    <div class="panel-body">
                        <form method="post"  class="mt-5 px-4" name="form1" action="add_subject.php" > 
                            
                                <div class="form-group">
<input type="text"  name="subject" class="form-control" placeholder="الـمــادة"  required="" oninvalid="this.setCustomValidity('من فضلك ادخل اسم الماده')"   oninput="setCustomValidity('')">
                                </div>
                                <div class="form-group">
<input type="text"  name="subject_date" class="form-control"  placeholder="العام الجامعى"  required="" oninvalid="this.setCustomValidity('من فضلك ادخل العام الجامعى')"   oninput="setCustomValidity('')">
                                </div>
                            
                                
                                        <input type="hidden" name="std" value="<?php echo $_GET['id'];?>" />

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