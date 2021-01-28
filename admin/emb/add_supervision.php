<?php
ob_start();
session_start();
if($_SESSION['acc_lvl']==2||$_SESSION['acc_lvl']==3){
include("../../connections/post.php");
include"e/header.php";
include"e/menu.php";

?>

<?php
// start insert code
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {

 mysqli_set_charset($post,"utf8");

$sql = "INSERT INTO prof_std(prof_id,std_id,ne) VALUES ('".mysqli_real_escape_string($post,$_POST["id"])."','".mysqli_real_escape_string($post,$_POST["std"])."','".mysqli_real_escape_string($post,$_POST["ne"])."')";
 mysqli_query($post, $sql);
header('Location: view_supervision.php?id='.mysqli_real_escape_string($post,$_POST["std"]));
exit;	
		
}

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src='jquery-3.1.1.min.js' type='text/javascript'></script>
        <link href='jquery-ui.min.css' rel='stylesheet' type='text/css'>

        <script src='jquery-ui.min.js' type='text/javascript'></script>


<body>

    <div id="wrapper">



        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                
                
                    <h1 class="page-header">اضافة مشرفين للطالب</h1>
                    
                    
                    
                </div>
                <!-- /.col-lg-12 -->


  
                   
                    <div class="panel-body">
                        <form method="post"  class="mt-5 px-4" name="form1" action="add_supervision.php" > 
                     
                                                                             <div class="form-group">
           
           <input type='text' id='autocomplete'  class="form-control"placeholder="اسم المشرف">
        </div>
         <div class="form-group">

       <input type='text' name="ne" class="form-control" placeholder="درجة القرابة">
       </div>
            
            <input type='hidden' id='selectuser_id' name='id'/>
        

                                        <input type="hidden" name="std" value="<?php echo $_GET['id'];?>" />

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

    <!-- Script -->
    <script type='text/javascript' >
    $( function() {
  
        $( "#autocomplete" ).autocomplete({
            source: function( request, response ) {
                
                $.ajax({
                    url: "fetchData.php",
                    type: 'post',
                    dataType: "json",
                    data: {
                        search: request.term
                    },
                    success: function( data ) {
                        response( data );
                    }
                });
            },
            select: function (event, ui) {
                $('#autocomplete').val(ui.item.label); // display the selected text
                $('#selectuser_id').val(ui.item.value); // save selected id to input
                return false;
            }
        });

        // Multiple select
        $( "#multi_autocomplete" ).autocomplete({
            source: function( request, response ) {
                
                var searchText = extractLast(request.term);
                $.ajax({
                    url: "fetchData.php",
                    type: 'post',
                    dataType: "json",
                    data: {
                        search: searchText
                    },
                    success: function( data ) {
                        response( data );
                    }
                });
            },
            select: function( event, ui ) {
                var terms = split( $('#multi_autocomplete').val() );
                
                terms.pop();
                
                terms.push( ui.item.label );
                
                terms.push( "" );
                $('#multi_autocomplete').val(terms.join( ", " ));

                // Id
                var terms = split( $('#selectuser_ids').val() );
                
                terms.pop();
                
                terms.push( ui.item.value );
                
                terms.push( "" );
                $('#selectuser_ids').val(terms.join( ", " ));

                return false;
            }
           
        });
    });

    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }

    </script>
    
</body>
</html>
<?php
}
else
{
	echo'<h2 align="center">غير مسموح بدخول هذه الصفحة</h2>';
	}

?>