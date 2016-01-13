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
      <li role="presentation" class="active">
      <?php echo $this->Html->link( 'ที่ตั้งคลังพัสดุ', array('controller'=>'Facilitylocations','action' => 'view' )); 
      ?></li>
  </ul>
</div>
<div class="row">
  <div class="col-xs-6 col-md-1"></div>
  <div class="col-xs-6 col-md-10">
    <H2><?php echo __('ที่ตั้งคลังพัสดุ');?></H2>

<!-- link to add new users page -->
<div align = "right">
    <?php echo $this->Html->link( 'สร้างรายการ', array( 'action' => 'add' ) , 
    array('class' => 'btn btn-success' )); ?>
    </div> <br>
<table class="table table-bordered table-striped">
    <!-- table heading -->
    <tr>
        <th><?php echo __('รหัสที่ตั้ง');?></th>
        <th><?php echo __('ชื่อที่ตั้งคลังพัสดุ');?></th>
        <th><?php echo __('จัดการที่ตั้งคลังพัสดุ');?></th>
    </tr>
 <tbody>
<?php
	//loop to show all retrieved records
	foreach( $facilitylocations as $facilitylocation ){
	?>
		<tr>
			<td><?php echo $facilitylocation['Facilitylocation']['location_id']?></td>
			<td><?php echo $facilitylocation['Facilitylocation']['location_name']?></td>		
			<td class='actions'>
				<?php echo $this->Html->link( 'แก้ไข', array('action' => 'edit', 
					$facilitylocation['Facilitylocation']['location_id']) , array(
                        'class' => 'btn btn-info' )); ?>
				
			<?php echo $this->Form->postLink( 'ลบ', array(
						'action' => 'delete',
						$facilitylocation['Facilitylocation']['location_id']), array(
							'confirm'=>'ต้องการลบข้อมูลนี้หรือไม่?' ,
							 'class' => 'btn btn-info' )) ;?>
		</td>
		</tr>
	<?php } ?>
</tbody>
</table>