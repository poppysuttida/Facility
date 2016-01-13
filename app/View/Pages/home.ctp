<br><br><br>
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-2">
		<div align = "center">
				<a href="<?php echo Router::url(array('controller'=>'Facilitys', 'action'=>'view')); ?>">
					<?php echo $this->Html->image('icon-1.png', array('alt' => 'Facility')); ?>
					<div class="menu-title">Facility</div>
					<div class="menu-sub-title-nowrap">คลังสินค้า</div>
					<div class="hover"></div>
				</a>
		</div>
	</div>	
	<div class="col-md-2">
		<div align = "center">
				<a href="<?php echo Router::url(array('controller'=>'Products', 'action'=>'view')); ?>">
					<?php echo $this->Html->image('icon-2.png', array('alt' => 'Product')); ?>
					<div class="menu-title">Product</div>
					<div class="menu-sub-title-nowrap">พัสดุ</div>
					<div class="hover"></div>
				</a>
		</div>
	</div>
	<div class="col-md-2">
		<div align = "center">
				<a href="<?php echo Router::url(array('controller'=>'ProdCatalogs', 
				'action'=>'view')); ?>">
					<?php echo $this->Html->image('icon-3.png', array('alt' => 
					'ProductCatalog')); ?>
					<div class="menu-title">ProductCatalog</div>
					<div class="menu-sub-title-nowrap">ชนิดพัสดุ</div>
					<div class="hover"></div>
				</a>
		</div>
	</div>
	<div class="col-md-2">
		<div align = "center">
				<a href="<?php echo Router::url(array('controller'=>'InventoryItems', 
				'action'=>'view')); ?>">
					<?php echo $this->Html->image('icon-4.png', array('alt' => 
					'InventoryItem')); ?>
					<div class="menu-title">InventoryItem</div>
					<div class="menu-sub-title-nowrap">สินค้านำเข้า</div>
					<div class="hover"></div>
				</a>
		</div>
	</div>
	<div class="col-md-2"></div>
</div>