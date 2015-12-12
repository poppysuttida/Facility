<h2>เพิ่มรายการ</h2>

<!-- link to add new users page -->
<div class='upper-right-opt'>
	<?php echo $this->Html->link( 'รายการทั้งหมด', array( 'action' => 'view' ) ); ?>
</div>

<?php 
//this is our add form, name the fields same as database column names
echo $this->Form->create('Facility');

	echo $this->Form->input('facility_name');

echo $this->Form->end('Submit');

?>
	