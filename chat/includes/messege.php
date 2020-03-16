<?php
include 'config.php';
if(isset($_POST['friend_id'])){
  $friend_id = x($_POST['friend_id']);
?>
  <script>
        var friend_id = <?php echo json_encode($friend_id);?>;

  setTimeout(function(){
    $.post('includes/messege.php' , {friend_id : friend_id} , function(response){
    $(".content").html(response);
  })
  } , 2000)
  </script>
  
  <?php
     m("m JOIN `user` u ON (u.id = m.send_id) WHERE (m.send_id = $friend_id AND m.receive_id = $userid) OR (m.send_id = $userid AND m.receive_id = $friend_id) ORDER BY m.date_of_send ASC");

}
function m($condition){
global $db;
global $userid;
$query = mysqli_query($db , "SELECT * FROM `meseege` $condition");
if(mysqli_num_rows($query) > 0){
while($row = mysqli_fetch_assoc($query)){$g = x($row['gender']);$user = x($row['send_id']) ;
if($g == 1){$gender =  "man";}else{$gender = "woman";}
?>
<div class="media mt-3 <?php if($user !== $userid){echo "bg-light";}else{echo "bg-white";}?> p-3 radius-20 shadow" <?php if($user !== $userid){echo "userid = $user";}?>>
      <img src="assets/img/<?php echo $gender;?>.svg" class="mr-3" width="40">
      <div class="media-body">
        <h5 class="mt-0"><?php echo x($row['username']);?></h5>
        <?php echo x($row['messege_content']);?>
      </div>
    </div>
<?php }}else{echo "<p class='text-center mt-5 mb-5 text-dark'>*******</p>";} } ?>
