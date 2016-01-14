<div>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation">
      <?php echo $this->Html->link( 'หน้าแรก', array('controller'=>'pages','action' => 'home' )); ?></li>
    <li role="presentation" class="active">
      <?php echo $this->Html->link( 'พัสดุ', array('controller'=>'Products','action' => 'view' )); ?></li>
  </ul>
</div>
<div class="row">
  <div class="col-xs-6 col-md-1"></div>
  <div class="col-xs-6 col-md-10">
    <H2><?php echo __('รายการพัสดุ');?></H2>

<!-- link to add new users page -->
<div align = "right">
    <?php echo $this->Html->link( 'สร้างรายการ', array( 'action' => 'add' ) , array(
                        'class' => 'btn btn-success' )); ?>
    </div> <br>
<table class="table table-bordered table-striped">
    <!-- table heading -->
    <tr>
        <th><?php echo __('รหัสพัสดุ');?></th>
        <th><?php echo __('รายการพัสดุ');?></th>
        <th><?php echo __('หน่วยนับ');?></th>
        <th><?php echo __('ประเภทพัสดุ');?></th>
        <th><?php echo __('ชนิดพัสดุ');?></th>
        <th><?php echo __('คลังพัสดุ');?></th>
        <th><?php echo __('จัดการพัสดุ');?></th>
    </tr>

   <tbody>
            <?php 
                if(isset($list_product)):
                    foreach ($list_product AS $key => $value):?>
                <tr>
                    <td class="center"><?php echo $value['Product']['product_id']; ?></td>
                    <td class="left"><?php echo $value['Product']['product_name']; ?></td>
                    <td class="left"><?php echo $value['Uom']['uom_name']; ?></td>
                    <td class="left"><?php echo $value['ProductType']['product_type_name']; ?></td>
                    <td class="left"><?php echo $value['ProductCategory']['category_name']; ?></td>
                    <td class="left"><?php echo $value['Facility']['facility_name']; ?></td>
                    <td class='actions'>
                    <?php echo $this->Html->link( 'แก้ไข', array('action' => 'edit', 
                     $value['Product']['product_id']), array(
                        'class' => 'btn btn-info' )); ?>
                
                    <?php echo $this->Form->postLink( 'ลบ', array('action' => 'delete', 
                     $value['Product']['product_id']), array(
                            'confirm'=>'Are you sure you want to delete that Product?' ,
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