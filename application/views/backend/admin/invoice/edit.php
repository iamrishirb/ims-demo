<?php $invoice_details = $this->crud_model->get_invoice_by_id($param1); ?>
<?php $student = $this->db->get_where('students', array('id' => $invoice_details['student_id']))->row_array(); ?>
<?php $user = $this->db->get_where('users', array('id' => $student['user_id']))->row_array(); ?>
<?php $class = $this->db->get_where('classes', array('id' => $invoice_details['class_id']))->row_array(); ?>
<?php $section = $this->db->get_where('sections', array('id' => $invoice_details['section_id']))->row_array(); ?>
<form method="POST" class="d-block ajaxForm" action="<?php echo route('invoice/update/'.$param1); ?>">
    <div class="form-row">
        <div class="form-group mb-1">
            <label for="name"><?php echo get_phrase('student_name'); ?></label>
            <input type="text" class="form-control" id="name" name = "name" value="<?php echo $user['name']; ?>" readonly>
        </div>

        <div class="form-group mb-1">
            <label for="class_id_on_create"><?php echo get_phrase('course'); ?></label>  
            <input type="text" class="form-control" id="class_id_on_create" name = "class_id" value="<?php echo $class['name']; ?>" readonly>
        </div>
    
        <div class="form-group mb-1">
            <label for="section"><?php echo get_phrase('specialization'); ?></label>
            <input type="section" class="form-control" id="section" name = "section" value="<?php echo $section['name']; ?>" readonly>
        </div>

        <div class="form-group mb-1">
            <label for="title"><?php echo get_phrase('invoice_title'); ?></label>
            <input type="text" class="form-control" id="title" name = "title" value="<?php echo $invoice_details['title']; ?>" required>
        </div>

        <div class="form-group mb-1">
            <label for="total_amount"><?php echo get_phrase('total_amount').' ('.currency_code_and_symbol('code').')'; ?></label>
            <input type="text" class="form-control" id="total_amount" name = "total_amount" value="<?php echo $invoice_details['total_amount']; ?>" required>
        </div>

        <div class="form-group mb-1">
            <label for="paid_amount"><?php echo get_phrase('paid_amount').' ('.currency_code_and_symbol('code').')'; ?></label>
            <input type="text" class="form-control" id="paid_amount" name = "paid_amount" value="<?php echo $invoice_details['paid_amount']; ?>" required>
        </div>

        <div class="form-group mb-1">
            <label for="status"><?php echo get_phrase('status'); ?></label>
            <select name="status" id="status" class="form-control select2" data-bs-toggle="select2" required >
                <option value=""><?php echo get_phrase('select_a_status'); ?></option>
                <option value="paid" <?php if ($invoice_details['status'] == 'paid'): ?> selected <?php endif; ?>><?php echo get_phrase('paid'); ?></option>
                <option value="unpaid" <?php if ($invoice_details['status'] == 'unpaid'): ?> selected <?php endif; ?>><?php echo get_phrase('unpaid'); ?></option>
            </select>
        </div>
    </div>
    <div class="form-group  col-md-12">
        <button class="btn btn-block btn-primary" type="submit"><?php echo get_phrase('update_invoice'); ?></button>
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

function classWiseStudentOnCreate(classId) {
    $.ajax({
        url: "<?php echo route('invoice/student/'); ?>"+classId,
        success: function(response){
            $('#student_id_on_create').html(response);
        }
    });
}
</script>
