<?php
   use App\vote_user;
   use  Illuminate\Http\Request;

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../../css/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../css/MDB/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/MDB/css/mdb.css">
    <link rel="stylesheet" href="../../../css/media2.css">
    <title>ucsm voting</title>
    <style>
     .nav-link,.f,.description{
    font-weight:normal;
    font-style:normal;
  }
    </style>
  </head>
  <body>
  <!---nav bar =================-->

  <!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark light-color">

<!-- Navbar brand -->
<a class="navbar-brand " href="../../../selection/<?php echo e($cata); ?>" style="color:black;"><i class="fas fa-chevron-left"></i></a>
<h2 class="navbar-brand f" href="#" style="color:black;" ><?php echo e($parti->name); ?></h2>

<!-- Collapse button -->

<i class="fas fa-bars navbar-toggler" data-toggle="collapse" data-target="#basicExampleNav" style="color:black;" ></i>
<!-- Collapsible content -->
<div class="collapse navbar-collapse" id="basicExampleNav">

  <!-- Links -->
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link b" href="../../../Home" style="color:black;">Home
        <span class="sr-only">(current)</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="../../../list" style="color:black;">Vote</a>
    </li>
    <li class="nav-item " >
      <a class="nav-link" href="../../../Homeshop" style="color:black;">Shop</a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="../../../Homequiz" style="color:black;">Quizz</a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="http://bit.ly/tcregister" style="color:black;">Register</a>
    </li>

    <!-- Dropdown -->


  </ul>
  <!-- Links -->


</div>
<!-- Collapsible content -->

</nav>
<?php if(Session::has('ErrorMessage')): ?>
<div class="alert alert-danger" role="alert">
       <?php echo e(Session::get('ErrorMessage')); ?>

      </div>
<?php endif; ?>
<?php if(Session::has('Success')): ?>
<div class="alert alert-success" role="alert">
   <?php echo e(Session::get('Success')); ?>

</div>
<?php endif; ?>
<!--/.Navbar-->
  <!-- nab bar =================-->
    <section>
      <div class="container">
        <!---King & Queen -->
           <div class="row">

             <div class="col-sm-12">
            <div class="card">
              <div class="card-body">
           <img class="card-img image"src="../../../images/<?php echo e($parti->photoURL); ?>" alt="Card image cap" style="margin-top:0px;margin-bottom:10px;">
          <?php if($parti->title == ""): ?>
           <h5 class="description" id="song-name"><?php echo e($parti->title); ?></h5>
          <?php endif; ?>
           <h5 class="description"><?php echo e($parti->name); ?></h4>
    <?php
        $v = vote_user::where('code',$code)->get();
        $value = $request->session()->get('cata');
    ?>
  <?php $__currentLoopData = $v; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     <?php if($vs->$value == "active"): ?>

            <form method="POST" action="<?php echo e(route('vote.submit')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="col text-center">
                            <div class="md-form text-center" style="width:50%;margin-left:auto;margin-right:auto;">
                                    <input name="code" type="text" id="form1" class="form-control" >
                                    <label for="form1" class="text-center" style="margin-left:35px;" >Enter Code</label>
                             </div>
                     </div>

            </div>
            <div class="card-footer" >

                    <button type="submit" class="btn btn-info btn-sm waves-effect" style="float:right">VOTE</button>
                    <a href="../../../selection/<?php echo e($cata); ?>" class="btn btn-info btn-sm waves-effect" style="float:right">Cancle</a>

            </div>
        </form>
        <?php elseif($vs->$value == "notActive"): ?>


    <div class="col text-center">
                    <div class="md-form text-center" style="width:50%;margin-left:auto;margin-right:auto;">

                           <div class="card-description">Thank You</div>

                     </div>
             </div>

    </div>
    <div class="card-footer" >

            <button type="submit" class="btn btn-info btn-sm waves-effect" style="float:right;disabled">VOTE</button>
            <a href="../../../selection/<?php echo e($cata); ?>" class="btn btn-info btn-sm waves-effect" style="float:right">Cancel</a>

    </div>
    <?php elseif($code == ""): ?>
<form method="POST" action="<?php echo e(route('vote.submit')); ?>">
        <?php echo csrf_field(); ?>
        <div class="col text-center">
                <div class="md-form text-center" style="width:50%;margin-left:auto;margin-right:auto;">
                        <input name="code" type="text" id="form1" class="form-control" >
                        <label for="form1" class="text-center" style="margin-left:35px;" >Enter Code</label>
                 </div>
         </div>

</div>
<div class="card-footer" >

        <button type="submit" class="btn btn-info btn-sm waves-effect" style="float:right">VOTE</button>
        <a href="../../../selection/<?php echo e($cata); ?>" class="btn btn-info btn-sm waves-effect" style="float:right">Cancle</a>

</div>
</form>
  <?php
      $flag =  $request->session()->get('flag');
  ?>
  <?php elseif($flag == "active"): ?>
  <div class="col text-center">
        <div class="md-form text-center" style="width:50%;margin-left:auto;margin-right:auto;">

               <div class="card-description">You cannt vote.Thank You</div>

         </div>
 </div>

</div>
<div class="card-footer" >

<button type="submit" class="btn btn-info btn-sm waves-effect" style="float:right;disabled">VOTE</button>
<a href="../../../selection/<?php echo e($cata); ?>" class="btn btn-info btn-sm waves-effect" style="float:right">Cancle</a>

</div>

     <?php endif; ?>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

 <?php if($code == "1"): ?>
 <form method="POST" action="<?php echo e(route('vote.submit')); ?>">
        <?php echo csrf_field(); ?>
        <div class="col text-center">
                <div class="md-form text-center" style="width:50%;margin-left:auto;margin-right:auto;">
                        <input name="code" type="text" id="form1" class="form-control" >
                        <label for="form1" class="text-center" style="margin-left:35px;" >Enter Code</label>
                 </div>
         </div>

</div>
<div class="card-footer" >

        <button type="submit" class="btn btn-info btn-sm waves-effect" style="float:right">VOTE</button>
        <a href="../../../selection/<?php echo e($cata); ?>" class="btn btn-info btn-sm waves-effect" style="float:right">Cancle</a>

</div>
</form>
 <?php endif; ?>


           </div>
             </div>


            </div>



                <!---King & Queen -->

      </div>
    </section>

      <section>
     <div class="container">

     </div>
    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../../../css/MDB/js/jquery-3.3.1.min.js"></script>
    <script src="../../../css/MDB/js/bootstrap.min.js"></script>
    <script src="../../../css/MDB/js/mdb.min.js"></script>
    <script src="../../../css/MDB/js/popper.min.js"></script>

</html>
