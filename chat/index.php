<?php include 'includes/nav.php';in(0);?>

<div class="container mt-5 ">
<div class="p-3 col-lg-5 col-sm text-center m-auto signin">
<img src="assets/img/logo.svg" width="150" alt="">
<div class="bg-gradient-danger p-3 m-2 radius-20 text-white error d-none"></div>
<input type="text" id="username" class="<?php y();?>" placeholder="Username">
<input type="text" id="password"  class="<?php y();?>" placeholder="Password">
<button id="login" class="btn btn-instagram radius-20 mt-2 w-100 mb-3">LOGIN</button>
<span id="signup" style="cursor:pointer" class="text-white">Create A account</span>
</div>
</div>



<?php include 'signup.php';?>
<?php include 'includes/footer.php';?>
