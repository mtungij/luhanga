<?php include('incs/header.php'); ?>
<?php include('incs/nav.php'); ?>
<?php include('incs/side.php'); ?>

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url("oficer/index"); ?>"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item active"><?php echo $this->lang->line("income_non_menu"); ?></li>
                        </ul>
                    </div>            
                 
                </div>
            </div>
                  <?php if ($das = $this->session->flashdata('massage')): ?> 
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="alert alert-dismisible alert-success"> <a href="" class="close">&times;</a> 
                                    <?php echo $das;?> </div> 
                            </div> 
                        </div> 
                    <?php endif; ?>
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><?php echo $this->lang->line("form_income_menu"); ?></h2>
                        </div>
                        <div class="body">
                            <?php echo form_open("oficer/create_income_detail"); ?>
                        <div class="row">

                                
                
                <div class="col-lg-6 col-6">
                    <label class="form-control-label">*<?php echo $this->lang->line("customer_menu"); ?>:</label>
                <select class="form-control select2" name="customer_id" id="customer">
                        <option value=""><?php echo $this->lang->line("selectcustomer_menu"); ?></option>
                        <?php foreach ($customer as $customers): ?>
                        <option value="<?php echo $customers->customer_id; ?>"><?php echo $customers->f_name; ?> <?php echo $customers->m_name; ?> <?php echo $customers->l_name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-lg-6 col-6">
                    <label class="form-control-label">*<?php echo $this->lang->line("activeLoan_menu"); ?>:</label>
                <select class="form-control select2" name="loan_id" id="loan" required>
                <option value=""><?php echo $this->lang->line("selectactiveLoan_menu"); ?> </option>
                    </select>
                 </div>

                 <div class="col-lg-6 col-6">
                    <label class="form-control-label">*<?php echo $this->lang->line("incometype_menu"); ?>:</label>
                <select class="form-control kt-selectpicker" name="inc_id" required data-live-search="true">
                <option value=""><?php echo $this->lang->line("selectincometype_menu"); ?></option>
                    <?php foreach ($income as $incomes): ?>
                   <option value="<?php echo $incomes->inc_id; ?>"><?php echo $incomes->inc_name; ?></option>
                    <?php endforeach; ?>
                    </select>
                 </div>




                <div class="col-lg-6 col-6">
                <label class="form-control-label">*<?php echo $this->lang->line("incomeAmount_menu"); ?></label>
            <input type="number" name="receve_amount" autocomplete="off" class="form-control">
                                </div>
                <input type="hidden" name="comp_id" value="<?php echo $empl_data->comp_id; ?>">
                <input type="hidden" name="empl" value="<?php echo $empl_data->empl_id; ?>">
                <input type="hidden" name="blanch_id" value="<?php echo $empl_data->blanch_id; ?>">
            <!-- <input type="hidden" name="empl" value=""> -->
                <?php $day = date("Y-m-d"); ?>
            <input type="hidden" name="receve_day" value="<?php echo $day;?>">
                                
                                </div>
                                 <br>
                                <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="icon-drawer"><?php echo $this->lang->line("save_menu"); ?></i></button>
                                </div>
                            
                            <?php echo form_close();  ?>
                        </div>
                    </div>
                </div>


                <div class="col-lg-12">
                    <div class="card">
                         <div class="header">
                            <h2><?php echo $this->lang->line("income_non_menu"); ?> </h2> 
                            <div class="pull-right">
                              <a href="" class="btn btn-sm btn-icon btn-pure btn-primary on-default m-r-5 button-edit"
                                            data-toggle="modal" data-target="#addcontact1" data-original-title="Edit"><i class="icon-calendar"></i><?php echo $this->lang->line("search_menu"); ?></a> 
                            </div>   
                             </div>
                          <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover js-basic-example dataTable table-custom">
                                    <thead class="thead-primary">
                                        <tr>
                                                <th><?php echo $this->lang->line("customer_name_menu"); ?></th>
                                                <th><?php echo $this->lang->line("loanAprove_menu"); ?></th>
                                                <th><?php echo $this->lang->line("incometype_menu"); ?></th>
                                                <th><?php echo  $this->lang->line("income_amount_menu"); ?></th>
                                                <th><?php echo $this->lang->line("employee_menu"); ?></th>
                                                <th><?php echo $this->lang->line("date_menu"); ?></th>
                                               <!--  <th><?php //echo $this->lang->line("action_menu"); ?></th> -->
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                              <?php $no = 1; ?>
                                    <?php foreach ($detail_income as $detail_incomes): ?>
                                              <tr>
                                    <td><?php echo $detail_incomes->f_name; ?> <?php echo $detail_incomes->m_name; ?> <?php echo $detail_incomes->l_name; ?></td>
                                    <td><?php echo number_format($detail_incomes->loan_aprove); ?></td>
                                    <td><?php echo $detail_incomes->inc_name; ?></td>
                                    <td><?php echo number_format($detail_incomes->receve_amount); ?></td>
                                    <td><?php if ($detail_incomes->empl_name == FALSE) {
                                     ?>
                                     -
                                 <?php }else{ ?>
                                        <?php echo $detail_incomes->empl_name; ?></td>
                                         <?php } ?>
                                    <td>
                                       <?php echo $detail_incomes->receve_day; ?>
                                    </td>
                               <!--  <td>
                                <a href="<?php //echo base_url("oficer/delete_receved/{$detail_incomes->receved_id}") ?>" class="btn btn-sm btn-icon btn-pure btn-danger on-default m-r-5 button-edit" data-original-title="Delete" onclick="return confirm('Are You Sure?')"><i class="icon-trash"></i>
                                        </a>
                                </td> -->                                                                                   
                            </tr>
   
                                         <?php endforeach; ?>
                                        
                                    </tbody>
                                     <tr>
                                             <td><?php echo $this->lang->line("total_menu"); ?>:</td>
                                             <td></td>
                                             <td></td>
                                             <td><b><?php echo number_format($total_receved->total_receved); ?></b></td>
                                             <td></td>
                                             <td></td>
                                             <!-- <td></td> -->
                                         </tr>
                                </table>
                            </div>
                        </div>

                    </div>
                </div> 


             
            </div>
        </div>
    </div>
</div>

<?php include('incs/footer.php'); ?>



<script>
$(document).ready(function(){
$('#blanch').change(function(){
var blanch_id = $('#blanch').val();
//alert(blanch_id)
if(blanch_id != ''){

$.ajax({
url:"<?php echo base_url(); ?>admin/fetch_ward_data",
method:"POST",
data:{blanch_id:blanch_id},
success:function(data)
{
$('#customer').html(data);
//$('#district').html('<option value="">All</option>');
}
});
}
else
{
$('#customer').html('<option value="">Select customer</option>');
//$('#district').html('<option value="">All</option>');
}
});



$('#customer').change(function(){
var customer_id = $('#customer').val();
 //alert(customer_id)
if(customer_id != '')
{
$.ajax({
url:"<?php echo base_url(); ?>oficer/fetch_data_vipimioData",
method:"POST",
data:{customer_id:customer_id},
success:function(data)
{
$('#loan').html(data);
//$('#malipo_name').html('<option value="">select center</option>');
}
});
}
else
{
$('#loan').html('<option value="">Select Active loan</option>');
//$('#malipo_name').html('<option value="">chagua vipimio</option>');
}
});

// $('#social').change(function(){
//  var district_id = $('#social').val();
//  if(district_id != '')
//  {
//   $.ajax({
//    url:"<?php echo base_url(); ?>user/fetch_data_malipo",
//    method:"POST",
//    data:{district_id:district_id},
//    success:function(data)
//    {
//     $('#malipo_name').html(data);
//     //$('#malipo').html('<option value="">chagua malipo</option>');
//    }
//   });
//  }
//  else
//  {
//   //$('#vipimio').html('<option value="">chagua vipimio</option>');
//   $('#malipo_name').html('<option value="">chagua vipimio</option>');
//  }
// });


});
</script>



 <div class="modal fade" id="addcontact1" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Filter Income</h6>
            </div>
            <?php echo form_open("oficer/previous_faini"); ?>
<div class="modal-body">
    <div class="row clearfix">
        <?php $date = date("Y-m-d"); ?>
        <div class="col-md-6">
            <span>From:</span>
            <?php 
            echo form_input([
                'type' => 'date',
                'class' => 'form-control',
                'name' => 'from',
                'value' => $date,
                'required' => 'required'
            ]); 
            ?>
        </div>
        <div class="col-md-6">
            <span>To:</span>
            <?php 
            echo form_input([
                'type' => 'date',
                'class' => 'form-control',
                'name' => 'to',
                'value' => $date,
                'required' => 'required'
            ]); 
            ?>
        </div>
        <?php 
        echo form_hidden('blanch_id', $_SESSION['blanch_id']); 
        echo form_hidden('comp_id', $empl_data->comp_id); 
        ?>
    </div>
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-primary">Filter</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
</div>
<?php echo form_close(); ?>

        </div>
    </div>
</div>


