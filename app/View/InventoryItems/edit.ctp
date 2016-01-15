<div>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation">
      <?php echo $this->Html->link( 'หน้าแรก', array('controller'=>'pages','action' => 'home' )); ?></li>
    <li role="presentation">
      <?php echo $this->Html->link( 'รายการรับของเข้าคลัง', array('controller'=>
        'InventoryItems','action' => 'view' )); ?>
    </li>
    <li role="presentation" class="active">
      <?php echo $this->Html->link( 'แก้ไขรายการรับของเข้าคลัง', array('controller'=>
        'InventoryItems','action' => 'edit' )); ?>
    </li>
  </ul>
</div>
<div class="row">
  <div class="col-xs-6 col-md-1"></div>
  <div class="col-xs-6 col-md-10">
<H2><?php echo __('แก้ไขรายการรับของเข้าคลัง');?></H2>
<br>
<!--this is our add form, name the fields same as database column names -->
<?php echo $this->Form->create('InventoryItem');?>
    <div class="form-group">
        <div class="col-md-12">
        <div class="col-sm-4" align = "right">
            <b><?php echo __('รายการรับของเข้าคลัง'); ?></b>
        </div>
        <div class="col-sm-4">
            <?php echo $this->Form->input('product_id', array('label' => false, 
                'div' => false,
                'type' => 'select', 
                'class' => 
                'form-control', 
                'options' => $product_list));?>
        </div>
        <div class="col-sm-4"></div>
        </div>
    </div><br><br><br>
    <div class="form-group">
        <div class="col-md-12">
        <div class="col-sm-4" align = "right">
            <b><?php echo __('ราคา'); ?></b>
        </div>
        <div class="col-sm-4">
            <?php echo $this->Form->input('product_price', array('label' => false, 
                'div' => false,
                'type' => 'text', 
                'class' => 'form-control'));?> 
        </div>
        <div class="col-sm-4"></div>
        </div>
    </div><br><br>
    <div class="form-group">
        <div class="col-md-12">
        <div class="col-sm-4" align = "right">
            <b><?php echo __('หน่วยนับ'); ?></b>
        </div>
        <div class="col-sm-4">
            <?php echo $this->Form->input('uom_id', array('label' => false, 
                'div' => false,
                'type' => 'select', 
                'class' => 
                'form-control', 
                'options' => $uom_list));?>
        </div>
        </div>
    </div><br><br>
        <div class="form-group">
        <div class="col-md-12">
        <div class="col-sm-4" align = "right">
            <b><?php echo __('จำนวนทั้งหมด'); ?></b>
        </div>
        <div class="col-sm-4">
            <?php echo $this->Form->input('quantity_total', array('label' => false, 
                'div' => false,
                'type' => 'text', 
                'class' => 'form-control'));?> 
        </div>
        <div class="col-sm-4"></div>
        </div>
    </div><br><br>
    <div class="form-group">
        <div class="col-md-12">
        <div class="col-sm-4"></div>
        <div class="col-sm-4" align = "center">
        <?php echo $this->Form->submit(__('แก้ไขรายการ'), array('class' => 'btn btn-info')); ?> 
        </div>
        <div class="col-sm-4"></div>
        </div>
    </div>
  </div>
</div>  