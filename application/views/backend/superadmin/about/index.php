<?php
  $curl_enabled = function_exists('curl_version');
?>

<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body py-2">
        <h4 class="page-title d-inline-block">
          <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('about_this_application'); ?>
        </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<div class="row justify-content-center">
  <div class="col-xl-8">
    <div class="card cta-box">
      <div class="card-body">
        <div class="media align-items-center">
          <div class="media-body">
            <div class="chart-widget-list">
              <p>
                <i class="mdi mdi-square"></i> <?php echo get_phrase('software_version'); ?>
                <span class="float-end"><?php echo get_settings('version'); ?></span>
              </p>
              <p>
                <i class="mdi mdi-square"></i> <?php echo get_phrase('check_update'); ?>
                <span class="float-end">
                    <a href="#" target="_blank" style="color: #343a40;" onclick="alert('Your System is already running on the latest version!');">
                        <i class="mdi mdi-telegram"></i><?php echo get_phrase('check_update'); ?>
                    </a>
                </span>
              </p>
              <p>
                <i class="mdi mdi-square"></i> <?php echo get_phrase('php_version'); ?>
                <span class="float-end"><?php echo phpversion(); ?></span>
              </p>
              <p class="mb-0">
                <i class="mdi mdi-square"></i> <?php echo get_phrase('curl_enable') ?>
                <span class="float-end">
                  <?php echo $curl_enabled ? '<span class="badge badge-success-lighten">'.get_phrase('enabled').'</span>' : '<span class="badge badge-danger-lighten">'.get_phrase('disabled').'</span>'; ?>
                </span>
              </p>

              <!-- Purchase Code -->
              <p style="margin-top: 8px;">
                <i class="mdi mdi-square"></i> <?php echo get_phrase('purchase_code'); ?>
                <span class="float-end"><?php echo 'xxxx-xxxx-xxxx'; #get_settings('purchase_code'); ?></span>
              </p>

              <!-- Puchase Code Status -->
              <p>
                <i class="mdi mdi-square"></i> <?php echo get_phrase('purchase_code_status'); ?>
                <span class="float-end">
                  <span class="badge badge-success-lighten"><?php echo 'Valid';?></span>
                </span>
              </p>

              <!-- Support Expiry Date -->
              <p>
                <i class="mdi mdi-square"></i> <?php echo get_phrase('support_expiry_date'); ?>
                <span class="float-end">
                  <span class="badge badge-success-lighten"><?php echo 'January 2023';?></span>  
                </span>
              </p>

              <!-- Customer Name -->
              <p class="mb-0">
                <i class="mdi mdi-square"></i> <?php echo get_phrase('customer_name') ?>
                <span class="float-end">
                  <span class="badge badge-success-lighten"><?php echo 'Susheel Patel';?></span>  
                </span>
              </p>


              <p style="margin-top: 8px;">
                <i class="mdi mdi-square"></i> <?php echo get_phrase('get_customer_support'); ?>
                <span class="float-end"><a href="mailto:support@webflair.in?Subject=Help%20On%20This" target="_blank" style="color: #343a40;"> <i class="mdi mdi-telegram"></i> <?php echo get_phrase('customer_support'); ?> </a> </span>
              </p>
            </div>
          </div>
          <img class="ms-3" src="<?php echo base_url('assets/backend/images/report.svg'); ?>" width="120" alt="Generic placeholder image">
        </div>
      </div>
    </div>
  </div>
</div>
