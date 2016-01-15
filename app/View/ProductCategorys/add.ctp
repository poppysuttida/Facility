<div>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation">
      <?php echo $this->Html->link( 'หน้าแรก', array('controller'=>'pages','action' => 'home' )); ?></li>
    <li role="presentation">
      <?php echo $this->Html->link( 'ชนิดพัสดุ', array('controller'=>'ProductCategorys','action' => 'view' )); ?>
    </li>
    <li role="presentation" class="active">
      <?php echo $this->Html->link( 'สร้างชนิดพัสดุ', array('controller'=>'ProductCategorys','action' => 'add' )); ?>
    </li>
  </ul>
</div>
<div class="row">
  <div class="col-xs-6 col-md-1"></div>
  <div class="col-xs-6 col-md-10">
<H2><?php echo __('เพิ่มชนิดพัสดุ');?></H2>
<br>
 <!-- this is our add form, name the fields same as database column names -->
	<div class="form-group">
    <div class="col-xs-6 col-md-1"></div>
        <div class="col-md-10">
			<?php echo $this->Form->create('ProductCategory'); ?>
        <div class="form-group">
        <div class="col-md-12">
        <div class="col-sm-4" align = "right">
            <b><?php echo __('ชื่อชนิดพัสดุ'); ?></b>
        </div>
        <div class="col-sm-4">
            <?php echo $this->Form->input('category_name', array('label' => false, 
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
            <b><?php echo __('หมวดหมู่พัสดุ'); ?></b>
        </div>
        <div class="col-sm-4">
            <?php echo $this->Form->input('product_catalog_id', array('label' => false, 
                'div' => false,
                'type' => 'select', 
                'class' => 'form-control', 
                'options' => $catalog_list));?>
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