<h1>รายการพัสดุ</h1>

<!-- link to add new users page -->
<div class='upper-right-opt'>
	<?php echo $this->Html->link( '+ สร้างรายการ', array( 'action' => 'add' ) ); ?>
</div>

<table style='padding:5px;' class="table">
	<!-- table heading -->
	<tr style='background-color:#fff;'>
		<th>รหัสคลังพัสดุ</th>
		<th>รายการคลังพัสดุ</th>
		<th>จัดการรายการ</th>
	</tr>
	
<?php

	
	//loop to show all retrieved records
	foreach( $facilitys as $facility ){
	
		echo "<tr>";
			echo "<td>{$facility['Facility']['facility_id']}</td>";
			echo "<td>{$facility['Facility']['facility_name']}</td>";			
			//here are the links to edit and delete actions
			echo "<td class='actions'>";
				echo $this->Html->link( 'แก้ไข', array('action' => 'edit', $facility['Facility']['facility_id']) );
				
				//in cakephp 2.0, we won't use get request for deleting records
				//we use post request (for security purposes)
				echo $this->Form->postLink( 'ลบ', array(
						'action' => 'delete', 
						$facility['Facility']['facility_id']), array(
							'confirm'=>'Are you sure you want to delete that user?' ) );
			echo "</td>";
		echo "</tr>";
	}
?>
	
</table>