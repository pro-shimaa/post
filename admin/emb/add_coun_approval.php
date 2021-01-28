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
 if($_POST["stat"]==4)
{
$sql = "update temp set coun_no='".mysqli_real_escape_string($post,$_POST["no"])."' ,coun_date='".mysqli_real_escape_string($post,$_POST["coun_date"])."',ar_title='".mysqli_real_escape_string($post,$_POST["ar_title"])."',en_title='".mysqli_real_escape_string($post,$_POST["en_title"])."',sample='".mysqli_real_escape_string($post,$_POST["sample"])."' ,status='".mysqli_real_escape_string($post,$_POST["stat"])."' where std_id='".mysqli_real_escape_string($post,$_POST["std"])."'";
 mysqli_query($post, $sql);
header('Location:success.php');
exit;
}

if($_POST["stat"]==5)
{
$sql1 = "update temp set coun_no='".mysqli_real_escape_string($post,$_POST["no"])."' ,coun_date='".mysqli_real_escape_string($post,$_POST["coun_date"])."',ar_title='".mysqli_real_escape_string($post,$_POST["ar_title"])."',en_title='".mysqli_real_escape_string($post,$_POST["en_title"])."',sample='".mysqli_real_escape_string($post,$_POST["sample"])."',status='".mysqli_real_escape_string($post,$_POST["stat"])."' where std_id='".mysqli_real_escape_string($post,$_POST["std"])."'";
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
                
                
                    <h1 class="page-header">اضافة مجلس القسم</h1>
                    
                    
                    
                </div>
                <!-- /.col-lg-12 -->
 

  
                   
                    <div class="panel-body">
                        <form method="post"  class="mt-5 px-4" name="form1" action="add_coun_approval.php" > 
                            
                                <div class="form-group">
<input type="text"  name="no" class="form-control" placeholder="رقم المجلس" required>
                                </div>
                                <div class="form-group">
<input type="text"  name="coun_date" class="form-control"  placeholder="العام الجامعى">
                                </div>
                          

       <div class="form-group">
    <label  for="stat">الحالة:</label>
      
  <select name="stat" class="form-control" required>
 
       <option value="4">مقبول</option>
              <option value="5">مرفوض</option>



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