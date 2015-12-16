<h2>เพิ่มรายการ</h2>

<!-- link to add new users page -->
<div class='upper-right-opt'>
	<?php echo $this->Html->link( 'รายการทั้งหมด', array( 'action' => 'view' ) ); ?>
</div>
<!--this is our add form, name the fields same as database column names -->
<?php echo $this->Form->create('Product');?>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div class="form-group form-group-lg">
            <label for="facility_list"><?php echo __("รายการพัสดุ"); ?></label>
            <?php echo $this->Form->input('product_name', array('label' => false, 'div' => false,
                'type' => 'text', 'class' => 'form-control'));?> 
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div class="form-group form-group-lg">
            <label for="facility_list"><?php echo __("ราคา"); ?></label>
            <?php echo $this->Form->input('product_price', array('label' => false, 'div' => false,
                'type' => 'text', 'class' => 'form-control'));?> 
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div class="form-group form-group-lg">
            <label for="uom_list"><?php echo __("หน่วยนับ"); ?></label>
            <?php echo $this->Form->input('uom_uom_id', array('label' => false, 'div' => false,
              'type' => 'select', 'class' => 'form-control', 'options' => $uom_list));?> 
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div class="form-group form-group-lg">
            <label for="facility_list"><?php echo __("คลังสินค้า"); ?></label>
            <?php echo $this->Form->input('facility_facility_id', array('label' => false, 'div' => false,
                'type' => 'select', 'class' => 'form-control', 'options' => $facility_list));?> 
        </div>
    </div>
</div>
<?php echo $this->Form->end('Submit'); ?>	