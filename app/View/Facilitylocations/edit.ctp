<div>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation">
      <?php echo $this->Html->link( 'หน้าแรก', array('controller'=>'pages','action' => 'home' )); 
      ?></li>
    <li role="presentation">
      <?php echo $this->Html->link( 'คลังพัสดุ', array('controller'=>'Facilitys','action' => 'view' )); 
      ?></li>
      <li role="presentation">
      <?php echo $this->Html->link( 'สร้างคลังพัสดุ', array('controller'=>'Facilitys',
      	'action' => 'add' )); 
      ?></li>
      <li role="presentation">
      <?php echo $this->Html->link( 'ที่ตั้งคลังพัสดุ', array('controller'=>'Facilitylocations','action' => 'view' )); 
      ?></li>
      <li role="presentation" class="active">
      <?php echo $this->Html->link( 'แก้ไขที่ตั้งคลังพัสดุ', array('controller'=>'Facilitylocations','action' => 'edit' 
      )); ?></li>
  </ul>
</div>
<div class="row">
  <div class="col-xs-6 col-md-1"></div>
  <div class="col-xs-6 col-md-10">
    <H2><?php echo __('แก้ไขรายการที่ตั้งคลังพัสดุ');?></H2>
<br>
 <!-- this is our add form, name the fields same as database column names -->
	<div class="form-group">
        <div class="col-md-12">
        <div class="col-sm-4" align = "right">
        	<b><?php echo __('ชื่อที่ตั้งคลังพัสดุ'); ?></b>
    	</div>
			<?php echo $this->Form->create('Facilitylocation'); ?>
		<div class="col-sm-4">
			<?php echo $this->Form->input('location_name', array('label' => false, 
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