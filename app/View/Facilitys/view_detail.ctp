<h1>รายการพัสดุ</h1>

<!-- link to add new users page -->
<div class='upper-right-opt'>
	<?php echo $this->Html->link( '+ สร้างรายการ', array( 'action' => 'add' ) ); ?>
</div>

<table style='padding:5px;' class="table">
	<!-- table heading -->
	<tr style='background-color:#fff;'>
		<th>รหัสพัสดุ</th>
		<th>รายการ</th>
		<th>ราคา</th>
		<th>หน่วย</th>
		<th>Email</th>
		<th>จัดการรายการ</th>
	</tr>
	
<?php

	
	//loop to show all retrieved records
	foreach( $users as $user ){
	
		echo "<tr>";
			echo "<td>{$user['User']['id']}</td>";
			echo "<td>{$user['User']['firstname']}</td>";
			echo "<td>{$user['User']['lastname']}</td>";
			echo "<td>{$user['User']['username']}</td>";
			echo "<td>{$user['User']['email']}</td>";
			
			//here are the links to edit and delete actions
			echo "<td class='actions'>";
				echo $this->Html->link( 'แก้ไข', array('action' => 'edit', $user['User']['id']) );
				
				//in cakephp 2.0, we won't use get request for deleting records
				//we use post request (for security purposes)
				echo $this->Form->postLink( 'ลบ', array(
						'action' => 'delete', 
						$user['User']['id']), array(
							'confirm'=>'Are you sure you want to delete that user?' ) );
			echo "</td>";
		echo "</tr>";
	}
?>
	
</table>