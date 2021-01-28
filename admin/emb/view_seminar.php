<?php
session_start();
if($_SESSION['acc_lvl']==2||$_SESSION['acc_lvl']==3){
include("../../connections/post.php");

include"e/header.php";
include"e/menu.php";//define total number of results you want per page  
    $results_per_page = 20;  
  
    //find the total number of results stored in the database  
    $query = "select *from subject where std_id='".mysqli_real_escape_string($post,$_GET["id"])."'";  
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
    $query = "SELECT *FROM temp  where std_id='".mysqli_real_escape_string($post,$_GET["id"])."' LIMIT " . $page_first_result . ',' . $results_per_page;  
    $result = mysqli_query($post, $query);  
      
    //display the retrieved result on the webpage 
?>

<body>

    <div id="wrapper">



        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                
                
                    <h1 class="page-header">خطة البحث</h1>
                    <h3><a href="add_seminar.php?id=<?php echo $_GET["id"];?>"><u>اضف خطة البحث</u></a></h3>
                    
                    
                </div>
                <!-- /.col-lg-12 -->
       
<table class="table table-striped" align="center width="100%">

    <tr align="center" style="background-color:#92a8d1">
      
      <td width="97"><strong> عنوان البحث باللغة العربية  </strong></td>

                            <td width="85"><strong> عنوان البحث باللغة الانجليزية  </strong></td>

                                                   <td width="85"><strong> نبذه عن البحث باللغة العربية  </strong></td>

    </tr>
     <?php while ($row = mysqli_fetch_array($result)) {  ?>
    
<tr align="center">
        
        <td><?php echo $row['ar_title']; ?></td>

      <td><?php echo $row['en_title']; ?></td>
            <td><?php echo $row['sample']; ?></td>

      
      
             </tr>
			    <?php
    }  
  
  
    //display the link of the pages in URL  
   
?>                                  </table>

  
  
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