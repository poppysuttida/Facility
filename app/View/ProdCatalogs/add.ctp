<div>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation">
      <?php echo $this->Html->link( 'หน้าแรก', array('controller'=>'pages','action' => 'home' )); 
      ?></li>
    <li role="presentation">
      <?php echo $this->Html->link( 'ชนิดพัสดุ', array('controller'=>'ProdCatalogs',
      'action' => 'view' )); ?>
    </li>
    <li role="presentation" class="active">
      <?php echo $this->Html->link( 'สร้างชนิดพัสดุ', array('controller'=>'ProdCatalogs',
      'action' => 'add' )); ?>
    </li>
  </ul>
</div>
<div class="row">
  <div class="col-xs-6 col-md-1"></div>
  <div class="col-xs-6 col-md-10">
<H2><?php echo __('เพิ่มรายการชนิดพัสดุ');?></H2>
<br>
 <!-- this is our add form, name the fields same as database column names -->
	<div class="form-group">
        <div class="col-md-12">
        <div class="col-sm-4" align = "right">
        	<b><?php echo __('ชื่อชนิดพัสดุ'); ?></b>
    	</div>
			<?php echo $this->Form->create('ProdCatalog'); ?>
		<div class="col-sm-4">
			<?php echo $this->Form->input('product_catalog_name', array('label' => false, 
			'div' => false,
			'class' => 'form-control', 
            'type' => 'text' )); ?>
        </div>
        	<?php echo $this->Form->submit(__('เพิ่มรายการ'), array('class' => 'btn btn-info')); ?>
		<div class="col-sm-4"></div>
		</div>
    </div>
<div class="col-xs-6 col-md-1"></div>
</div>	