<?php
ob_start();
include("../../connections/post.php");
session_start();
if($_SESSION['acc_lvl']==2||$_SESSION['acc_lvl']==3){
include"e/header.php";
include"e/menu.php";?>


<?php
ob_start();
 // start insert code
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {

 mysqli_set_charset($post,"utf8");
 if($_POST["stat"]==6)
{
$sql = "update temp set fac_no='".mysqli_real_escape_string($post,$_POST["fac_no"])."' ,fac_date='".mysqli_real_escape_string($post,$_POST["fac_date"])."',status='".mysqli_real_escape_string($post,$_POST["stat"])."' where std_id='".mysqli_real_escape_string($post,$_POST["std"])."'";
 mysqli_query($post, $sql);
header('Location: success.php');
exit;
}

if($_POST["stat"]==7)
{
$sql1 = "update temp set fac_no='".mysqli_real_escape_string($post,$_POST["fac_no"])."' ,fac_date='".mysqli_real_escape_string($post,$_POST["fac_date"])."',status='".mysqli_real_escape_string($post,$_POST["stat"])."' where std_id='".mysqli_real_escape_string($post,$_POST["std"])."'";
 mysqli_query($post, $sql1);
header('Location: success.php');
exit;
}}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<body>

    <div id="wrapper">



        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                
                
                    <h1 class="page-header">اضافة موافقة مجلس كلية</h1>
                    
                    
                    
                </div>
                <!-- /.col-lg-12 -->
 

  
                   
                    <div class="panel-body">
                        <form method="post"  class="mt-5 px-4" name="form1" action="add_fac_coun.php" > 
                            
                                <div class="form-group">
<input type="text"  name="fac_no" class="form-control" placeholder="رقم المجلس" required>
                                </div>
                                <div class="form-group">
<input type="text"  name="fac_date" class="form-control"  placeholder="العام الجامعى">
                                </div>
                           
       <div class="form-group">
    <label  for="stat">الحالة:</label>
      
  <select name="stat" class="form-control" required>
 
       <option value="6">مقبول</option>
              <option value="7">مرفوض</option>



  </select>

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