<?php

use App\shop;

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
          <span style="font-weight: bolder;">Participant</span>
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
                             <?php $__currentLoopData = $parti_cata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <a class="nav-item nav-link" id="nav-<?php echo e(str_replace(' ', '', $pc->name)); ?>-tab" data-toggle="tab" href="#nav-<?php echo e(str_replace(' ', '', $pc->name)); ?>" role="tab"
                               aria-controls="nav-contact" aria-selected="false"><?php echo e($pc->name); ?></a>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                      </nav>

                      <div class="tab-content" id="nav-tabContent">

                        <?php $__currentLoopData = $parti_cata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <div class="tab-pane fade" id="nav-<?php echo e(str_replace(' ', '', $pc->name)); ?>" role="tabpanel" aria-labelledby="nav-<?php echo e(str_replace(' ', '', $pc->name)); ?>-tab"  style="background-color : white;margin-top:32px;">
                                    <div class="table-responsive text-nowrap">
                                            <table class="table table-striped">

                                              <!--Table head-->
                                              <thead>
                                                <tr>
                                                  <th>ID</th>
                                                  <th>Name</th>
                                                  <th>Photo</th>
                                                  <th>action</th>
                                                </tr>
                                              </thead>
                                              <!--Table head-->
                                              <?php $__currentLoopData = $participant; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <?php if($p->cata_id == $pc->id): ?>
                                              <tbody>
                                                <tr>
                                                        <th scope="row"><?php echo e($p-> id); ?></th>
                                                        <td> <?php
                                                        $name = $p->name;
                                                          if(strlen($name)>8){$name=substr($name,0,8).'..';}
                                                  echo $name;
                                                ?></td>
                                                <td><img src="images/<?php echo e($p->photoURL); ?>" class="rounded-circle z-depth-1" style="width: 50px; height: 45px; margin-top: -10px;"></td>
                                                <td>

                                                      <a class="btn btn-warning waves-effect btn-small" href="participant/<?php echo e($p->id); ?>/edit" style="padding: 8px 12px 8px 12px;margin-top: -10px">Edit</a>
                                                      <a class="btn btn-danger waves-effect btn-small" href="participant/<?php echo e($p->id); ?>/delete" style="padding: 8px 12px 8px 12px;margin-top: -10px"><i class="fas fa-times-circle"></i></a>
                                                      </td>
                                            </tr>
                                              </tbody>
                                            <?php endif; ?>
                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                            </table>
                                            <!--Table-->

                                          </div>
                                  </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.Admin.viewparticipant', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>