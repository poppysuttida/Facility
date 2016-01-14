<div>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation">
      <?php echo $this->Html->link( 'หน้าแรก', array('controller'=>'pages',
      'action' => 'home' )); ?></li>
    <li role="presentation" class="active">
      <?php echo $this->Html->link( 'รับของเข้าคลัง', array('controller'=>'InventoryItems',
      'action' => 'view' )); ?></li>
  </ul>
</div>
<div class="row">
  <div class="col-xs-6 col-md-1"></div>
  <div class="col-xs-6 col-md-10">
    <H2><?php echo __('รายการรับของเข้าคลัง');?></H2>

<!-- link to add new users page -->
<div align = "right">
    <?php echo $this->Html->link( 'สร้างรายการ', array( 'action' => 'add' ) , 
    array('class' => 'btn btn-success' )); ?>
    </div> <br>
<table class="table table-bordered table-striped">
    <!-- table heading -->
    <tr>
        <th><?php echo __('รหัส');?></th>
        <th><?php echo __('รายการ');?></th>
        <th><?php echo __('ราคา');?></th>
        <th><?php echo __('หน่วย');?></th>
        <th><?php echo __('จำนวนทั้งหมด');?></th>
        <th><?php echo __('จำนวนคงเหลือ');?></th>
        <th><?php echo __('จัดการ');?></th>
    </tr>

   <tbody>
            <?php 
                if(isset($result)):
                    foreach ($result AS $key => $value):?>
                <tr>
                    <td class="center"><?php echo 
                    $value['InventoryItem']['inventory_item_id']; ?></td>
                    <td class="left"><?php echo 
                    $value['Product']['product_name']; ?></td>
                    <td class="center"><?php echo 
                    $value['InventoryItem']['product_price']; ?></td>
                    <td class="left"><?php echo 
                    $value['Uom']['uom_name']; ?></td>
                    <td class="left"><?php echo 
                    $value['InventoryItem']['quantity_total']; ?></td>
                    <td class="left"><?php echo 
                    $value['InventoryItem']['quantity_account']; ?></td>
                    <td class='actions'>
                    <?php echo $this->Html->link( 'แก้ไข', array('action' => 'edit', 
                     $value['InventoryItem']['inventory_item_id']), array(
                        'class' => 'btn btn-info' )); ?>
                
                    <?php echo $this->Form->postLink( 'ลบ', array('action' => 'delete', 
                     $value['InventoryItem']['inventory_item_id']), array(
                            'confirm'=>'Are you sure you want to delete that InventoryItem?' ,
                            'class' => 'btn btn-info' )); ?>
            </td>
                </tr>
            	<?php
                    endforeach;
                endif;
                ?>
            </tbody>
            </table>
      <div class="col-xs-6 col-md-1"></div>
  </div>
</div>