<?php
session_start();
if($_SESSION['email']!=""){

include("../../connections/post.php");
include"l/header.php";
include"l/menu.php";
mysqli_set_charset($post,"utf8");
 $query_Recordset1= "select * from temp where email='".mysqli_real_escape_string($post,$_SESSION['email'])."'";
$Recordset1 = mysqli_query($post,$query_Recordset1);
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
date_default_timezone_set("Africa/Cairo");
$d=date("Y-m-d h:i:sa");
$sql1 = "update temp set last_login='".$d."' where email='".mysqli_real_escape_string($post,$_SESSION['email'])."'";

 mysqli_query($post, $sql1);
?>

<body>

    <div id="wrapper">



        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                              <div align="left"><button type="button" class="btn btn-info btn-lg"><a href="logout.php">خروج</a></button></div>

                    <h1 class="page-header"> مرحبا  <?php echo $row_Recordset1['arabic_name']; ?></h1>

                    <?php if($row_Recordset1['last_login']!=null){?>

                    <h3> اخر دخول كان بتاريخ <?php echo $row_Recordset1['last_login'];}?> </h3>
                    
                    
                    <div align="right" style="color:#900"><h1>حالة الطلب المقدم<h1> </div>
                    <div><?php 
					
					 $stat=$row_Recordset1['status'] ;
		if($stat==0)
		{
			echo'<h2>الطلب قيد المراجعة<h2>';
							echo '<p>'.$row_Recordset1['comment']; 

			}			
			elseif($stat==1)
			{
			echo'<h3>  الطلب مكتمل جارى العرض على مجلس القسم برجاء التواصل مع القسم لرفع خطة البحث</h3>';
							echo '<h3>'.$row_Recordset1['comment'].'</h3>'; 

			}
			elseif($stat==2)
			{
				echo'<h3>الطلب غير مكتمل برجاء تعديل البيانات </h3>';
				echo '<h3>'.$row_Recordset1['comment'].'</h3>'; 
				echo'<h3><a href="update_std.php">تعديل</a></h3>';
				}
			elseif($stat==3)
			{
				echo'<h3> الطلب مرفوض</h3>';
				echo '<h3>'.$row_Recordset1['comment'].'</h3>'; 
				}
				
				elseif($stat==4)
			{
				echo'<h3>تم الموافقة على الطلب من قبل مجلس القسم -- جارى العرض على مجلس الكلية</h3>';
				}
				
				elseif($stat==5)
			{
				echo'<h3>تم رفض الطلب من قبل مجلس القسم </h3>';
				}
				elseif($stat==6)
			{
				echo'<h3>تم الموافقة على الطلب من قبل مجلس الكلية</h3>';
				}
				elseif($stat==7)
			{
				echo'<h3>تم رفض الطلب من قبل مجلس الكلية </h3>';
				}
				elseif($stat==8)
			{
				echo'<h3>الطلب قيد المراجعة </h3>';
				}
					?></div>
                </div>
                <!-- /.col-lg-12 -->
       
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
include"e/footer.php";}
else 
{
header('Location: login.php');
exit;
}

?>