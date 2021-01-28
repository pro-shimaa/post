<?php
ob_start();
session_start();
if($_SESSION['acc_lvl']==2||$_SESSION['acc_lvl']==3){
include("../../connections/post.php");
include"e/header.php";
//include"e/menu.php";

?>

<?php
// start insert code
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {

 mysqli_set_charset($post,"utf8");
 date_default_timezone_set("Africa/Cairo");
$d=date("Y-m-d h:i:sa");
$sql = "INSERT INTO history(hist_date,reg_status,std_id,comment) VALUES ('".$d."','".mysqli_real_escape_string($post,$_POST["stat"])."','".mysqli_real_escape_string($post,$_POST["std"])."','".mysqli_real_escape_string($post,$_POST["status"])."')";
 mysqli_query($post, $sql);
 if($_POST["stat"]==1)
{
	$sql1 = "update temp set status=1,comment='".mysqli_real_escape_string($post,$_POST["status"])."'  where std_id=".mysqli_real_escape_string($post,$_POST["std"])."";
 mysqli_query($post, $sql1);
 header('Location: add_std.php?id='.mysqli_real_escape_string($post,$_POST["std"]));
exit;

	}	
	
	if($_POST["stat"]==2)
{
	$sql2 = "update temp set status=2 , comment='".$_POST["status"]."' where std_id='".$_POST["std"]."'";
 mysqli_query($post, $sql2);
  header('Location: add_std.php?id='.$_POST["std"]);
exit;
	}	
	if($_POST["stat"]==3)
{
	$sql3 = "update temp set status=3 and comment='".$_POST["status"]."' where std_id='".$_POST["std"]."'";
 mysqli_query($post, $sql3);
  header('Location: add_std.php?id='.$_POST["std"]);
exit;
	}			
}

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<body>

    <div id="wrapper">



        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                
                
                    <h1 class="page-header">اضافة حالة للطالب</h1>
                    
                    
                    
                </div>
                <!-- /.col-lg-12 -->


  
                   
                    <div class="panel-body">
                        <form method="post"  class="mt-5 px-4" name="form1" action="add_status.php" > 
                            <div class="form-group">
    <label  for="stat">الحالة:</label>
      
  <select name="stat" class="form-control" required>
 
       <option value="1">مكتمل</option>
              <option value="2">غير مكتمل</option>

              <option value="3">مرفوض</option>


  </select>

  </div>
  

                                <div class="form-group">
<label for="w3review">تعليق:</label>
<textarea  name="status" rows="4" cols="50" class="form-control" required="" oninvalid="this.setCustomValidity('من فضلك قم بادخال تعليق مناسب للطالب  ')"   oninput="setCustomValidity('')"></textarea>
                                </div>
                            
                                
                                        <input type="hidden" name="std" value="<?php echo $_GET['id'];?>" />

                                                    <input type="hidden" name="MM_insert" value="form1" />
                 
                            <button id="addBtn" type="submit" class="btn btn-lg btn-success btn-block"> اضــافـة</button>
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
    <!-- /#wrappe
<?php
include"e/footer.php";
}
else

{	echo'<h2 align="center">غير مسموح بدخول هذه الصفحة</h2>';
}

?>