<br><br><br>
<div class="row">
	<div class="col-md-4"></div>
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
					<?php echo $this->Html->image('icon-2.png', array('alt' => 'Facility')); ?>
					<div class="menu-title">Facility</div>
					<div class="menu-sub-title-nowrap">พัสดุ</div>
					<div class="hover"></div>
				</a>
		</div>
	</div>
	<div class="col-md-4"></div>
</div>