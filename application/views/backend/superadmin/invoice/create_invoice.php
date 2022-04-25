<?php $enroll = $this->db->get_where('enrols', array('student_id' => $param1))->row_array(); ?>
<?php $class = $this->db->get_where('classes', array('id' => $enroll['class_id']))->row_array(); ?>
<?php $section = $this->db->get_where('sections', array('id' => $enroll['section_id']))->row_array(); ?>

<form method="POST" class="d-block ajaxForm" action="<?php echo route('invoice/single'); ?>">
    <div class="accordion-item form-group mb-2">
        <div class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#student_detail" aria-expanded="false" aria-controls="collapseTwo">
          <strong><?php echo get_phrase('student_detail'); ?></strong>
          </button>
        </div>
      <div id="student_detail" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="form-group mb-2">
        <label for="name"><?php echo get_phrase('student_name'); ?></label>
        <input type="text" class="form-control" name = "name" value="<?php echo $this->user_model->get_user_details($param2, 'name'); ?>" readonly>
        </div>

        <div class="form-group mb-2">
        <label for="class"><?php echo get_phrase('course'); ?></label>
        <input type="text" class="form-control" name = "class" value="<?php echo $class['name']; ?>" readonly>
        </div>

        <div class="form-group mb-2">
        <label for="section"><?php echo get_phrase('specialization'); ?></label>
        <input type="text" class="form-control" name = "section" value="<?php echo $section['name']; ?>" readonly>
        </div>
      </div>
    </div>
    <!-- try end -->

    <div class="form-group mb-2">
      <label for="title"><?php echo get_phrase('title'); ?></label>
      <input type="text" class="form-control" id="title" name = "title" placeholder="Tution Fee for April Month" required>
    </div>
    <!--TYPE OF PAYMENT ID-------------------------------------------------------------------------------------->
    <div class="form-group mb-1">
        <label for="type_of_fee_id"><?php echo get_phrase('type_of_fee');?></label>
        <div id = "type_of_fee_id">
            <select name="type_of_fee_id" id="type_of_fee_id" class="form-control select1" data-bs-toggle="select1" required >
            <option value="">Select type of fee</option>
                <option value="Admission fee">Admission fee</option>
                <option value="Tution fee">Tution fee</option>
                <option value="Examination fee">Examination fee</option>
                <option value="Laboratory fee">Laboratory fee</option>
                <option value="Library fee">Library fee</option>
                <option value="Miscellaneous">Miscellaneous</option>
            </select>
        </div>
    </div>

    <div class="form-group mb-2">
      <label for="total_amount"><?php echo get_phrase('total_amount').' ('.currency_code_and_symbol('code').')'; ?></label>
      <input type="number" class="form-control" id="total_amount" name = "total_amount" required>
    </div>

    <div class="form-group mb-2">
      <label for="paid_amount"><?php echo get_phrase('paid_amount').' ('.currency_code_and_symbol('code').')'; ?></label>
      <input type="number" class="form-control" id="paid_amount" name = "paid_amount" required>
    </div>

    <!--METHOD-------------------------------------------------------------------------------------->
    <div class="form-group mb-2">
        <label for="payment_method"><?php echo get_phrase('payment_method');?></label>
        <div id = "payment_method">
            <select name="payment_method" id="method" class="form-control select1" data-bs-toggle="select1" required >

                <option value="1"><?php echo get_phrase('cash');?></option>
                <option value="2"><?php echo get_phrase('cheque');?></option>
                <option value="3"><?php echo get_phrase('card');?></option>
            </select>
        </div>
    </div>
  
    <!-- date & time -->
    <label for="date"><?php echo get_phrase('date');?></label>
    <input type="date" class="form-control" id="date" name="date" required>

    <!--hidden field to update due amount-->

    <input type="hidden" name="class_id" value="<?php echo $enroll['class_id'];?>">
    <input type="hidden" name="section_id" value="<?php echo $enroll['section_id'];?>">
    <input type="hidden" name="student_id" value="<?php echo $param1;?>">
    <!--STATUS-->
    <div class="accordion-item form-group mb-2">
        <div class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#scholarship" aria-expanded="false" aria-controls="collapseTwo">
          <strong><?php echo get_phrase('Scholarship'); ?></strong>
          </button>
        </div>
      <div id="scholarship" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">
        <input type="number" class="form-control" id="scholarship" name = "scholarship" placeholder = "Scholarship Amount">
        </div>
        <div class="accordion-body">
        <input type="text" class="form-control" id="scholarship_remark" name = "scholarship_remark" placeholder = "Scholarship Remark">
        </div>
      </div>
    </div>
  <div class="form-group mb-2">
    <button class="btn btn-block btn-primary" type="submit"><?php echo get_phrase('create_invoice'); ?></button>
  </div>
</form>

<script>
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
  var form = $(this);
  ajaxSubmit(e, form, showAllInvoices);
});

$(document).ready(function () {
  $('select.select2:not(.normal)').each(function () { $(this).select2({ dropdownParent: '#right-modal' }); }); //initSelect2(['#class_id_on_create', '#student_id_on_create', '#status']);
});

</script>
