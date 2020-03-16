<?php
session_start();
$db = mysqli_connect('localhost' , 'root' , '' , 'chat');
if(!$db){
    exit(mysqli_errno($db));
}

function x($data){
    global $db;
    return mysqli_real_escape_string($db , htmlspecialchars($data));
}

function y(){
    echo "form-control radius-20 mt-2 border-0";
}

if(isset($_SESSION['userid'])){
    $userid= $_SESSION['userid'];
    $username = $_SESSION['username'];
}

if(isset($_GET['logout'])){
    session_unset();
    session_destroy();
    unset($userid);
    unset($username);
    header("Location:index.php");
}
function in($return){
    global $userid;
    if($return === 1){
        if(!isset($userid)){
            header("Location:index.php");
        }
    }
    if($return === 0){
        if(isset($userid)){
            header("Location:profile.php");
        }
    }
}

function users($condition , $isAdd){
    global $db ; 
    global $userid;
    if(isset($_GET['accept'])){
        $request_id = x($_GET['accept']);
        mysqli_query($db , "UPDATE `send_request` SET `is_accept` = 1 WHERE `request_id` = '$request_id' AND `response_id` = '$userid'");
        header("Location:profile.php");
    }
    $query = mysqli_query($db , "SELECT * FROM `user` $condition");
    if(mysqli_num_rows($query) > 0){
        
    while($row = mysqli_fetch_assoc($query)){$user_result_id  = x($row['id']);$g = x($row['gender']);
        if($g == 1){$gender =  "man";}else{$gender = "woman";}
  echo '<div class="row '; if($isAdd === 1){ echo "send_messege";} echo ' m-2 bg-white p-2 radius-20 shadow" userid=';if($isAdd === 1){ echo $user_result_id;} echo '>
       <img src="assets/img/'.$gender.'.svg" width="40">
<h3 class="mt-2 ml-2 text-gray">'.x($row['username']).'</h3>';
if($isAdd === 0){
$check = mysqli_query($db , "SELECT * FROM `send_request` WHERE (`request_id` = '$user_result_id' AND `request_id` <> '$userid') OR (`response_id` = '$user_result_id' AND `response_id` <> '$userid')");
if (mysqli_num_rows($check) == 0){
echo '<img id="send" friend="'.$user_result_id.'"  src="assets/img/add.svg" width="30" style="position: absolute;right: 0;margin-top: 7px;margin-right: 42px;">';
}
}
if($isAdd === 2){
    echo '<a href="?accept='.$user_result_id.'"><img  src="assets/img/accept.svg" width="35" style="position: absolute;right: 0;margin-top: 2px;margin-right: 13px;"></a>';

}
echo "</div>";   
}
 }else{
     echo "<div class='text-center text-danger'> empty result </div>";
 }
 ?>

 <script>
 $("#send").on("click" , function(){
    var friend_id  = $(this).attr('friend');
    $(this).addClass('d-none');
    $.post('includes/send_request.php' , {friend_id : friend_id} , function(response){
    })
 })
 </script>

 <?php
}
  ?>