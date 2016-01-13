<div>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation">
      <?php echo $this->Html->link( 'หน้าแรก', array('controller'=>'pages','action' => 'home' 
      )); ?></li>
    <li role="presentation" class="active">
      <?php echo $this->Html->link( 'ประเภทพัสดุ', array('controller'=>'ProductTypes','
      	action' => 'view' 
      )); ?>
    </li>
  </ul>
</div>
<div class="row">
  <div class="col-xs-6 col-md-1"></div>
  <div class="col-xs-6 col-md-10">
	<H2><?php echo __('ประเภทพัสดุ');?></H2>

<!-- link to add new users page -->
	<div align = "right">
	<?php echo $this->Html->link( 'สร้างรายการ', array( 'action' => 'add' ) , array(
						'class' => 'btn btn-success' )); ?>
	</div> <br>

<table class="table table-bordered table-striped">
	<!-- table heading -->
	<tr>
		<th><?php echo __('รหัสประเภทพัสดุ');?></th>
		<th><?php echo __('ชื่อประเภทพัสดุ');?></th>
		<th><?php echo __('จัดการประเภทพัสดุ');?></th>
	</tr>
	<tbody>
<?php
	//loop to show all retrieved records
	foreach( $producttypes as $producttype ){
	?>
		<tr>
			 <td><?php echo $producttype['ProductType']['product_type_id']?></td>
			 <td><?php echo $producttype['ProductType']['product_type_name']?></td>			
			 <!-- here are the links to edit and delete actions -->
			 <td class='actions'>
                    <?php echo $this->Html->link( 'แก้ไข', array('action' => 'edit', 
                     $producttype['ProductType']['product_type_id']), array(
                        'class' => 'btn btn-info' )); ?>
                
                    <?php echo $this->Form->postLink( 'ลบ', array('action' => 'delete', 
                     $producttype['ProductType']['product_type_id']), array(
                            'confirm'=>'Are you sure you want to delete that ProductType?' ,
                            'class' => 'btn btn-info' )); ?>
            </td>
		</tr>
		<?php } ?>
	</tbody>
	</table>

	<div class="col-xs-6 col-md-1"></div>
	</div>
</div>
<script type="text/javascript">
    $("#search").fancybox({
        'width': '85%',
        'height': '250px',
        'autoScale': false,
        'autoSize': false,
        'transitionIn': 'none',
        'transitionOut': 'none',
        'type': 'inline',
        'scrolling': 'no'
    });
</script>