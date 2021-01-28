

<?php
session_start();
include("../../connections/post.php");
include"e/header.php";
include"e/menu.php";
mysqli_set_charset($post,"utf8");
 $query_Recordset1= "select * from login where username='".mysqli_real_escape_string($post,$_SESSION['name'])."'";

$Recordset1 = mysqli_query($post,$query_Recordset1);
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
date_default_timezone_set("Africa/Cairo");
$d=date("Y-m-d h:i:sa");
$sql1 = "update login set lastlogin='".$d."' where username='".mysqli_real_escape_string($post,$_SESSION['name'])."'";

 mysqli_query($post, $sql1);
?>

      <div id="page-wrapper">
          <div class="row">
              <div class="col-lg-12">
                  <h1 class="page-header">الرئيسية</h1>
              </div>
              <!-- /.col-lg-12 -->
          </div>
          <!-- /.row -->
          <h1 class="page-header"> مرحبا  <?php echo $row_Recordset1['name']; ?></h1>
                  <?php if($row_Recordset1['lastlogin']!=null){?>
                  <h3> اخر دخول كان بتاريخ <?php echo $row_Recordset1['lastlogin'];}?> </h3>
                    
          <div class="row">
              <div class="col-lg-3 col-md-6">                     
                               
                                
               
                      </div>
                      <?php
include"e/footer.php";
?>