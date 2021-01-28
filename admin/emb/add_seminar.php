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

$sql2 = "update temp set  ar_title='".mysqli_real_escape_string($post,$_POST["ar_title"])."',en_title='".mysqli_real_escape_string($post,$_POST["en_title"])."',sample='".mysqli_real_escape_string($post,$_POST["sample"])."' where std_id='".mysqli_real_escape_string($post,$_POST["std"])."'";
 mysqli_query($post, $sql2);
header('Location: view_seminar.php?id='.mysqli_real_escape_string($post,$_POST["std"]));
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
                
                
                    <h1 class="page-header">اضافة خطة البحث</h1>
                    
                    
                    
                </div>
                <!-- /.col-lg-12 -->
 

  
                   
                    <div class="panel-body">
                        <form method="post"  class="mt-5 px-4" name="form1" action="add_seminar.php" > 
                            
                                <div class="form-group">
<input type="text"  name="ar_title" class="form-control" placeholder="عنوان البحث باللغة العربية" required="" oninvalid="this.setCustomValidity('من فضلك ادخل عنوان البحث باللغة العربية')"   oninput="setCustomValidity('')">
                                </div>
                                <div class="form-group">
<input type="text"  name="en_title" class="form-control"  placeholder="عنوان البحث اللغة الانجليزية" required="" oninvalid="this.setCustomValidity('من فضلك ادخل عنوان البحث باللغة الانجليزية')"   oninput="setCustomValidity('')">
                                </div>
                            <div class="form-group">
<label >نبذة عن البحث مقدمة باللغة العربية:</label>
<textarea  name="sample" rows="4" cols="50" class="form-control" required="" oninvalid="this.setCustomValidity('من فضلك ادخل ملخض البحث باللغة العربية       ')"   oninput="setCustomValidity('')"></textarea>
</div>                            

                                
                                        <input type="hidden" name="std" value="<?php echo $_GET['id'];?>" />

                                                    <input type="hidden" name="MM_insert" value="form1" />
                 
                            <button id="addBtn" type="submit" class="btn btn-lg btn-success btn-block"> تــعديـل / اضافة </button>
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