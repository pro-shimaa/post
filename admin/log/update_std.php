<?php
session_start();
ob_start();
if($_SESSION['email']!=""){

include'l/header.php';
?>
<?php
include("../../connections/post.php");


?>

<?php
mysqli_set_charset($post,"utf8");
$query_Recordset1= "select * from all_data where email='".$_SESSION['email']."'";
$Recordset1 = mysqli_query($post, $query_Recordset1);
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
if($row_Recordset1['status']==2||$row_Recordset1['status']==0){	
$errMSG="";
// start insert code
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
	
	
	$textFile = $_FILES['file']['name'];

  $tmp_dir = $_FILES['file']['tmp_name'];
  $txtSize = $_FILES['file']['size'];
  
  $upload_dir = 'upload_update/'; // upload directory
 
   $txtExt = strtolower(pathinfo($textFile,PATHINFO_EXTENSION)); // get image extension
  
   // valid image extensions
   $valid_extensions = array('zip', 'rar'); // valid extensions
  
   // rename uploading image
   $usertext = rand(1000,1000000).".".$txtExt;
      // allow valid image file formats
	  $path=$upload_dir.$usertext;
   if(in_array($txtExt, $valid_extensions)){   
    // Check file size '5MB'
    if($txtSize < 500000000)    {
     move_uploaded_file($tmp_dir,$upload_dir.$usertext);
    }
    else{
     $errMSG = "Sorry, your file is too large.";
    }
   }
   else{
    $errMSG = "لم يتم اضافة التعديلات حيث ان الملف الذى قمت برفعه ليس امتدد zip او RAR  برجاء رفع الملفات مضغوطة بصيغة rar او zip";  
   }
   
if($errMSG ==""){

	
 mysqli_set_charset($post,"utf8");

$sql="update  temp set email = '".$_POST["email"]."',degree_id = '".$_POST["degree"]."' , arabic_name = '".$_POST["arname"]."',english_name= '".$_POST["ennmae"]."' ,gender = '".$_POST["inlineRadioOptions"]."' ,birthdate = '".$_POST["birthdate"]."' ,birthplace='".$_POST["birthplace"]."',country='".$_POST["country"]."' ,state='".$_POST["state"]."',region='".$_POST["region"]."',address='".$_POST["address"]."' ,phone_home='".$_POST["phone"]."' ,phone_mobile='".$_POST["mobile"]."',            id_number=".$_POST["id_no"].",id_place='".$_POST["id_place"]."',id_date='".$_POST["id_date"]."',jop='".$_POST["work"]."',jop_phone='".$_POST["work_phone"]."',dept_id='".$_POST["department"]."',special='".$_POST["special"]."',grad_place='".$_POST["grad_place"]."',grade_id='".$_POST["grade"]."',grade_year='".$_POST["grade_year"]."',upload_update_path='".$path."',
password='".$_POST["password"]."',update_std=1,status=8 where std_id=".$_POST["std_id"]."";
            mysqli_query($post, $sql);
			
header('Location: success_update.php');
exit;
 
}}


?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<body>

    <div class="container" >
        <div class="row" >
            <div class="col-md-29 col-md-offset-29" >
                <div class="register-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title" align="center">تسجيل الطالب للدراسات العليا</h3>

                        <h3 ><?php echo $errMSG;?></h3>
                    </div>
					
                    <div class="panel-body">
                     <form method="post"  class="mt-5 px-4" name="form1" action="update_std.php" enctype="multipart/form-data"> 
                            <fieldset>
                                <div class="form-group">
                 <input type="text"   class="form-control" name="arname" value="<?php echo $row_Recordset1['arabic_name'];?>" oninvalid="this.setCustomValidity('من فضلك ادخل الاسم رباعى باللغة العربية')" placeholder="الاسم رباعى باللغة العربية" autofocus required oninput="setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                <input type="text" class="form-control" id="inputName" value="<?php echo $row_Recordset1['english_name'];?>" name="ennmae" placeholder="الاسم رباعى اللغة الانجليزية" required="" oninvalid="this.setCustomValidity('من فضلك ادخل الاسم رباعى باللغة الانجليزية')"   oninput="setCustomValidity('')">
                                
                            </div>
                            <div class="form-group">
                                <input type="text" class=" form-control" id="inputAddress" name="email" placeholder="البريد الالكترونى " required="" value="<?php echo $row_Recordset1['email'];?>" oninvalid="this.setCustomValidity('من فضلك ادخل البريد الإليكترونى')"   oninput="setCustomValidity('')">
                            </div>
                       <div class="form-row">
                         <div class="form-group col-md-4">
                                    <input type="password" class="form-control" name="password" id="txtNewPassword" placeholder="كلمة المرور" required="" minlength="6" oninvalid="this.setCustomValidity('من فضلك ادخل الرقم السرى فيما لايقل عن 6 ارقام وحروف')"   oninput="setCustomValidity('')">
                               
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="password" class="form-control" name="repassword" id="txtConfirmPassword" placeholder="اعادة كلمة المرور" required>
                                   
                         </div>
                                <div class="registrationFormAlert col-md-4" style="color:green;" id="CheckPasswordMatch"></div>
                            </div>
                            </div>
                            <div class="form-group" col-md-8>
    <label  for="degree">الدرجة المتقدم لها:</label>
      <select name="degree"class=" form-control"  required>
      
      <?php
        $records = mysqli_query($post, "SELECT * From degree");  // Use select query here 

        while($d = mysqli_fetch_array($records))
        {
           ?> 
  
  <option value="<?php echo ($d['degree_id']); ?>"  <?php if($d['degree_id']==$row_Recordset1['degree_id']){?> selected="selected"<?php }?>><?php echo $d['degree']?></option>
  
  
      <?php  }	
    ?>
    </select>

 
     

  </div>
  
                                                    <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="alaa form-control phoneNum" value ="<?php echo $row_Recordset1['phone_home'];?>" name="phone" id="inputPhone"
                                        placeholder="رقم التليفون">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control phoneNum" name="mobile" id="inputPhone2"
                                        placeholder="رقم المحمول " required="" value ="<?php echo $row_Recordset1['phone_mobile'];?>" oninvalid="this.setCustomValidity('من فضلك ادخل رقم الهاتف المحمول الخاص بك')"   oninput="setCustomValidity('')">
                                </div>
                            </div>
                            
                          
    
                        
    
                            <div class="form-group">
                                <label class="form-check-label check">الجنس:</label>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                            id="inlineRadio1" value="1" checked> ذكر
                                    </label>
                                
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                            id="inlineRadio2" value="2"> انثى
                                    </label>
                                </div>
                            </div>
                            <div class="form-row">
                                                            <div class="form-group col-md-1">

                                                                <label>تاريخ الميلاد </label>
                              </div>
                                                                                                <div class="form-group col-md-11">


                                <input type="date" class=" form-control" name="birthdate" value="<?php echo $row_Recordset1['birthdate'];?>" id="inputAddress" placeholder="تاريخ الميلاد " required="" oninvalid="this.setCustomValidity('من فضلك ادخل تاريخ الميلاد')"   oninput="setCustomValidity('')">
                            </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class=" form-control" id="inputAddress" name="birthplace" placeholder="جهة الميلاد " required="" oninvalid="this.setCustomValidity('من فضلك ادخل  جهة الميلاد')"  value="<?php echo $row_Recordset1["birthplace"];?>" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <input type="text" name="state" class="alaa form-control phoneNum" id="inputPhone"
                                        placeholder="البلد" value="<?php echo $row_Recordset1["state"];?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control phoneNum" value="<?php echo $row_Recordset1["region"];?>" name="region" id="inputPhone2"
                                        placeholder="المركز ">
                                </div>
                            <div class="form-group col-md-4">
                                    <input type="text" class="form-control phoneNum" name="country" id="inputPhone2"
                                    value="<?php echo $row_Recordset1["country"];?>"    placeholder="المحافظة " required="" oninvalid="this.setCustomValidity(' من فضلك ادخل  المحافظة   ')"   oninput="setCustomValidity('')">
                              </div>    
                            </div>
                            
                            <div class="form-group">
  <input type="text" class=" form-control" name="address" id="inputAddress" value="<?php echo $row_Recordset1["address"];?>" placeholder="عنوان محل الاقامة الذى يتم ارسال الخطابات عليه " required="" oninvalid="this.setCustomValidity('من فضلك ادخل عنوان محل الاقامة الذى سيتم ارسال الخطابات عليه')"   oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
 <input type="text" class=" form-control" name="id_no" id="inputAddress" placeholder="بطاقة الرقم القومى " required="" oninvalid="this.setCustomValidity('من فضلك ادخل رقم البطاقة المكون من 14 رقم')"   oninput="setCustomValidity('')" minlength="14" maxlength="14" value="<?php echo $row_Recordset1['id_number'];?>">
                            </div>
                                <div class="form-row">
                                <div class="form-group col-md-6">
   <input type="text" class="alaa form-control phoneNum" name="id_place" id="inputPhone" value="<?php echo $row_Recordset1["id_place"];?>"
    placeholder="جهة صدورها" required="" oninvalid="this.setCustomValidity('من فضلك ادخل جهة صدور البطاقة')"   oninput="setCustomValidity('')">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control phoneNum" id="inputPhone2" name="id_date"
        placeholder="تاريخ الصدور " value="<?php echo $row_Recordset1["id_date"];?>" required="" oninvalid="this.setCustomValidity('من فضلك ادخل تاريخ الصدور')"   oninput="setCustomValidity('')">
                                </div>
                            </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="alaa form-control phoneNum" value="<?php echo $row_Recordset1["jop"];?>" name="work" id="inputPhone"
                                        placeholder="جهة العمل وعنوانه">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control phoneNum" id="inputPhone2" name="work_phone"
                                        placeholder="تليفون العمل " value="<?php echo $row_Recordset1["jop_phone"];?>">
                                </div>
                            </div>
                <div class="form-group">
    <label  for="department">	القسم:</label>
      
  <select name="department"class=" form-control"  required>
     <?php
        $records = mysqli_query($post, "SELECT * From department");  // Use select query here 

        while($d = mysqli_fetch_array($records))
        {
           ?> 
  
  <option value="<?php echo ($d['dept_id']); ?>"  <?php if($d['dept_id']==$row_Recordset1['dept_id']){?> selected="selected"<?php }?>><?php echo $d['dept_name']?></option>
  
  
      <?php  }	?>
  </select>

  </div>
      <div class="form-group">
            <input type="text" class=" form-control" name="special" id="inputAddress" placeholder="التخصص المكتوب فى الشهادة المؤقته " required="" oninvalid="this.setCustomValidity('من فضلك ادخل التخصص المكتوب فى الشهادة')" value="<?php echo $row_Recordset1["special"];?>"  oninput="setCustomValidity('')">
                       </div>
                            
                            <div class="form-group">
                      <input type="text" class=" form-control" name="grad_place" id="inputAddress" placeholder="جهة التخرج " required="" oninvalid="this.setCustomValidity('من فضلك ادخل جهة التخرج')"  value="<?php echo $row_Recordset1["grad_place"];?>" oninput="setCustomValidity('')">
                            </div>
                              <div class="form-group">
    <label  for="grade">:التقدير التراكمى	</label>
        <select name="grade" class=" form-control"  required>

    <?php
        $records = mysqli_query($post, "SELECT * From grade");  // Use select query here 

        while($d = mysqli_fetch_array($records))
        {
           ?> 
  
  <option value="<?php echo ($d['grade_id']); ?>"  <?php if($d['grade_id']==$row_Recordset1['grade_id']){?> selected="selected"<?php }?>><?php echo $d['grade']?></option>
  
  
      <?php  }	?>
  </select>


  </div>

                            <div class="form-group">
                      <input type="text" class=" form-control" id="inputAddress" required="" oninvalid="this.setCustomValidity('من فضلك ادخل سنة التخرج')"   oninput="setCustomValidity('')" name="grade_year" value="<?php echo $row_Recordset1["grade_year"];?>" placeholder="سنة التخرج ">
                       </div>
                                                  <div class="form-group">
 <label>ادخل الاوراق المطلوبة بعد ضغطها zip او rar هى الامتدادات المسموح فقط برفعها </label>
                      <input type="file" class=" form-control" id="inputAddress" name="file" required="" oninvalid="this.setCustomValidity('من فضلك ادخل االورق المطلوب مضغوط بصيغة RAR او ZIP ')"   oninput="setCustomValidity('')">
                                                  </div>  
                                                   
                                                  
                                                    <input type="hidden" name="MM_insert" value="form1" />
                 
                            <button id="addBtn" type="submit" class="btn btn-lg btn-success btn-block"> تــعـديــل</button>
<input type="hidden" name="std_id" value="<?php echo $row_Recordset1['std_id'];?>">    
    
              </div>
                    <div class="col-md-1"></div>
    
    
          </div>
      </div>
                            </fieldset>
                        </form>
</div>
    </div>
            </div>
        </div>
    </div>
<script>
	var password = document.getElementById("txtNewPassword")
  , confirm_password = document.getElementById("txtConfirmPassword");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
	</script>

<?php 

}
else
{
	echo'<div align="center"> <h2><strong> غير مسموح بتعديل البيانات حاليا</strong></h2></div>';
	}

 include'l/footer.php';
}


else
{
	
	header('Location: login.php');
exit;
	}
?>