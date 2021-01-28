<?php
ob_start();
include'l/header.php';
?>
<?php
include("../../connections/post.php");

?>

<?php
$errMSG="";
// start insert code
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
	
	
	$textFile = $_FILES['file']['name'];

  $tmp_dir = $_FILES['file']['tmp_name'];
  $txtSize = $_FILES['file']['size'];
  
  $upload_dir = 'upload/'; // upload directory
 
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
    $errMSG = "لم يتم ادخال بياناتك بطريقه صحيحة حيث انك قمت برفع الملفات بامتداد غير مقبول . برجاء ضغط الملفات قبل رفعها حيث انا الامتداد المسموح به RAR او ZIP";  
   }
   
if($errMSG ==""){

	$sql2="SELECT arabic_name from temp where email='".mysqli_real_escape_string($post,$_POST["email"])."'";

$result2=mysqli_query($post,$sql2);
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result2);
  if($rowcount>=1)
  $errMSG="تم تسجيل هذا الايميل من قبل";
  else
  {
 mysqli_set_charset($post,"utf8");

$sql = "INSERT INTO temp(email,degree_id,arabic_name,english_name,gender,birthdate,birthplace,country,state,region,address,phone_home,phone_mobile,id_number,id_place,id_date,jop,jop_phone,dept_id,special,grad_place,grade_id,grade_year,upload_path,password,acc_lvl,status) VALUES ('".mysqli_real_escape_string($post,$_POST["email"])."','".mysqli_real_escape_string($post,$_POST["degree"])."','".mysqli_real_escape_string($post,$_POST["arname"])."','".mysqli_real_escape_string($post,$_POST["ennmae"])."','".mysqli_real_escape_string($post,$_POST["inlineRadioOptions"])."','".mysqli_real_escape_string($post,$_POST["birthdate"])."','".mysqli_real_escape_string($post,$_POST["birthplace"])."','".mysqli_real_escape_string($post,$_POST["country"])."','".mysqli_real_escape_string($post,$_POST["state"])."','".mysqli_real_escape_string($post,$_POST["region"])."','".mysqli_real_escape_string($post,$_POST["address"])."','".mysqli_real_escape_string($post,$_POST["phone"])."','".mysqli_real_escape_string($post,$_POST["mobile"])."','".mysqli_real_escape_string($post,$_POST["id_no"])."','".mysqli_real_escape_string($post,$_POST["id_place"])."','".mysqli_real_escape_string($post,$_POST["id_date"])."','".mysqli_real_escape_string($post,$_POST["work"])."','".mysqli_real_escape_string($post,$_POST["work_phone"])."','".mysqli_real_escape_string($post,$_POST["department"])."','".mysqli_real_escape_string($post,$_POST["special"])."','".mysqli_real_escape_string($post,$_POST["grad_place"])."','".mysqli_real_escape_string($post,$_POST["grade"])."','".mysqli_real_escape_string($post,$_POST["grade_year"])."','".mysqli_real_escape_string($post,$path)."','".mysqli_real_escape_string($post,$_POST["password"])."','1','0')";

            mysqli_query($post, $sql);
            
			
header('Location: success.php');
exit;
  }
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

                        <h3 align="center"><?php echo $errMSG;?></h3>
                    </div>
                    <div class="panel-body">
                     <form method="post"  class="mt-5 px-4" name="form1" action="register.php" enctype="multipart/form-data"> 
                            <fieldset>
                                <div class="form-group">
                 <input type="text"   class="form-control" name="arname" oninvalid="this.setCustomValidity('من فضلك ادخل الاسم رباعى باللغة العربية')" placeholder="الاسم رباعى باللغة العربية" autofocus required oninput="setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                <input type="text" class="form-control" id="inputName" name="ennmae" placeholder="الاسم رباعى اللغة الانجليزية" required="" oninvalid="this.setCustomValidity('من فضلك ادخل الاسم رباعى باللغة الانجليزية')"   oninput="setCustomValidity('')">
                                
                            </div>
                            <div class="form-group">
                                <input type="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$" class=" form-control" id="inputAddress" name="email" placeholder="البريد الالكترونى " required="" oninvalid="this.setCustomValidity('من فضلك ادخل بريد اليكترونى صحيح')"   oninput="setCustomValidity('')" >
                            </div>
                       <div class="form-row">
                         <div class="form-group col-md-4">
                                    <input type="password" class="form-control" name="password" id="txtNewPassword" placeholder="كلمة المرور" required="" minlength="6" pattern=".{6,}" oninvalid="this.setCustomValidity('من فضلك ادخل الرقم السرى فيما لايقل عن 6 ارقام وحروف')"   oninput="setCustomValidity('')">
                               
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="password" class="form-control" name="repassword" id="txtConfirmPassword" placeholder="اعادة كلمة المرور" required>
                                   
                         </div>
                                <div class="registrationFormAlert col-md-4" style="color:green;" id="CheckPasswordMatch"></div>
                            </div>
                            </div>
                            <div class="form-group" col-md-8>
    <label  for="degree">الدرجة المتقدم لها:</label>
      
  <select name="degree" class="form-control" required>
    <?php
        $records = mysqli_query($post, "SELECT * From degree");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['degree_id'] ."'>" .$data['degree'] ."</option>";  // displaying data in option menu
        }	
    ?> 
     
  </select>

  </div>
  
                                                    <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="alaa form-control phoneNum" name="phone" id="inputPhone"
                                        placeholder="رقم التليفون">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control phoneNum" name="mobile" id="inputPhone2"
                                        placeholder="رقم المحمول " required="" oninvalid="this.setCustomValidity('من فضلك ادخل رقم الهاتف المحمول الخاص بك')"   oninput="setCustomValidity('')">
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


                                <input type="date" class=" form-control" name="birthdate" id="inputAddress" placeholder="تاريخ الميلاد " required="" oninvalid="this.setCustomValidity('من فضلك ادخل تاريخ الميلاد')"   oninput="setCustomValidity('')">
                            </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class=" form-control" id="inputAddress" name="birthplace" placeholder="جهة الميلاد " required="" oninvalid="this.setCustomValidity('من فضلك ادخل  جهة الميلاد')"   oninput="setCustomValidity('')">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <input type="text" name="state" class="alaa form-control phoneNum" id="inputPhone"
                                        placeholder="البلد">
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control phoneNum" name="region" id="inputPhone2"
                                        placeholder="المركز ">
                                </div>
                            <div class="form-group col-md-4">
                                    <input type="text" class="form-control phoneNum" name="country" id="inputPhone2"
                                        placeholder="المحافظة " required="" oninvalid="this.setCustomValidity(' من فضلك ادخل  المحافظة   ')"   oninput="setCustomValidity('')">
                              </div>    
                            </div>
                            
                            <div class="form-group">
  <input type="text" class=" form-control" name="address" id="inputAddress" placeholder="عنوان محل الاقامة الذى يتم ارسال الخطابات عليه " required="" oninvalid="this.setCustomValidity('من فضلك ادخل عنوان محل الاقامة الذى سيتم ارسال الخطابات عليه')"   oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <input type="text" class=" form-control" name="id_no" id="inputAddress" placeholder="بطاقة الرقم القومى " required="" oninvalid="this.setCustomValidity('من فضلك ادخل رقم البطاقة المكون من 14 رقم')"   oninput="setCustomValidity('')" minlength="14" maxlength="14">
                            </div>
                                <div class="form-row">
                                <div class="form-group col-md-6">
   <input type="text" class="alaa form-control phoneNum" name="id_place" id="inputPhone"
    placeholder="جهة صدورها" required="" oninvalid="this.setCustomValidity('من فضلك ادخل جهة صدور البطاقة')"   oninput="setCustomValidity('')">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control phoneNum" id="inputPhone2" name="id_date"
        placeholder="تاريخ الصدور " required="" oninvalid="this.setCustomValidity('من فضلك ادخل تاريخ الصدور')"   oninput="setCustomValidity('')">
                                </div>
                            </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="alaa form-control phoneNum" name="work" id="inputPhone"
                                        placeholder="جهة العمل وعنوانه">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control phoneNum" id="inputPhone2" name="work_phone"
                                        placeholder="تليفون العمل ">
                                </div>
                            </div>
                <div class="form-group">
    <label  for="department">	القسم:</label>
      
  <select name="department"class=" form-control"  required>
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
            <input type="text" class=" form-control" name="special" id="inputAddress" placeholder="التخصص المكتوب فى الشهادة المؤقته " required="" oninvalid="this.setCustomValidity('من فضلك ادخل التخصص المكتوب فى الشهادة')"   oninput="setCustomValidity('')">
                       </div>
                            
                            <div class="form-group">
                      <input type="text" class=" form-control" name="grad_place" id="inputAddress" placeholder="جهة التخرج " required="" oninvalid="this.setCustomValidity('من فضلك ادخل جهة التخرج')"   oninput="setCustomValidity('')">
                            </div>
                              <div class="form-group">
    <label  for="grade">:التقدير التراكمى	</label>
      
  <select name="grade" class="form-control" >
    <?php
        $records = mysqli_query($post, "SELECT * From grade");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['grade_id'] ."'>" .$data['grade'] ."</option>";  // displaying data in option menu
        }	
    ?> 
     
  </select>

  </div>

                            <div class="form-group">
                      <input type="text" class=" form-control" id="inputAddress" required="" oninvalid="this.setCustomValidity('من فضلك ادخل سنة التخرج')"   oninput="setCustomValidity('')" name="grade_year" placeholder="سنة التخرج ">
                       </div>
                                                  <div class="form-group">
                                                                                      <label>ادخل الاوراق المطلوبة بعد ضغطها zip او rar هى الامتدادات المسموح فقط برفعها </label>

                      <input type="file" class=" form-control" id="inputAddress" name="file" required="" oninvalid="this.setCustomValidity('من فضلك ادخل االورق المطلوب مضغوط بصيغة RAR او ZIP ')"   oninput="setCustomValidity('')">
                                                  </div>  
                                                  <div style="color:#900"><strong>
                                                  برجاء التحقق والتاكد من انك قمت برفع الاوراق التالية فى الملف المضغوط الذى قمت برفعه  
                                                 </strong> </div>
                                                    <div class="form-group">
                                                  <p><input id="field_terms"  type="checkbox" required="" oninvalid="this.setCustomValidity('برجاء تاكيد شهادة البكالوريوس فى حالة التقديم للماجستير وشهادة الماجستير وصورة من شهادة البكالوريوس فى حالة التقديم للدكتوراة')"   oninput="setCustomValidity('')" name="terms"> شهادة البكالوريوس للتسجيل للماجستير والدبلومة وشهادة الماجستير وصورة من البكالوريوس للتقديم للدكتوراة </u></p>

                                                  </div>   
                                                  <div class="form-group">
                                                  <p><input id="field_terms"  type="checkbox" required="" oninvalid="this.setCustomValidity(' برجاء التاكيد برفع شهادة تقدير اربع سنوات باللغة العربيه للمتقدم لتسجيل الماجستير')"   oninput="setCustomValidity('')" name="terms">
                 شهادة تقدير اربع سنوات باللغة العربية للمتقدم لتسجيل الماجستير </u></p>

                                                  </div>  
                                                  <div class="form-group">
                                                  <p><input id="field_terms"  type="checkbox" required="" oninvalid="this.setCustomValidity(' برجاء التاكيد برفع شهادةالميلاد كمبيوتر')"   oninput="setCustomValidity('')" name="terms">
                 شهادة الميلاد كمبيوتر </u></p>

                                                  </div>  
                                                  <div class="form-group Box">
                                                  <p><input id="field_terms"   type="checkbox" required="" oninvalid="this.setCustomValidity(' برجاء التاكيد برفع الموقف من التجنيد')"   oninput="setCustomValidity('')" name="terms">
                 اصل الموقف من التجنيد ( إعفاء نهائى - اعفاء مؤقت - مجند - مؤجل ) </u></p>

                                                  </div> 
                                                  <div class="form-group">
                                                  <p><input id="field_terms"  type="checkbox" required="" oninvalid="this.setCustomValidity(' برجاء التاكيد برفع اقرار من الباحث فى حالة العمل الحر او القطاع الخاص')"   oninput="setCustomValidity('')" name="terms">
               اقرار من الباحث فى حالة العمل الحر او القطاع الخاص</u></p>


                                                  </div>   
                                                   <div class="form-group">
                                                  <p><input id="field_terms"  type="checkbox" required="" oninvalid="this.setCustomValidity(' برجاء التاكيد برفع موافقة جهة العمل للعاملين بالحكومة او القطاع العام على الدراسة')"   oninput="setCustomValidity('')" name="terms">
              موافقة جهة العمل للعاملين بالحكومة او القطاع العام على الدراسة</u></p>

                                                  </div>  
                                                   <div class="form-group">
                                                  <p><input id="field_terms"  type="checkbox" required="" oninvalid="this.setCustomValidity(' برجاء التاكيد برفع صورة البطاقة')"   oninput="setCustomValidity('')" name="terms">
              صورة البطاقة</u></p>

                                                  </div> 

                                                    <div class="form-group">
                                                  <p><input id="field_terms"  type="checkbox" required="" oninvalid="this.setCustomValidity(' برجاء التاكيد برفع جميع الاوراق المطلوبة')"   oninput="setCustomValidity('')" name="terms">
              اقر انا بان جميع الاوراق المطلوبة تم رفعها وفى حالة كانت الاوراق المرفوعة غير سليمة للكلية الحق فى رفضها</u></p>

                                                  </div>  
                                                    <input type="hidden" name="MM_insert" value="form1" />
                 
                            <button id="addBtn" type="submit" class="btn btn-lg btn-success btn-block"> تسـجيـل</button>
                  </form>
    
    
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


$(document).ready(function () {

    $('input[type="radio"]').click(function () {
        if ($(this).attr("value") == "2") {
            $(".Box").hide('slow');
        }
        if ($(this).attr("value") == "1") {
            $(".Box").show('slow');

        }
    });

    $('input[type="radio"]').trigger('click');  // trigger the event
});
	</script>

<?php include'l/footer.php'?>