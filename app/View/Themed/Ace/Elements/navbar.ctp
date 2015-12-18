<?php
function menuActive($menu = '',$menuActive = '',$class = true){
	if($menu != '' && $menu == $menuActive){
		if($class == true){
			echo 'class="active"';
		}else{
			echo 'active';
		}
	}
}
?>
<div id="navbar-menu" class="navbar-menu">
		<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">ERP</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
				</button>
				<a href="<?php echo Router::url(array('controller'=>'menus', 'action'=>'index')); ?>" class="navbar-brand navbar-img">
					<?php echo $this->Html->image('icon-liq.png', array('alt' => 'Applications','titel' => 'Applications')); ?>
				</a>
		</div>
<?php
if(isset($menuActive)){
	if($menuTab == 'Orders'){
		$mainMenu = array('controller'=>'orders','action'=>'index','img'=>'menu_order.png','alt'=>'Order','title'=>'Order');
		// inclue Orders Menu
		echo $this->element('OrdersMenu');
	}else if($menuTab == 'Accountings'){
		// inclue Accountings Menu
		echo $this->element('AccountingsMenu');
	}else if($menuTab == 'Menus'){
		// inclue Menu
		echo $this->element('Menu');
	}else if($menuTab == 'Finances'){
		// inclue Finances Menu
		echo $this->element('FinancesMenu');
	}else if($menuTab == 'Menufacturings'){
		// inclue Menufacturings Menu
		echo $this->element('MenufacturingsMenu');
	}else if($menuTab == 'Facilities'){
		// inclue Facilities Menu
		echo $this->element('FacilitiesMenu');
	}
}
?>
</div>
