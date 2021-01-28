<?php
include("../../connections/post.php");
session_start();
if($_SESSION['acc_lvl']==2||$_SESSION['acc_lvl']==3){
include"e/header.php";
include"e/menu.php";

?>

<?php
// start insert code
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {

 mysqli_set_charset($post,"utf8");

$sql = "INSERT INTO prof(prof_name,prof_degree_id,dept_id,email,pass_word,acc_lvl) VALUES ('".mysqli_real_escape_string($post,$_POST["prof_name"])."',
'".mysqli_real_escape_string($post,$_POST["degree"])."','".mysqli_real_escape_string($post,$_POST["dept"])."','".mysqli_real_escape_string($post,$_POST["email"])."','".mysqli_real_escape_string($post,$_POST["password"])."',4)";
 mysqli_query($post, $sql);

}

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<body>

    <div id="wrapper">



        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                
                
                    <h1 class="page-header">اضافة عضو هيئة تدريس</h1>
                    
                    
                    
                </div>
                <!-- /.col-lg-12 -->
         <div class="panel-body">
                        <form method="post"  class="mt-5 px-4" name="form1" action="add_prof.php" > 

  <div class="form-group">
    <label  for="department">		القسم:</label>
      
  <select name="dept"class=" form-control"  required>
    <?php
        $records = mysqli_query($post, "SELECT * From department");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['dept_id'] ."'>" .$data['dept_name'] ."</option>";  // displaying data in option menu
        }	
    ?> 
     
  </select>

  </div>
                            <div class="form-group">
    <label  for="degree">الدرجة:</label>
      
  <select name="degree" class="form-control" required>
    <?php
        $records = mysqli_query($post, "SELECT * From prof_degree");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['prof_degree_id'] ."'>" .$data['prof_degree'] ."</option>";  // displaying data in option menu
        }	
    ?> 
     
  </select>


  </div>
  

                                   <div class="form-group">
                                <input type="text" class="form-control" id="inputName" name="prof_name" placeholder="الاسم رباعى " required="" oninvalid="this.setCustomValidity('من فضلك ادخل الاسم الرباعى لعضو هيئة التدريس')"   oninput="setCustomValidity('')">
                                
                            </div>
                            
                                   <div class="form-group">
                                <input type="text" class="form-control" id="inputName" name="email" placeholder="البريد الاليكترونى " required="" oninvalid="this.setCustomValidity('من فضلك اضف البريد الاليكترونى لعضو هيئة التدريس')"   oninput="setCustomValidity('')">
                                
                            </div>
                            <div class="form-group">
            <input type="text" class="form-control" id="inputName" name="password" placeholder="الرقم السرى " required="" oninvalid="this.setCustomValidity('من فضلك ادخل الرقم السرى')"   oninput="setCustomValidity('')">
                                
                            </div>
                            
                            
                                  
                                                    <input type="hidden" name="MM_insert" value="form1" />
                 
                            <button id="addBtn" type="submit" class="btn btn-lg btn-success btn-block"> تسـجيـل</button>
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
{
	echo'<h2 align="center">غير مسموح بدخول هذه الصفحة</h2>';
	}
?>