<?php
  $invoice_details = $this->crud_model->get_invoice_by_id($invoice_id);
  $student_details = $this->user_model->get_student_details_by_id('student', $invoice_details['student_id']);
// echo '<pre>';
//  print_r( $invoice_details);
// echo '<br><br><hr>';
// print_r( $payment_details);
 ?>

<!--title-->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">
            	<i class="mdi mdi-grease-pencil title_icon"></i> <?php echo get_phrase('invoice'); ?>
        	</h4>
        </div>
    </div>
</div>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">

        <!-- Invoice Logo-->
        <div class="clearfix">
          <div class="float-start mb-3" style="display: flex; justify-content: center; align-items: center; width:100%; margin-top:40px;">
            <img src="<?php echo $this->settings_model->get_logo_dark(); ?>" alt="logo" height="80">
          </div>
        </div>

        <!-- Invoice Title -->
        <h3 class="text-center" 
            style="font-family: Nunito Sans, Times New Roman, Calibri, sans-serif;
                   color: #111; margin: 20px 0px 40px 0px; font-weight: 400;
                   text-transform: capitalize; ">
          <b><?php echo get_phrase('invoice'); ?> - </b><?php echo $invoice_details['title']; ?> 
        </h3>


        <!-- Invoice Detail-->
        <div class="row">
          <div class="col-sm-6">
            <div class="float-start mt-3">
              <p><?php echo get_phrase('Bill To,'); ?> <br><br>
              <b><?php echo $student_details['name']; ?></b><br>
                <?=  $student_details['class_name'] ?>  <?=  $student_details['section_name'] ?>
              <br>
              <address>
                <?php echo $student_details['address'] == "" ? '('.get_phrase('address_not_found').')' : $student_details['address']; ?><br>
                <abbr title="Phone">P:</abbr> 
                <?php echo $student_details['phone'] == "" ? '('.get_phrase('phone_number_not_found').')' : $student_details['phone']; ?><br>
              </address>
              <p class="text-muted font-13"><?php echo get_phrase('please_find_below_the_invoice'); ?>.</p>
            </div>

          </div><!-- end col -->
          <div class="col-sm-4 offset-sm-2">
            <div class="mt-3 float-sm-right">
              <p class="font-13"><strong><?php echo get_phrase('invoice_no'); ?>: </strong> <?php echo sprintf('%08d', $invoice_details['id']); ?></p>
              <p class="font-13"><strong><?php echo get_phrase('date'); ?>: </strong> <?php echo date('D, d-M-Y'); ?></p>
              <p class="font-13"><strong><?php echo get_phrase('type_of_fee'); ?>: </strong> <?php 
                          if ($invoice_details['type_of_fee_id'] == 1)
                              echo get_phrase('admission_fee');
                          if ($invoice_details['type_of_fee_id'] == 2)
                              echo get_phrase('tution_fee');
                          if ($invoice_details['type_of_fee_id'] == 3)
                              echo get_phrase('examination_fee');
                          if ($invoice_details['type_of_fee_id'] == 4)
                          echo get_phrase('laboratory_fee');
                          if ($invoice_details['type_of_fee_id'] == 5)
                          echo get_phrase('library_fee');
                          if ($invoice_details['type_of_fee_id'] == 6)
                          echo get_phrase('miscellaneous_fee');
                      ?></p>
              <p class="font-13"><strong><?php echo get_phrase('status'); ?>: </strong>  <?php if (strtolower($invoice_details['status']) == 'paid'): ?>
                  <span class="badge bg-success"><?php echo get_phrase('paid'); ?></span></p>
                <?php else: ?>
                  <span class="badge bg-danger"><?php echo get_phrase('unpaid'); ?></span></p>
                <?php endif; ?>
            </div>
          </div><!-- end col -->
        </div>
        <!-- end row -->

        <div class="row">
          <div class="col-12">
            <div class="table-responsive">
              <table class="table mt-4">
                <thead>
                  <tr><th><?php echo get_phrase('payment_id'); ?></th>
                    <th><?php echo get_phrase('payment_date'); ?></th>
                    <th><?php echo get_phrase('remarks'); ?></th>
                    <th><?php echo get_phrase('type_of_fee'); ?></th>
                    <th><?php echo get_phrase('method'); ?></th>
                    <th><?php echo get_phrase('paid_amount'); ?></th>

                  </tr></thead>
                  <tbody>
                  <tr>
                    <td><?php echo ($invoice_details['id']); ?></td>
                    <td><?php echo get_phrase('').date('D, d-M-Y', $pay['created_at']); ?></td>
                    <td><?php echo ($invoice_details['remarks']); ?></td>
                    <td><?php echo ($invoice_details['type_of_fee_id']); ?></td>                    
                    <td><?php 
                          if ($invoice_details['payment_method'] == 1)
                              echo get_phrase('cash');
                          if ($invoice_details['payment_method'] == 2)
                              echo get_phrase('cheque');
                          if ($invoice_details['payment_method'] == 3)
                              echo get_phrase('card');
                      ?></td>
                    <td><?php echo ($invoice_details['1st_installment']); ?></td>
                  </tr>
                  <?php $payment_details = $this->crud_model-> get_pay_by_id($invoice_id);
                  foreach ($payment_details as $pay): ?>
                    <tr>
                      <td><?php echo ($pay['payment_id']); ?></td>
                      <td>
                        
                        <?php echo get_phrase('').date('D, d-M-Y', $pay['timestamp']); ?>
                      </td>
                      <td><?php echo ($pay['remarks']); ?></td>
                      <td><?php echo ($pay['type_of_fee_id']); ?></td>     
                      <td><?php 
                          if ($pay['method'] == 1)
                              echo get_phrase('cash');
                          if ($pay['method'] == 2)
                              echo get_phrase('cheque');
                          if ($pay['method'] == 3)
                              echo get_phrase('card');
                      ?></td>
                      <td><?php echo currency ($pay['payment_amount']); ?></td>
                      
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div> <!-- end table-responsive-->
            </div> <!-- end col -->
          </div>
          <!-- end row -->

          <div class="row">
            <div class="col-sm-6">
              <div class="clearfix pt-3">
                <h6 class="text-muted"></h6>
                <small>

                </small>
              </div>
            </div> <!-- end col -->
            <div class="col-sm-6">
              <div class="float-left mt-3 mt-sm-0">
                <p><b><?php echo get_phrase('total_amount'); ?> :&nbsp;</b> <span class="float-end"><?php echo currency($invoice_details['total_amount']); ?></span></p>
                <p><b><?php echo get_phrase('due_amount'); ?> : </b> <span class="float-end"><?php echo currency($invoice_details['total_amount'] - $invoice_details['paid_amount']); ?></span></p>
                <p><b><?php echo get_phrase('total_paid_amount'); ?> : </b> <span class="float-end"><?php echo currency($invoice_details['paid_amount']); ?></span></p>
                <!-- <p><?php echo get_phrase('paid_amount'); ?> <b><?php echo currency($invoice_details['paid_amount']); ?></b></p>  -->
              </div>
              <div class="clearfix"></div>
            </div> <!-- end col -->
          </div>
          <!-- end row-->
          <div class="col-sm-6">
            <div class="text-start">
            <img class="col-sm-6" src="<?php echo $this->settings_model->get_account_sign(); ?>" class="rounded float-start" alt="...">
            </div>
          </div>

          <div class="d-print-none mt-4">
            <div class="text-end">
              <a href="javascript:window.print()" class="btn btn-primary"><i class="mdi mdi-printer"></i> <?php echo get_phrase('print'); ?></a>
            </div>
          </div>
          <!-- end buttons -->

        </div> <!-- end card-body-->
      </div> <!-- end card -->
    </div> <!-- end col-->
  </div>
