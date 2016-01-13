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
      <li role="presentation" class="active">
      <?php echo $this->Html->link( 'หน่วยนับ', array('controller'=>'Uoms','action' => 'view' )); 
      ?></li>
  </ul>
</div>
<div class="row">
  <div class="col-xs-6 col-md-1"></div>
  <div class="col-xs-6 col-md-10">
    <H2><?php echo __('หน่วยนับ');?></H2>

<!-- link to add new users page -->
<div align = "right">
    <?php echo $this->Html->link( 'สร้างรายการ', array( 'action' => 'add' ) , 
    array('class' => 'btn btn-success' )); ?>
    </div> <br>
<table class="table table-bordered table-striped">
    <!-- table heading -->
    <tr>
        <th><?php echo __('รหัส');?></th>
        <th><?php echo __('หน่วยนับ');?></th>
        <th><?php echo __('จัดการ');?></th>
    </tr>
 <tbody>
<?php
	//loop to show all retrieved records
	foreach( $uoms as $uom ){
	?>
		<tr>
			<td><?php echo $uom['Uom']['uom_id']?></td>
			<td><?php echo $uom['Uom']['uom_name']?></td>		
			<td class='actions'>
				<?php echo $this->Html->link( 'แก้ไข', array('action' => 'edit', 
					$uom['Uom']['uom_id']) , array(
                        'class' => 'btn btn-info' )); ?>
				
			<?php echo $this->Form->postLink( 'ลบ', array(
						'action' => 'delete',
						$uom['Uom']['uom_id']), array(
							'confirm'=>'Are you sure you want to delete that user?' ,
							 'class' => 'btn btn-info' )) ;?>
		</td>
		</tr>
	<?php } ?>
</tbody>
</table>