<?php

use App\shop;
use App\shopitem;
?>


<?php $__env->startSection('content'); ?>
<!--Main layout-->
<main class="pt-5 mx-lg-5">
  <div class="container-fluid mt-5">

    <!-- Heading -->
    <div class="card mb-4 wow fadeIn">

      <!--Card content-->
      <div class="card-body d-sm-flex justify-content-between">
        <h4 class="mb-2 mb-sm-0 pt-1">
          <span style="font-weight: bolder;">Shop</span>
        </h4>

        <form class="d-flex justify-content-center">
          <!-- Default input -->
          <input type="search" placeholder="Search" aria-label="Search" class="form-control">
          <button class="btn btn-primary btn-sm my-0 p" type="submit">
            <i class="fas fa-search"></i>
          </button>

        </form>

      </div>

    </div>
    <!-- Heading -->

    <!--Grid row-->
    <div class="row wow fadeIn">

      <!--Grid column-->
      <div class="col-md-12 mb-4">

        <!--Card-->
        <div class="card">

          <!--Card content-->
          <div class="card-body">

                <nav class=" md-pills nav-justified">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                          <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                            aria-controls="nav-home" aria-selected="true">View Shop</a>
                          <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                            aria-controls="nav-profile" aria-selected="false">Add Shop</a>
                          <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab"
                            aria-controls="nav-contact" aria-selected="false">Add Shop item</a>
                        </div>
                      </nav>

                      <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" style="background-color : white;margin-top:32px;">
                              <div class="table-responsive text-nowrap">
                                                <table class="table table-striped">

                                                  <!--Table head-->
                                                  <thead>
                                                    <tr>
                                                      <th>ID</th>
                                                      <th>ShopName</th>
                                                      <th>ShopPhoto</th>
                                                      <th>action</th>
                                                    </tr>
                                                  </thead>
                                                  <!--Table head-->
                                                  <?php $__currentLoopData = $shop; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                  <tbody>
                                                    <tr>
                                                            <th scope="row"><?php echo e($s-> id); ?></th>
                                                            <td> <?php
                                                            $name = $s->name;
                                                              if(strlen($name)>8){$name=substr($name,0,8).'..';}
                                                      echo $name;
                                                    ?></td>
                                                    <td><img src="images/<?php echo e($s->photoURL); ?>" class="rounded-circle z-depth-1" style="width: 50px; height: 45px; margin-top: -10px;"></td>
                                                    <td>
                                                            <a class="btn btn-success waves-effect btn-small" data-toggle="modal" data-target="#<?php echo e(str_replace(' ', '', $s->name)); ?>" style="padding: 8px 12px 8px 12px;margin-top: -10px" >View Item</a>
                                                          <a class="btn btn-success waves-effect btn-small" href="shop/<?php echo e($s->id); ?>/edit" style="padding: 8px 12px 8px 12px;margin-top: -10px">Live View</a>
                                                          <a class="btn btn-warning waves-effect btn-small" href="shop/<?php echo e($s->id); ?>/edit" style="padding: 8px 12px 8px 12px;margin-top: -10px">Edit</a>
                                                          <a class="btn btn-danger waves-effect btn-small" href="shop/<?php echo e($s->id); ?>/delete" style="padding: 8px 12px 8px 12px;margin-top: -10px"><i class="fas fa-times-circle"></i></a>

                                                          </td>
                                                </tr>
                                                  </tbody>
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                                </table>
                                                <!--Table-->

                                              </div>
                          </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"  style="background-color : white;margin-top:32px;">

                              <div class="col-lg-12" style="margin: 16px 8px 16px 4px" >
                                          <?php echo Form::open(['method'=>'POST','action'=>'ShopController@store','files'=>true]); ?>


                                                  <div class="input-group mb-3">
                                                          <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon9"  style="width:45px;"><i class="fas fa-user"></i></span>
                                                          </div>

                                                         <?php echo Form::text('name',null,['class'=>'form-control','placeholder' => 'Shop Name']); ?>


                                                       </div>




                                                                <div class="input-default-wrapper mt-3">
                                                                  <span class="input-group-text mb-3" id="input1"  style="width:45px;"><i class="fas fa-images"></i></span>

                                                                  <input type="file" id="photoURL" class="input-default-js" name="photoURL">
                                                                  <label class="label-for-default-js rounded-right mb-3" for="photoURL"><span class="span-choose-file">Choose
                                                                      file</span>

                                                                    <div class="float-right span-browse">Browse</div>

                                                                  </label>

                                                                </div>


                                                                        <div class="justify-content-center ">
                                                                              <button type="submit" class="btn btn-success waves-effect btn-md" style="size: 50px;padding-right: 300px ; padding-left:300px;

                                                                              margin-top: 32px;
                                                                              margin-left: 100px;
                                                                              margin-right: 64px;

                                                                              "  >Add Shop</button>
                                                                            </div>



                                      <?php echo Form::close(); ?>

                            </div>
                            </div>

                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab"  style="background-color : white;margin-top:32px;">

                                    <div class="col-lg-12" style="margin: 16px 8px 16px 4px" >
                                            <?php echo e(Form::open(array('action' => 'ShopitemController@store', 'files' => true,'method' => 'POST'))); ?>


                                            <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text" id="basic-addon9"  style="width:45px;"><i class="fas fa-user"></i></span>
                                                    </div>

                                                   <?php echo Form::text('name',null,['class'=>'form-control','placeholder' => 'Item Name']); ?>


                                                 </div>

                                                 <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                          <span class="input-group-text" id="basic-addon10"  style="width:45px;"><i class="fas fa-user"></i></span>
                                                        </div>

                                                          <?php
                                                          $sh = [];
                                                          foreach($shop as $s){
                                                             $sh[$s->id] = $s->name;
                                                          }
                                                          ?>

                                                       <?php echo Form::select('shop',$sh, null, ['placeholder' => 'Select Shop Name ...','class'=>'form-control']);; ?>


                                                     </div>

                                                     <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                              <span class="input-group-text" id="basic-addon11"  style="width:45px;"><i class="fas fa-user"></i></span>
                                                            </div>

                                                           <?php echo Form::text('price',null,['class'=>'form-control','placeholder' => 'Price']); ?>


                                                         </div>




                                                         <div class="input-default-wrapper mt-3">
                                                                <span class="input-group-text mb-3" id="input1"  style="width:45px;"><i class="fas fa-images"></i></span>

                                                                <input type="file" id="photoURL1" class="input-default-js" name="photoURL1">
                                                                <label class="label-for-default-js rounded-right mb-3" for="photoURL1"><span class="span-choose-file">Choose
                                                                    file</span>

                                                                  <div class="float-right span-browse">Browse</div>

                                                                </label>

                                                              </div>


                                                                  <div class="justify-content-center ">
                                                                        <button type="submit" class="btn btn-success waves-effect btn-md" style="size: 50px;padding-right: 300px ; padding-left:300px;

                                                                        margin-top: 32px;
                                                                        margin-left: 100px;
                                                                        margin-right: 64px;

                                                                        "  >Add Shop item</button>
                                                                      </div>



                                <?php echo Form::close(); ?>

                                  </div>
                                  </div>



                              </div>
                          </div>



            <canvas id="myChart"></canvas>

          </div>

        </div>
        <!--/.Card-->

      </div>
      <!--Grid column-->
    </div>
  </div>
        <!--/.Card-->

      </div>
      <!--Grid column-->

    </div>
    <!--Grid row-->

  </div>
</main>
<!--Main layout-->

//shop item model

<?php $__currentLoopData = $shop; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php
    $shop_item = shopitem::where('shop_id',$s->id)->get();
?>
<div class="modal fade" id="<?php echo e(str_replace(' ', '', $s->name)); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-lg" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel"><?php echo e($s->name); ?> items</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="table-responsive text-nowrap">
                    <table class="table table-striped">

                      <!--Table head-->
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>ItemName</th>
                          <th>Photo</th>
                          <th>Price</th>
                          <th>action</th>
                        </tr>
                      </thead>
                      <!--Table head-->



<?php $__currentLoopData = $shop_item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $st): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                      <tbody>
                            <tr>
                                    <th scope="row"><?php echo e($st->id); ?></th>
                                    <td> <?php
                                    $name = $st->name;
                                      if(strlen($name)>20){$name=substr($name,0,8).'..';}
                              echo $name;
                            ?></td>
                            <td><img src="images/<?php echo e($st->photoURL); ?>" class="rounded-circle z-depth-1" style="width: 50px; height: 45px; margin-top: -10px;"></td>
                            <td><?php echo e($st->price); ?></td>
                            <td>

                                  <a class="btn btn-warning waves-effect btn-small" href="shop_item/<?php echo e($st->id); ?>/edit" style="padding: 8px 12px 8px 12px;margin-top: -10px">Edit</a>
                                  <a class="btn btn-danger waves-effect btn-small" href="shop_item/<?php echo e($st->id); ?>/delete" style="padding: 8px 12px 8px 12px;margin-top: -10px"><i class="fas fa-times-circle"></i></a>

                                  </td>
                        </tr>
                          </tbody>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





                    </table>
                    <!--Table-->

                  </div>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!-- Central Modal Small -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.Admin.shop', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>