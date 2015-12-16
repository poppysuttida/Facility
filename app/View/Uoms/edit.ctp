<div>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation">
      <?php echo $this->Html->link( 'หน้าแรก', array('controller'=>'pages','action' => 'home' )); 
      ?></li>
    <li role="presentation">
      <?php echo $this->Html->link( 'พัสดุ', array('controller'=>'Products','action' => 'view' )); 
      ?></li>
      <li role="presentation">
      <?php echo $this->Html->link( 'สร้างรายการพัสดุ', array('controller'=>'Products',
      	'action' => 'add' )); 
      ?></li>
      <li role="presentation">
      <?php echo $this->Html->link( 'หน่วยนับ', array('controller'=>'Uoms','action' => 'view' )); 
      ?></li>
      <li role="presentation" class="active">
      <?php echo $this->Html->link( 'แก้ไขหน่วยนับ', array('controller'=>'Uoms','action' => 'edit' 
      )); ?></li>
  </ul>
</div>
<div class="row">
  <div class="col-xs-6 col-md-1"></div>
  <div class="col-xs-6 col-md-10">
    <H2><?php echo __('แก้ไขรายการหน่วยนับ');?></H2>
<br>
 <!-- this is our add form, name the fields same as database column names -->
	<div class="form-group">
        <div class="col-md-12">
        <div class="col-sm-4" align = "right">
        	<?php echo __('ชื่อหน่วยนับ'); ?>
    	</div>
			<?php echo $this->Form->create('Uom'); ?>
		<div class="col-sm-4">
			<?php echo $this->Form->input('uom_name', array('label' => false, 
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