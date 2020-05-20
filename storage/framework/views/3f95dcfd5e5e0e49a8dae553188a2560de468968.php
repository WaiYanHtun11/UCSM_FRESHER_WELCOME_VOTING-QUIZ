<?php
 use App\parti_cata;
 use App\participant;
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
          <span style="font-weight: bolder;">Dashboard</span>
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
          <?php $i = 0; ?>
    

                <section>
                        <div class="container">
                        <?php $__currentLoopData = $parti_cata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <div class="row">
                               <div class="col-md-12"><br>
                                       <div class="card card-md">
                                           <div class="card-header">
                                               <h3 class="card-description text-center"><?php echo e($pc->name); ?></h3>
                                           </div>
                                           
                                               <div class="col-md-12" style="float:right;">
                                                   <table class="table table-striped ">
                                                        <thead>
                                                                <tr>
                                                                  <th scope="col">No</th>
                                                                  <th scope="col">Name</th>
                                                                  <th scope="col">Point</th>

                                                                </tr>
                                                              </thead>
                                                             
                                               <?php $__currentLoopData = $parti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php
                                                        $cata = parti_cata::find($p->cata_id);
                                                     ?>
                                                     <?php if($cata->name == $pc->name): ?>

                                                       <tbody>

                                                         <tr>
                                                           <th scope="row"><?php echo e(++$i); ?></th>
                                                           <td><?php echo e($p->name); ?></td>
                                                           <td><?php echo e($p->point); ?></td>

                                                         </tr>

                                                       </tbody>
                                                       <?php endif; ?>
                                                      
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php $i = 0; ?>
                                                     </table>
                                               </div>
                                           </div>
                                       </div>
                               </div>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                        </div>
                       </section>
            
                      


    

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

<?php echo $__env->make('layouts.Admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>