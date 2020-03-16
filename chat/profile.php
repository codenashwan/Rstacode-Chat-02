<?php include 'includes/nav.php'; in(1);?>
<div class="row m-5 justify-content-center">



<!-- Friend List -->
  <div class="col-sm-3 m-2 bg-gradient-lighter radius-20 p-3">
    <input type="text" id="search" placeholder="Search Username" class="<?php y();?>">
    <div class="dropdown mt-3 ml-3">
  <span class="dropdown-toggle text-darker" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   Request Friends
</span>
  <div class="dropdown-menu text-center p-1" aria-labelledby="dropdownMenuButton">
    <?php
    $query = mysqli_query($db , "SELECT * FROM `send_request` WHERE (`response_id` = '$userid' AND `is_accept` = 0)");
    if(mysqli_num_rows($query) > 0){
    while($row = mysqli_fetch_assoc($query)){$result_id_rquest = x($row['request_id']);}
    echo ' <div class="dropdown-item">'.users("WHERE `id` = '$result_id_rquest'" , 2).'</div>';
    }else{
      echo "Empty !";
    } ?>
  </div>
</div>
    <div class="bg-white mt-2 radius-20 p-2 data_search d-none"></div>
    <hr>
    <h5>Friends : </h5>
    <?php users("u JOIN send_request sr ON (sr.request_id = $userid OR sr.response_id = $userid) AND (u.id = sr.response_id OR u.id = sr.request_id) WHERE sr.is_accept = 1 AND u.id <> $userid " , 1); ?>
  </div>



  <!-- Messege -->
  <div class="messege col-sm-7 m-2 bg-gradient-lighter radius-20 p-3 d-none">
    <div class="content">
  
<!-- proccess messege -->


    </div>
    <div class="d-flex">
    <input id="messege_content" type="text" class="<?php y();?>" placeholder="Write Messege">
    <span id="send_meseege_btn" class="btn btn-dark shadow-none mt-2 radius-20 ml-1">Send</span>
    </div>
  </div>
</div>


<?php include 'includes/footer.php';?>

<script>
var friend_id;
$(".send_messege").on("click" , function(){
  $(".messege").removeClass('d-none');
   friend_id = $(this).attr('userid');
  $("#send_meseege_btn").attr('userid' , friend_id);
  $.post('includes/messege.php' , {friend_id : friend_id} , function(response){
    $(".content").html(response);
  })
})

$("#send_meseege_btn").on("click" , function(){
  var content = $("#messege_content").val();
   friend_id = $(this).attr('userid');
  $.post('includes/send_messege.php' , {content : content ,friend_id,friend_id } , function(response){
    $.post('includes/messege.php' , {friend_id : friend_id} , function(response){
    $(".content").html(response);
  })
    $("#messege_content").val('');
  })

})

</script>