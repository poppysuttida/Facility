<div>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation">
      <?php echo $this->Html->link( 'หน้าแรก', array('controller'=>'pages','action' => 'home' )); ?></li>
    <li role="presentation">
      <?php echo $this->Html->link( 'ประเภทพัสดุ', array('controller'=>'ProductTypes',
      'action' => 'view' )); ?>
    </li>
    <li role="presentation" class="active">
      <?php echo $this->Html->link( 'แก้ไขประเภทพัสดุ', array('controller'=>'ProductTypes',
      'action' => 'add' )); ?>
    </li>
  </ul>
</div>
<div class="row">
  <div class="col-xs-6 col-md-1"></div>
  <div class="col-xs-6 col-md-10">
<H2><?php echo __('แก้ไขประเภทพัสดุ');?></H2>
<br>
 <!-- this is our add form, name the fields same as database column names -->
	<div class="form-group">
        <div class="col-md-12">
        <div class="col-sm-4" align = "right">
        	<b><?php echo __('ชื่อประเภทพัสดุ'); ?></b>
    	</div>
			<?php echo $this->Form->create('ProductType'); ?>
		<div class="col-sm-4">
			<?php echo $this->Form->input('product_type_name', array('label' => false, 
			'div' => false,
			'class' => 'form-control', 
            'type' => 'text' )); ?>
        </div>
        	<?php echo $this->Form->submit(__('แก้ไขรายการ'), array('class' => 'btn btn-info')); ?>
		<div class="col-sm-4"></div>
		</div>
    </div>
<div class="col-xs-6 col-md-1"></div>
</div>	
</div>	