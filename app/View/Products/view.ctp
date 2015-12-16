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
		<th>คลังพัสดุ</th>
		<th>จัดการรายการ</th>
	</tr>
   <tbody>
            <?php 
                if(isset($result)):
                    foreach ($result AS $key => $value):?>
                <tr>
                    <td class="center"><?php echo $value['Product']['product_id']; ?></td>
                    <td class="left"><?php echo $value['Product']['product_name']; ?></td>
                    <td class="left"><?php echo $value['Product']['product_price']; ?></td>
                    <td class="left"><?php echo $value['Uom']['uom_name']; ?></td>
                    <td class="left"><?php echo $value['Facility']['facility_name']; ?></td>
                    <td class='center'><?php echo $this->Html->link( 'แก้ไข', array('action' => 'edit', $value['Product']['product_id']) );?>

                    	<?php echo $this->Form->postLink( 'ลบ', array('action' => 'delete',
						$value['Product']['product_id']), array('confirm'=>'Are you sure you want to delete that user?' ) );?></td>
                </tr>
            	<?php
                    endforeach;
                endif;
                ?>
            </tbody>
            </table>