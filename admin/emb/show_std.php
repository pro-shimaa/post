<?php
session_start();
if($_SESSION['acc_lvl']==2||$_SESSION['acc_lvl']==3){
include("../../connections/post.php");

include"e/header.php";

include"e/menu.php";

 mysqli_set_charset($post,"utf8");
 $query_Recordset1= "select * from all_data where std_id=".mysqli_real_escape_string($post,$_GET["id"])."";
$Recordset1 = mysqli_query($post, $query_Recordset1);

?>

<style type="text/css">
#wrapper #page-wrapper .row .table.table-striped {
	font-size: 24px;
}
</style>
<body>

    <div id="wrapper">



        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                
                
                    <h1 class="page-header" style="color:#900">عرض بيانات الطالب</h1>
                    
                  <h3 align="left"><a href="add_std.php?id=<?php echo $_GET["id"];?>">back</a></h3>  
                    
        </div>
                <!-- /.col-lg-12 -->
       <div id="GFG" dir="rtl" align="center" width="100%">
<table class="table table-striped" align="center width="100%" dir="rtl">

   
      <?php  while($row_Recordset1 = mysqli_fetch_assoc($Recordset1)) 
     { 
	 ?>
      <tr align="right">
        
        <td ><strong>الاسم رباعى باللغة العربية</strong></td>
        <td><?php echo $row_Recordset1['arabic_name']; ?></td>
</tr>
<tr align="right">
        
        <td><strong>الاسم رباعى باللغة الانجليزية</strong></td>
        <td><?php echo $row_Recordset1['english_name']; ?></td>
</tr>
      <tr align="right">
        
        <td><strong>البريد الإليكترونى</strong></td>
        <td><?php echo $row_Recordset1['email']; ?></td>
</tr>

<tr align="right">
        
        <td><strong>تاريخ الميلاد</strong></td>
        <td><?php echo $row_Recordset1['birthdate']; ?></td>
</tr>
<tr align="right">
        
        <td><strong>مكان الميلاد</strong></td>
        <td><?php echo $row_Recordset1['birthplace']; ?></td>
</tr>
<tr align="right">
        
        <td><strong>المحافظة</strong></td>
        <td><?php echo $row_Recordset1['country']; ?></td>
</tr>
<tr align="right">
        
        <td><strong>البلد</strong></td>
        <td><?php echo $row_Recordset1['state']; ?></td>
</tr>
<tr align="right">
        
        <td><strong>المركز</strong></td>
        <td><?php echo $row_Recordset1['region']; ?></td>
</tr>
<tr align="right">
        
        <td><strong>العنوان</strong>	</td>
        <td><?php echo $row_Recordset1['address']; ?></td>
</tr>
<tr align="right">
        
        <td><strong>رقم التليفون	</strong></td>
        <td><?php echo $row_Recordset1['phone_home']; ?></td>
</tr>
<tr align="right">
        
        <td><strong>رقم المحمول</strong>	</td>
        <td><?php echo $row_Recordset1['phone_mobile']; ?></td>
</tr>
<tr align="right">
        
        <td><strong>الرقم القومى	</strong></td>
        <td><?php echo $row_Recordset1['id_number']; ?></td>
</tr>
<tr align="right">
        
        <td><strong>مكان صدورها</strong>	</td>
        <td><?php echo $row_Recordset1['id_place']; ?></td>
</tr>
<tr align="right">
        
        <td><strong>تاريخ الصدور	</strong></td>
        <td><?php echo $row_Recordset1['id_date']; ?></td>
</tr>
<tr align="right">
        
        <td><strong>الوظيفه</strong>	</td>
        <td><?php echo $row_Recordset1['jop']; ?></td>
</tr>
<tr align="right">
        
        <td><strong>رقم هاتف العمل</strong>	</td>
        <td><?php echo $row_Recordset1['jop_phone']; ?></td>
</tr>

<tr align="right">
        
        <td></strong>القسم</strong></td>
        <td><?php echo $row_Recordset1['dept_name']; ?></td>
</tr>
<tr align="right">
        
        <td><strong> التخصص المكتوب فى الشهادة</strong></td>
        <td><?php echo $row_Recordset1['special']; ?></td>
</tr>
<tr align="right">
        
        <td><strong>جهة التخرج</strong></td>
        <td><?php echo $row_Recordset1['grad_place']; ?></td>
</tr>
<tr align="right">
        
        <td><strong>الدرجة المتقدم لها</strong></td>
        <td><?php echo $row_Recordset1['degree']; ?></td>
</tr>
<tr align="right">
        
        <td><strong>سنة التخرج</strong></td>
        <td><?php echo $row_Recordset1['grade_year']; ?></td>
</tr>
				
		<?php }  
         
		 
		 
	
 ?>

  </table>          
    
  </div> 
       <input type="button" class="btn btn-danger btn-lg" value="طباعة " onClick="printDiv()">  

                           </div>
                            </div>


                
                

  
  
  
  
  
  </main>


     </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>

    <!-- /#wrappe
    
    <!-- Script to print the content of a div -->
    <script> 
        function printDiv() { 
            var divContents = document.getElementById("GFG").innerHTML; 
            var a = window.open('', '', 'height=1000, width=1000'); 
            a.document.write(divContents); 
            a.document.close(); 
            a.print(); 
        } 
    </script> 
<?php
include"e/footer.php";
}
else
{
	echo'<h2 align="center">غير مسموح بدخول هذه الصفحة</h2>';
	}
?>