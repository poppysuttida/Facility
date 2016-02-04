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
				<a href="<?php echo Router::url(array('controller'=>'ProdCatalogs', 'action'=>'view')); ?>">
					<?php echo $this->Html->image('icon-3.png', array('alt' => 'ProductCatalog')); ?>
					<div class="menu-title">ProductCatalog</div>
					<div class="menu-sub-title-nowrap">หมวดหมู่พัสดุ</div>
					<div class="hover"></div>
				</a>
		</div>
	</div>
	<div class="col-md-2">
		<div align = "center">
				<a href="<?php echo Router::url(array('controller'=>'ProductTypes', 
				'action'=>'view')); ?>">
					<?php echo $this->Html->image('icon-9.png', array('alt' => 
					'ProductType')); ?>
					<div class="menu-title">ProductType</div>
					<div class="menu-sub-title-nowrap">ประเภทพัสดุ</div>
					<div class="hover"></div>
				</a>
		</div>
	</div>
	<div class="col-md-2">
		<div align = "center">
				<a href="<?php echo Router::url(array('controller'=>'ProductCategorys', 
				'action'=>'view')); ?>">
					<?php echo $this->Html->image('icon-6.png', array('alt' => 
					'ProductCategory')); ?>
					<div class="menu-title">ProductCategory</div>
					<div class="menu-sub-title-nowrap">ชนิดพัสดุ</div>
					<div class="hover"></div>
				</a>
		</div>
	</div>
	<div class="col-md-2"></div>
</div>
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-2">
		<div align = "center">
				<a href="<?php echo Router::url(array('controller'=>'Products', 'action'=>'view')); ?>">
					<?php echo $this->Html->image('icon-11.png', array('alt' => 'Product')); ?>
					<div class="menu-title">Product</div>
					<div class="menu-sub-title-nowrap">พัสดุ</div>
					<div class="hover"></div>
				</a>
		</div>
	</div>	
	<div class="col-md-2">
		<div align = "center">
				<a href="<?php echo Router::url(array('controller'=>'InventoryItems', 'action'=>'view')); ?>">
					<?php echo $this->Html->image('icon-7.png', array('alt' => 'InventoryItem')); ?>
					<div class="menu-title">InventoryItem</div>
					<div class="menu-sub-title-nowrap">นำเข้าพัสดุ</div>
					<div class="hover"></div>
				</a>
		</div>
	</div>
	<div class="col-md-2">
		<div align = "center">
				<a href="<?php echo Router::url(array('controller'=>'ProductRequests', 
				'action'=>'view')); ?>">
					<?php echo $this->Html->image('icon-10.png', array('alt' => 
					'ProductsRequest')); ?>
					<div class="menu-title">ProductRequests</div>
					<div class="menu-sub-title-nowrap">ขอเบิกพัสดุ</div>
					<div class="hover"></div>
				</a>
		</div>
	</div>
	<div class="col-md-2">
		<div align = "center">
				<a href="<?php echo Router::url(array('controller'=>'FacilityChecks', 
				'action'=>'view')); ?>">
					<?php echo $this->Html->image('icon-5.png', array('alt' => 
					'FacilityCheck')); ?>
					<div class="menu-title">FacilityCheck</div>
					<div class="menu-sub-title-nowrap">ข้อมูลสรุป</div>
					<div class="hover"></div>
				</a>
		</div>
	</div>
	<div class="col-md-2"></div>
</div>