<?php $student = $this->db->get_where('students', array('id' => $student_id))->row_array(); ?>
<?php $enroll = $this->db->get_where('enrols', array('student_id' => $student_id))->row_array(); ?>
<?php $section = $this->db->get_where('sections', array('id' => $enroll['section_id']))->row_array(); ?>
<?php $class = $this->db->get_where('classes', array('id' => $enroll['class_id']))->row_array(); ?>
<?php $user =$this->session->userdata('user_id'); ?>                        
<?php $users = $this->db->get_where('users', array('id' => $user_id))->row_array();?>

                    
<!--title-->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">
            	<i class="mdi mdi-grease-pencil title_icon"></i> <?php echo get_phrase('Student_registration_receipt'); ?>
        	</h4>
        </div>
    </div>
</div>
<!--------------------------------------------------------------------------------------------------------->
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">

        <!-- Invoice Logo-->
        <div class="row">
          <div class="col-sm-7">
            <div class="float-start mt-3">
            <img src="<?php echo $this->settings_model->get_logo_dark(); ?>" alt="" style="margin: 10px 20px 20px 20px; height: 56px;">
            </div>
          </div> <!-- end card-body-->
        
          <div class="col-sm-5">
            <div class="float-start mt-3">
                <p style="line-height: 1.8rem;">
                    <b><?php echo get_phrase('Email'); ?></b>: &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $users['email']; ?><br>
                    <b><?php echo get_phrase('Contact'); ?></b>: <?php echo $users['phone']; ?><br>
                    <b><?php echo get_phrase('address'); ?></b>: <?php echo $users['address']; ?>
                </p>
            </div>
          </div>
        </div>
    <hr style="height:1px;color:#333;background-color:#333;" />
    <h2 style="color:#333;text-align:center;margin-top:20px;margin-bottom:20px"><?php echo get_phrase('registration_Form'); ?></h2>

    <div class="row"> 
        <div class="col-sm-8">

            <div class="row">
            <p><b><?php echo get_phrase('enrollment_no'); ?></b>:
                <strong style="color: #000;"><?php echo $student['code']; ?></strong></p>
            </div>

            <div class="row">
            <p><b><?php echo get_phrase('name'); ?></b>:
                <?php echo $this->user_model->get_user_details($student['user_id'], 'name'); ?></p>
            </div>

            <div class="row">
            <p><b><?php echo get_phrase('father_name'); ?></b>:
                <?php echo $this->user_model->get_user_details($student['user_id'], 'father'); ?></p>
            </div>

            <div class="row">
            <p><b><?php echo get_phrase('mother_name'); ?></b>:
                <?php echo $this->user_model->get_user_details($student['user_id'], 'mother'); ?></p>
            </div>

            <div class="row">
            <p><b><?php echo get_phrase('adhaar_number'); ?></b>:
                <?php echo $this->user_model->get_user_details($student['user_id'], 'adhaar'); ?></p>   
            </div>
            
            <div class="row">
            <p><b><?php echo get_phrase('class'); ?></b>:
                <?php echo $class['name']; ?></p>  
            </div>

            <div class="row">
            <p><b><?php echo get_phrase('section'); ?></b>:
                <?php echo $section['name'] ?></p>   
            </div>

            <div class="row">
            <p><b><?php echo get_phrase('date_of_registration'); ?></b>:
            <?php echo date('m/d/Y', $this->user_model->get_user_details($student['user_id'], 'register_at')); ?></p>   
            </div>

            <div class="row">
            <p><b><?php echo get_phrase('birthday'); ?></b>:
                <?php echo date('m/d/Y', $this->user_model->get_user_details($student['user_id'], 'birthday')); ?></p>
            </div>

            <div class="row">
            <p><b><?php echo get_phrase('gender'); ?></b>:
                <?php echo $this->user_model->get_user_details($student['user_id'], 'gender'); ?></p>
            </div>

            <div class="row">
            <p><b><?php echo get_phrase('blood_group'); ?></b>:
                <?php echo $this->user_model->get_user_details($student['user_id'], 'blood_group'); ?></p>
            </div>

            <div class="row">
            <p><b><?php echo get_phrase('mobile_number'); ?></b>:
                <?php echo $this->user_model->get_user_details($student['user_id'], 'phone'); ?></p>
            </div>

            <div class="row">
            <p><b><?php echo get_phrase('email_id'); ?></b>:
                <?php echo $this->user_model->get_user_details($student['user_id'], 'email'); ?></p>   
            </div>

            <div class="row">
            <p><b><?php echo get_phrase('address'); ?></b>:
                <?php echo $this->user_model->get_user_details($student['user_id'], 'address'); ?></p>   
            </div>
        </div>

        <div class="col-sm-4" style="align-items: center;
                                    justify-content: center;
                                    display: flex;
                                    flex-direction: column;">
            <div class="wrapper-image-preview" style="margin-left: -6px;">
                <div class="box" style="width: 200px;">
                    <div class="js--image-preview" style="background-image: url(<?php echo $this->user_model->get_user_image($student['user_id']); ?>); background-color: #F5F5F5;">
                    </div>
                    <div class="upload-options">
                        <label for="student_image">Student's Photograph</label>
                    </div>
                </div>
            </div>

            <div class="wrapper-image-preview mt-3">
                <div class="js--image-preview" >
                    <img src="<?php echo $this->settings_model->get_account_sign(); ?>" alt="" height="60">
                    <p style="text-align: center;">Admin's Signature</p>
                </div>
            </div>
        </div>
    </div>    

    <div class="d-print-none mt-4">
    <div class="text-end">
        <a href="javascript:window.print()" class="btn btn-primary"><i class="mdi mdi-printer"></i> <?php echo get_phrase('print'); ?></a>
    </div>
    </div>

</div><!-- end row -->
</div> <!-- end card-body-->
</div> <!-- end card -->
</div> <!-- end col-->


