<h2>แก้ไขรายการ</h2>

<!-- link to add new users page -->
<div class='upper-right-opt'>
	<?php echo $this->Html->link( 'รายการทั้งหมด', array( 'action' => 'index' ) ); ?>
</div>

<?php 
//this is our edit form, name the fields same as database column names
echo $this->Form->create('Facility');
	echo $this->Form->input('facility_name');
	
	
echo $this->Form->end('Submit');
?>

