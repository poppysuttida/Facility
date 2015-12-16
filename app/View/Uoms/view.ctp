<h1>หน่วยนับ</h1>

<!-- link to add new users page -->
<div class='upper-right-opt'>
	<?php echo $this->Html->link( '+ สร้างรายการ', array( 'action' => 'add' ) ); ?>
</div>

<table style='padding:5px;' class="table">
	<!-- table heading -->
	<tr style='background-color:#fff;'>
		<th>รหัส</th>
		<th>หน่วยนับ</th>
	</tr>
	
<?php
	//loop to show all retrieved records
	foreach( $uoms as $uom ){
	
		echo "<tr>";
			echo "<td>{$uom['Uom']['uom_id']}</td>";
			echo "<td>{$uom['Uom']['uom_name']}</td>";			
			//here are the links to edit and delete actions
			echo "<td class='actions'>";
				echo $this->Html->link( 'แก้ไข', array('action' => 'edit', $uom['Uom']['uom_id']) );
				
				//in cakephp 2.0, we won't use get request for deleting records
				//we use post request (for security purposes)
				echo $this->Form->postLink( 'ลบ', array(
						'action' => 'delete',
						$uom['Uom']['uom_id']), array(
							'confirm'=>'Are you sure you want to delete that user?' ) );
			echo "</td>";
		echo "</tr>";
	}
?>
</table>