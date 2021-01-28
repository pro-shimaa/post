<?php
ob_start();
session_start();
if($_SESSION['acc_lvl']==2||$_SESSION['acc_lvl']==3){
include("../../connections/post.php");
include"e/header.php";
include"e/menu.php";//define total number of results you want per page  

    $results_per_page = 10;  
  
    //find the total number of results stored in the database  
    $query = "select *from temp where status=1 and dept_id=6";  
    $result = mysqli_query($post, $query);  
    $number_of_result = mysqli_num_rows($result);  
  
    //determine the total number of pages available  
    $number_of_page = ceil ($number_of_result / $results_per_page);  
  
    //determine which page number visitor is currently on  
    if (!isset ($_GET['page']) ) {  
        $page = 1;  
    } else {  
        $page = $_GET['page'];  
    }  
  
    //determine the sql LIMIT starting number for the results on the displaying page  
    $page_first_result = ($page-1) * $results_per_page;  
  
    //retrieve the selected results from database   
    $query = "SELECT *FROM temp where status=1 and dept_id=6 LIMIT " . $page_first_result . ',' . $results_per_page;  
    $result = mysqli_query($post, $query);  
      
    //display the retrieved result on the webpage 
?>

<body>

    <div id="wrapper">



        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                
                
                    <h1 class="page-header"  style="color:#900">الطلاب المكتملة اوراقهم بقسم النظم والحاسبات</h1>
                    
                    
                    
                </div>
                <!-- /.col-lg-12 -->
       
<table class="table" align="center width="100%">

    <tr align="center" style="background-color:coral; font-weight: bold;">
      
      <td width="97"><strong> الاسم باللغة العربية  </strong></td>

                            <td width="85"><strong> البريد الإليكترونى  </strong></td>

                        <td width="70"><strong> رقم المحمول  </strong></td>
                        <td width="70">اضافة خطة البحث</td>

                                            <td width="70"><strong>اضافة المواد التخصصيه للطلاب  </strong></td>
                                            <td width="70"><strong>اضافة المشرفين   </strong></td>
                                        <td width="70"><strong>اضافة موافقة مجلس القسم   </strong></td>


    </tr>
     <?php while ($row = mysqli_fetch_array($result)) {  ?>
    
<tr align="center">
        
        <td><?php echo $row['arabic_name']; ?></td>

      <td><?php echo $row['email']; ?></td>
      
      <td><?php echo $row['phone_mobile']; ?></td>
      <td><a href="view_seminar.php?id=<?php echo $row['std_id'];?>">اضغط هنا </a></td>
      <td><a href="view_subject.php?id=<?php echo $row['std_id'];?>">اضغط هنا </a></td>
      <td><a href="view_supervision.php?id=<?php echo $row['std_id'];?>">اضغط هنا </a></td>
      <td><a href="add_coun_approval.php?id=<?php echo $row['std_id'];?>">اضغط هنا </a></td>

             </tr>
			    <?php
    }  
  
  
    //display the link of the pages in URL  
   
?>                                  </table>
<div align='center'>
<?php 
                 for($page = 1; $page<= $number_of_page; $page++) {  
        echo '<a href = "sys.php?page=' . $page . '">' . $page . ' </a>';  
    }  
  
                

  ?>
  
  </div>
<form class="form-horizontal" action="me.php" method="post" name="upload_excel"  
                      enctype="multipart/form-data">
                  <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                                <input type="submit" name="Export" class="btn btn-success" value="تحميل ملف excel"/>
                            </div>
                   </div>                    
            </form>   
  
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