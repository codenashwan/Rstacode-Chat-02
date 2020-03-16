$(document).ready(function(){
// sign up form
$("#signup").on("click",function(){
        $(".singup").removeClass("d-none");
        $(".signin").addClass("d-none");
    })


//sign up process
$("#signupaction").on("click" , function(){
    var username = $("#username").val();
    var email = $("#email").val();
    var password = $("#password").val();
    var age = $("#age").val();
    var gender = $("#gender option:selected").val();
    
    $.post('includes/signup.php' , {username : username , email:email , password:password , age:age , gender :gender } , function(response){
    if(response === "success"){
    window.location.href= "index.php";
    }else{
    $(".error").removeClass("d-none");
    $(".error").html(response);
    }
    })
    })


//login processing 
$("#login").on("click" , function(){
    var username = $("#username").val();
    var password = $("#password").val();
    $.post('includes/login.php' , {username:username , password : password} , function(response){
    if(response === "success"){
    window.location.href= "index.php";
    }else{
    $(".error").removeClass("d-none");
    $(".error").html(response);
    }
    });
})



// result search input
$("#search").on("keydown" , function(e){
    if(e.which == 8 && $("#search").val() === ""){
      $(".data_search").addClass('d-none');
    }
  })

  
  $("#search").on("keypress" , function(){
    var search = $("#search").val();
    $(".data_search").removeClass('d-none');
    $.post('includes/search_result.php' , {search : search} , function(response){
      $(".data_search").html(response);
    });
  })





  
})