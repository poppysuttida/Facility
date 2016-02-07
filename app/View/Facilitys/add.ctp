<div>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation">
      <?php echo $this->Html->link( 'หน้าแรก', array('controller'=>'pages','action' => 'home' )); ?></li>
    <li role="presentation">
      <?php echo $this->Html->link( 'คลังพัสดุ', array('controller'=>'Facilitys','action' => 'view' )); ?>
    </li>
    <li role="presentation" class="active">
      <?php echo $this->Html->link( 'สร้างคลังพัสดุ', array('controller'=>'Facilitys','action' => 'add' )); ?>
    </li>
  </ul>
</div>
<div class="row">
  <div class="col-xs-6 col-md-1"></div>
  <div class="col-xs-6 col-md-10">
<H2><?php echo __('เพิ่มคลังพัสดุ');?></H2>
<br>
 <!-- this is our add form, name the fields same as database column names -->
	<div class="form-group">
    <div class="col-xs-6 col-md-1"></div>
        <div class="col-md-10">
			<?php echo $this->Form->create('Facility'); ?>
        <div class="form-group">
        <div class="col-md-12">
        <div class="col-sm-4" align = "right">
            <b><?php echo __('ชื่อคลังพัสดุ'); ?></b>
        </div>
        <div class="col-sm-4">
            <?php echo $this->Form->input('facility_name', array('label' => false, 
                'div' => false,
                'type' => 'text', 
                'class' => 'form-control'));?> 
        </div>
        <div class="col-sm-4"></div>
        </div>
    </div><br><br><br>
        <div class="form-group">
        <div class="col-md-12">
        <div class="col-sm-4" align = "right">
            <b><?php echo __('ที่ตั้งคลังพัสดุ'); ?></b>
        </div>
        <div class="col-sm-4">
            <?php echo $this->Form->input('location_id', array('label' => false, 
                'div' => false,
                'type' => 'select', 
                'class' => 'form-control', 
                'options' => $location_list));?>
        </div>
        <div class="col-sm-4">
        <?php echo $this->Html->link( 'เพิ่มที่ตั้งคลังพัสดุ', array('controller'=>'Facilitylocations','action' => 'add' )); ?>
        </div>
        </div>
    </div><br><br><br>
    <div class="form-group">
        <div class="col-md-12">
        <div class="col-sm-4"></div>
        <div class="col-sm-4" align = "center">
        <?php echo $this->Form->submit(__('เพิ่มรายการ'), array('class' => 'btn btn-info')); ?> 
        </div>
        <div class="col-sm-4"></div>
        </div>
    </div>
		</div>
<div class="col-xs-6 col-md-1"></div>
</div>	
</div>