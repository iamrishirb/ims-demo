<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
    <thead class="thead-dark">
        <tr>
            <th><?php echo get_phrase('payment_id'); ?></th>
            <th><?php echo get_phrase('student'); ?></th>
            <th><?php echo get_phrase('remarks'); ?></th>
            <th><?php echo get_phrase('method'); ?></th>
            <th><?php echo get_phrase('paid_amount'); ?></th>
            <th><?php echo get_phrase('option'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php $payment = $this->crud_model->get_payment_by_date_range($date_from, $date_to, $selected_class, $selected_status)->result_array();
        foreach ($payment as $pay):
            $student_details = $this->user_model->get_student_details_by_id('student', $pay['student_id']);
            $class_details = $this->crud_model->get_class_details_by_id($pay['class_id'])->row_array(); ?>
            <tr>
                <td> <?php echo sprintf('%08d', $pay['payment_id']); ?> </td>
                <td>
                    <?php echo $student_details['name']; ?> <br>
                    <small> <strong><?php echo get_phrase('course'); ?> :</strong> <?php echo $class_details['name']; ?></small>
                </td>
                <td> <?php echo $pay['remarks']; ?> </td>
                <td> <?php echo $pay['method']; ?> </td>
                <td>
                    <?php echo currency($pay['payment_amount']); ?> <br>
                    <small> <strong> <?php echo get_phrase('created_at'); ?> : </strong> <?php echo date('d-M-Y', $pay['timestamp']); ?> </small>
                </td>

<!--PRINT INVOICE------------------------------------------------------------------------------------------->
                <td>
                    <div class="dropdown text-center">
                        <button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item_print_invoice-->
                            <a href="<?php echo route('invoice/invoice/'.$pay['payment_id']); ?>" class="dropdown-item" target="_blank"><?php echo get_phrase('print_invoice'); ?></a>
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
