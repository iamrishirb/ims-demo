<?php $invoice_details = $this->crud_model->get_invoice_by_id($param1); ?>

<form method="POST" class="" action="<?php echo route('invoice/take_payment/'.$param1); ?>">
<div class="form-row">
<!--TOTAL AMOUNT---------------------------------------------------------------------------------->
<div class="form-group mb-1">
    <label for="total_amount"><?php echo get_phrase('total_amount').' ('.currency_code_and_symbol('code').')'; ?></label>
    <input type="text" class="form-control" id="total_amount" name = "total_amount" value="<?php echo $invoice_details['total_amount']; ?>" readonly>
</div>
<!--AMOUNT PAID---------------------------------------------------------------------------------->
<div class="form-group mb-1">
    <label for="paid_amount"><?php echo get_phrase('paid_amount').' ('.currency_code_and_symbol('code').')'; ?></label>
    <input type="text" class="form-control" id="paid_amount" name = "paid_amount" value="<?php echo $invoice_details['paid_amount']; ?>" readonly>
</div>
<!--due AMOUNT----------------------------------------------------------------------------------->
<div class="form-group mb-1">
    <label for="due_amount"><?php echo get_phrase('due_amount').' ('.currency_code_and_symbol('code').')'; ?></label>
    <input type="text" class="form-control" id="due_amount" name = "due_amount" value="<?php echo $invoice_details['due_amount']; ?>" readonly>
</div>
<!--PAYMENT AMOUNT-------------------------------------------------------------------------------------->
<div class="form-group mb-1">
    <label for="payment_amount"><?php echo get_phrase('payment_amount').' ('.currency_code_and_symbol('code').')'; ?></label>
    <input type="text" class="form-control" id="payment_amount" name = "payment_amount" placeholder="<?php echo get_phrase('enter_payment_amount');?>" required>
</div>
<!--REMARKS-------------------------------------------------------------------------------------->
<div class="form-group mb-1">
    <label for="remarks"><?php echo get_phrase('remarks') ?></label>
    <input type="text" class="form-control" id="remarks" name = "remarks" placeholder="<?php echo get_phrase('enter_remarks');?>" >
</div>
<!--TYPE OF FEE-------------------------------------------------------------------------------------->
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
</div>
<!--METHOD-------------------------------------------------------------------------------------->
<div class="form-group mb-1">
    <label for="method"><?php echo get_phrase('method');?></label>
    <div id = "method">
        <select name="method" id="method" class="form-control select1" data-bs-toggle="select1" required >

            <option value="1"><?php echo get_phrase('cash');?></option>
            <option value="2"><?php echo get_phrase('cheque');?></option>
            <option value="3"><?php echo get_phrase('card');?></option>
        </select>
    </div>
</div>

<!--HIDDEN DATA-->
    <input type="hidden" name="invoice_id" value="<?php echo $invoice_details['id'];?>">
    <input type="hidden" name="class_id" value="<?php echo $invoice_details['class_id'];?>">
    <input type="hidden" name="student_id" value="<?php echo $invoice_details['student_id'];?>">
    <input type="hidden" name="title" value="<?php echo $invoice_details['title'];?>">
</div><!--FORM--->
<!--BUTTON-------------------------------------------------------------------------------------->
<div class="form-group mb-1">
    <button class="btn btn-block btn-primary" type="submit"><?php echo get_phrase('take_payment'); ?></button>
</div>
</form>

