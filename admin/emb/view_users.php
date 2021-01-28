<?php
ob_start();
include("../../connections/post.php");
session_start();
if($_SESSION['acc_lvl']==3){
include"e/header.php";
include"e/menu.php";//define total number of results you want per page  
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {
  $sql= "delete from login  WHERE id=".mysqli_real_escape_string($post,$_POST["id"])." ";
 mysqli_query($post, $sql);
header("Location: view_users.php?id=".mysqli_real_escape_string($post,$_POST["id"]));
exit;	

}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form3")) {
  $sql= "update login set username='".mysqli_real_escape_string($post,$_POST["username"])."',name='".mysqli_real_escape_string($post,$_POST["name"])."',password='".mysqli_real_escape_string($post,$_POST["password"])."' where id=".mysqli_real_escape_string($post,$_POST["id"])."";
 mysqli_query($post, $sql);
header("Location: view_users.php?id=".mysqli_real_escape_string($post,$_POST["id"]));
exit;	

}


    $results_per_page = 20;  
  
    //find the total number of results stored in the database  
    $query = "select *from login ";  
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
    $query = "SELECT *FROM login  LIMIT " . $page_first_result . ',' . $results_per_page;  
    $result = mysqli_query($post, $query);  
      
    //display the retrieved result on the webpage 
?>

<body>

    <div id="wrapper">



        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                
                
                    <h1 class="page-header">المستخدمين</h1>
                    <h3><a href="add_new_user.php">اضف مستخدم جديد</a></h3>
                    
                    
                </div>
                <!-- /.col-lg-12 -->
       
<table class="table table-striped" align="center width="100%">

    <tr align="center" style="background-color:#92a8d1; font-weight: bold;">
      
      <td width="97"><strong> الاسم   </strong></td>

                            <td width="85"><strong> الريد الاليكترونى  </strong></td>
                            <td width="85"><strong>اخر ظهور  </strong></td>
                            <td width="85">حـــذف</td>
                            <td width="85">تـــعــديـل</td>

                       
    </tr>
     <?php while ($row = mysqli_fetch_array($result)) {  ?>
    
<tr align="center">
        
        <td><?php echo $row['name']; ?></td>

      <td><?php echo $row['username']; ?></td>
      <td><?php echo $row['lastlogin']; ?></td>
      <td><form method="post" name="form2" action="view_users.php">
            
               <input type="submit" class="btn btn-danger" value="حذف">
            
            <input type="hidden" name="MM_update" value="form2">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

          </form></td>
      <td><form method="post" name="form3" action="view_users.php">
            <div class="form-group">
<input type="text"  name="name" class="form-control" placeholder="الاسم" required value="<?php echo $row['name']?>">
                                </div>
                                 <div class="form-group">
<input type="text" id="email"  name="username" class="form-control" placeholder="اسم المستخدم" required value="<?php echo $row['username'];?>">
                                </div>
                                <div class="form-group">
<input type="text"  name="password" class="form-control"  placeholder="الرقم السرى" required value="<?php echo $row['password'];?>">
                                </div>
               <input type="submit" class="btn btn-danger" value="تــعـــديــل">
            
            <input type="hidden" name="MM_update" value="form3">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

          </form></td>
      
      
             </tr>
			    <?php
    }  
  
  
    //display the link of the pages in URL  
   
?>                                  </table>

  
  <div align='center'>
<?php 
                 for($page = 1; $page<= $number_of_page; $page++) {  
        echo '<a href = "view_users?page=' . $page . '">' . $page . ' </a>';  
    }  
  
                

  ?>
  
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