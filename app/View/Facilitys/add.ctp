<div class="row">
  <div class="col-xs-6 col-md-1"></div>
  <div class="col-xs-6 col-md-10">
<H2><?php echo __('เพิ่มรายการ');?></H2>
<!-- link to add new users page -->
<div align = "right">
	<?php echo $this->Html->link( 'รายการทั้งหมด', array( 'action' => 'view' ), 
		  array('class' => 'btn btn-success' )); ?>
</div> <br>
 <!-- this is our add form, name the fields same as database column names -->
	<div class="form-group">
        <div class="col-md-12">
        <div class="col-sm-4" align = "right">
        	<?php echo __('ชื่อคลังพัสดุ'); ?>
    	</div>
			<?php echo $this->Form->create('Facility'); ?>
		<div class="col-sm-4">
			<?php echo $this->Form->input('facility_name', array('label' => false, 
			'div' => false,
			'class' => 'form-control', 
            'type' => 'text',
            'value' => isset($this->params->query['facility_name'])?
            $this->params->query['facility_name']: '')); ?>
        </div>
        	<?php echo $this->Form->submit(__('เพิ่มรายการ'), array('class' => 'btn btn-info')); ?>
		<div class="col-sm-4"></div>
		</div>
    </div>
<div class="col-xs-6 col-md-1"></div>
</div>	