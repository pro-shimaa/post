$(document).ready(function(){
   $("#loading").fadeOut(1000)
   $("body").css("overflow" , "auto")

   $(window).scroll(function(){
    let wScroll =$(window).scrollTop() ;
    let scrWidth = $("body").innerWidth() ;

    if(wScroll > 0 && scrWidth >974 )
    {
      $(".nav2").addClass("shadow").addClass("mynav");
       $(".nav2 a").addClass("mt-2") ;
       $("#btnUp").fadeIn(200) ;
    } else
    { 
        $(".nav2 ").removeClass("shadow").removeClass("mynav"); 
        $(".nav2 a").removeClass("mt-2") ;
        $("#btnUp").fadeOut(200) ;
    }
    })
    
    $("#btnUp").click(function(){
        $("body ,html").animate({scrollTop:"0"} ,2000)
      })
      
//////////////////////////////////////////////////////////////

$("#details h3").click(function(){

    $(this).next("p").slideToggle(500).not(this).siblings("p").slideUp(500)
})
 ////////////////////////////////////////////////////////////////
    $(".layout #addVideo").click(function(){
        $(".box-container").fadeIn(400).addClass("d-flex")
        
    })
    $(".box-item i").click(function () {
        
        $(".box-container").fadeOut(400 ,function () {
            $(this).removeClass("d-flex")
        })
    })
    
////////////////////// validation   ////////////////////////////////////////////////////////

$("#inputName").keyup(function(){
    let userName = $(this).val() ;
    let userNameReg =/^[A-Z][a-z ]{3,19}$/ ;
    if(userNameReg.test(userName) == false)
    {

     $("button").attr("disabled","true");
    }
    else
    {
        $("button").removeAttr("disabled");
    }


})

$("#userEmail").keyup(function(){
    let userEmail = $(this).val() ;
    let userEmailReg =/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/ ;
    if(userEmailReg .test(userEmail) == false)
    {
     $("#contact button").attr("disabled","true");
    }
    else
    {
        $("#contact button").removeAttr("disabled");
    }
})

function validateMess(userMess){

    let userMessReg =/^[a-z ]{2,100}$/
    if(userMessReg.test(userMess) == false)
    {
     $("#contact button").attr("disabled","true");
    }
    else
    {
        $("#contact button").removeAttr("disabled");
    }
}

///////////////////////////////////

$("#userMessage").keyup(function(){
    validateMess(this.value) ;
    let maxlength =100 ;
    let messLen = $(this).val().length ;
    let inputChar = maxlength - messLen ;
    if(messLen > 100 )
    {
        $(" form span").text("your available character finished") ;
    } else
    {
        $(" form span").text(inputChar) ;
    }
})

////////////////////////////////////////////////////
$("#inputAddress").keyup(function(){
    let inputAddress = $(this).val() ;
    let inputAddressReg =/^[a-zA-Z0-9\s\,\''\-]*$/ ;
    if(inputAddressReg.test(inputAddress) == false)
    {

     $("button").attr("disabled","true");
    }
    else
    {
        $("button").removeAttr("disabled");
    }

})
/////////////////////////////////////////////
$(".phoneNum").keyup(function(){
    let phoneNum = $(this).val() ;
    let phoneNumReg =/^(002)?(010|011|012|015)[0-9]{8}$/ ;
    if( phoneNumReg.test( phoneNum) == false)
    {

     $("button").attr("disabled","true");
    }
    else
    {
        $("button").removeAttr("disabled");
    }

})
/////////////////////////////////////////////
$("#inputAge").keyup(function(){
    let inputAge = $(this).val() ;
    let inputAgeReg =/^([2-5][0-9]|18|19|60|61|62|63|64|65)$/ ;
    if(inputAgeReg.test(inputAge) == false)
    {

     $("button").attr("disabled","true");
    }
    else
    {
        $("button").removeAttr("disabled");
    }

})

$("#inputweight").keyup(function(){
    let inputweight = $(this).val() ;
    let inputweightReg =/^([4-9][0-9]|[1][0-4][0-9]|40|150)$/ ;
    if(inputweightReg.test(inputweight) == false)
    {

     $("button").attr("disabled","true");
    }
    else
    {
        $("button").removeAttr("disabled");
    }

})

 

})