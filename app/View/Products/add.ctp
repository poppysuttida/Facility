<div>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation">
      <?php echo $this->Html->link( 'หน้าแรก', array('controller'=>'pages','action' => 'home' )); ?></li>
    <li role="presentation">
      <?php echo $this->Html->link( 'รายการพัสดุ', array('controller'=>'Products',
      'action' => 'view' )); ?>
    </li>
    <li role="presentation" class="active">
      <?php echo $this->Html->link( 'สร้างรายการพัสดุ', array('controller'=>'Products',
      'action' => 'add' )); ?>
    </li>
  </ul>
</div>
<div class="row">
  <div class="col-xs-6 col-md-1"></div>
  <div class="col-xs-6 col-md-10">
<H2><?php echo __('เพิ่มรายการพัสดุ');?></H2>
<br>
<!--this is our add form, name the fields same as database column names -->
<?php echo $this->Form->create('Product');?>
    <div class="form-group">
        <div class="col-md-12">
        <div class="col-sm-4" align = "right">
            <?php echo __('รายการพัสดุ'); ?>
        </div>
        <div class="col-sm-4">
            <?php echo $this->Form->input('product_name', array('label' => false, 
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
            <?php echo __('หน่วยนับ'); ?>
        </div>
        <div class="col-sm-4">
            <?php echo $this->Form->input('uom_id', array('label' => false, 
                'div' => false,
                'type' => 'select', 
                'class' => 
                'form-control', 
                'options' => $uom_list));?>
        </div>
        <div class="col-sm-4">
        <?php echo $this->Html->link( 'เพิ่มหน่วยนับ', array('controller'=>'Uoms',
        'action' => 'add' )); ?>
        </div>
        </div>
    </div><br><br>
    <div class="form-group">
        <div class="col-md-12">
        <div class="col-sm-4" align = "right">
            <?php echo __('ชนิดพัสดุ'); ?>
        </div>
        <div class="col-sm-4">
            <?php echo $this->Form->input('product_category_id', array('label' => false, 
                'div' => false,
                'type' => 'select', 
                'class' => 
                'form-control', 
                'options' => $category_list));?>
        </div>
        <div class="col-sm-4"></div>
        </div>
    </div><br><br>
      <div class="form-group">
        <div class="col-md-12">
        <div class="col-sm-4" align = "right">
            <?php echo __('ประเภทพัสดุ'); ?>
        </div>
        <div class="col-sm-4">
            <?php echo $this->Form->input('product_type_id', array('label' => false, 
                'div' => false,
                'type' => 'select', 
                'class' => 
                'form-control', 
                'options' => $type_list));?>
        </div>
        <div class="col-sm-4"></div>
        </div>
    </div><br><br>
    <div class="form-group">
        <div class="col-md-12">
        <div class="col-sm-4" align = "right">
            <?php echo __('คลังที่จัดเก็บพัสดุ'); ?>
        </div>
        <div class="col-sm-4">
            <?php echo $this->Form->input('facility_id', array('label' => false, 
                'div' => false,
                'type' => 'select', 
                'class' => 
                'form-control', 
                'options' => $facility_list));?>
        </div>
        <div class="col-sm-4"></div>
        </div>
    </div><br><br>
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
</div>  