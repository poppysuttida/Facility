<div>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation">
      <?php echo $this->Html->link( 'หน้าแรก', array('controller'=>'pages','action' => 'home' )); ?></li>
    
    <li role="presen\tation" class="active">
      <?php echo $this->Html->link( 'รายการขอเบิกพัสดุ', array('controller'=>'ProductRequests','action' => 'view' )); ?></li>
  </ul>
</div>
<div class="row">
  <div class="col-xs-6 col-md-1"></div>
  <div class="col-xs-6 col-md-10">
    <H2><?php echo __('รายการขอเบิกพัสดุ');?></H2>
<!-- link to add new users page -->
<div align = "right">
    <?php echo $this->Html->link( 'สร้างรายการ', array( 'action' => 'add' ) , array(
                        'class' => 'btn btn-success' )); ?>
    </div> <br>
<table class="table table-bordered table-striped">
    <!-- table heading -->
    <tr>
        <th><?php echo __('รหัส');?></th>
        <th><?php echo __('รายการพัสดุ');?></th>
        <th><?php echo __('หน่วยนับ');?></th>
        <th><?php echo __('จำนวนที่เบิกออก');?></th>
        <th><?php echo __('รายชื่อผู้เบิก');?></th>
    </tr>

      <tbody>
            <?php
                if(isset($result)):
                    foreach ($result AS $key => $value):
                      // $product_list = isset($value['InventoryItem']['product_id'])?$value['Product']['product_name']: '';
                     ?>
                <tr>
                    <td class="center"><?php echo $value['Transfer']['transfer_id']; ?></td>
                    <td class="left"><?php echo $value['InventoryItem']['Product']['product_name']; ?></td>
                    <!--<td class="left"><?php echo $product_list; ?></td>-->
                     <td class="left"><?php echo $value['InventoryItem']['Uom']['uom_name']; ?></td>
                    <td class="center"><?php echo $value['Transfer']['transfer_account']; ?></td>
                    <td class="left"><?php echo $value['User']['user_name']; ?></td>
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
