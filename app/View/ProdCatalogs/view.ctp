<div>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation">
      <?php echo $this->Html->link( 'หน้าแรก', array('controller'=>'pages','action' => 'home' 
      )); ?></li>
    <li role="presentation" class="active">
      <?php echo $this->Html->link( 'หมวดหมู่พัสดุ', array('controller'=>'ProdCatalogs','
      	action' => 'view' 
      )); ?>
    </li>
  </ul>
</div>
<div class="row">
  <div class="col-xs-6 col-md-1"></div>
  <div class="col-xs-6 col-md-10">
	<H2><?php echo __('รายการหมวดหมู่พัสดุ');?></H2>

<!-- link to add new users page -->
	<div align = "right">
	<?php echo $this->Html->link( 'สร้างรายการ', array( 'action' => 'add' ) , array(
						'class' => 'btn btn-success' )); ?>
	</div> <br>

<table class="table table-bordered table-striped">
	<!-- table heading -->
	<tr>
		<th><?php echo __('รหัส');?></th>
		<th><?php echo __('ชื่อ');?></th>
		<th><?php echo __('จัดการ');?></th>
	</tr>
	<tbody>
<?php
	//loop to show all retrieved records
	foreach( $prodcatalogs as $prodcatalog ){
	?>
		<tr>
			 <td><?php echo $prodcatalog['ProdCatalog']['product_catalog_id']?></td>
			 <td><?php echo $prodcatalog['ProdCatalog']['product_catalog_name']?></td>			
			 <!-- here are the links to edit and delete actions -->
			 <td class='actions'>
                    <?php echo $this->Html->link( 'แก้ไข', array('action' => 'edit', 
                     $prodcatalog['ProdCatalog']['product_catalog_id']), array(
                        'class' => 'btn btn-info' )); ?>
                
                    <?php echo $this->Form->postLink( 'ลบ', array('action' => 'delete', 
                     $prodcatalog['ProdCatalog']['product_catalog_id']), array(
                            'confirm'=>'Are you sure you want to delete that ProdCatalog?' ,
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