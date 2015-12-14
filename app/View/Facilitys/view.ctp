<div class="row">
  <div class="col-xs-6 col-md-1"></div>
  <div class="col-xs-6 col-md-10">
	<H2><?php echo __('คลังพัสดุ');?></H2>
<!-- link to add new users page -->
	<div align = "right">
	<?php echo $this->Html->link( 'สร้างรายการ', array( 'action' => 'add' ) , array(
						'class' => 'btn btn-success' )); ?>
	</div> <br>

<table class="table table-condensed">
	<!-- table heading -->
	<tr>
		<th><?php echo __('รหัส');?></th>
		<th><?php echo __('ชื่อ');?></th>
		<th><?php echo __('จัดการ');?></th>
	</tr>
	
<?php
	//loop to show all retrieved records
	foreach( $facilitys as $facility ){
	?>
		<tr>
			 <td><?php echo $facility['Facility']['facility_id']?></td>
			 <td><?php echo $facility['Facility']['facility_name']?></td>			
			 <!-- here are the links to edit and delete actions -->
			<td class='actions'>
				<?php echo $this->Html->link( 'แก้ไข', array('action' => 'edit', 
					$facility['Facility']['facility_id']), array(
						'class' => 'btn btn-info' )); ?>
				
				<!-- in cakephp 2.0, we won't use get request for deleting records -->
				<!-- we use post request (for security purposes) -->
				<?php echo $this->Form->postLink( 'ลบ', array('action' => 'delete', 
						$facility['Facility']['facility_id']), array(
							'confirm'=>'Are you sure you want to delete that user?' ,'class' => 'btn btn-info' )); ?>
			</td>
		</tr>
		<?php } //End form ?>
	</table>

	<div class="col-xs-6 col-md-1"></div>
</div>