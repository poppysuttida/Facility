<?php
/**
 * @comment 		Orders Menu
 * @projectCode	57LIQ01
 * @tor
 * @package			core
 * @author			Phada Woodtikarn (phada@sapphire.co.th)
 * @created			09/06/2015
 * @access			public
 */
?>
<?php
$subMenuList1 = array();
$subMenuList2 = array();
$subMenuList3 = array();
$subMenuList4 = array();
if (in_array('FACILITY_ADMIN', $this->Session->read('userlogin.group'))) {
    array_push($subMenuList1, array('name' => 'คลังสินค้า', 'controller' => 'facility_warehouses', 'action' => 'view', 'active' => 'warehouse', 'img' => 'menu_icon/main-menu-order.png'));
    array_push($subMenuList1, array('name' => 'ประเภทพัสดุ', 'controller' => 'facility_catalogs', 'action' => 'view', 'active' => 'catalog', 'img' => 'menu_icon/main-menu-accounting.png'));
    array_push($subMenuList1, array('name' => 'ชนิดพัสดุ', 'controller' => 'facility_categories', 'action' => 'view', 'active' => 'categorie', 'img' => 'menu_icon/menu-request.png'));
    array_push($subMenuList1, array('name' => 'พัสดุ', 'controller' => 'facility_products', 'action' => 'view', 'active' => 'product', 'img' => 'menu_icon/menu-order.png'));
    array_push($subMenuList2, array('name' => 'รับของเข้าคลัง', 'controller' => 'facility_into_warehouses', 'action' => 'view', 'active' => 'intowarehouses', 'img' => 'menu_icon/menu-agreement.png'));
    array_push($subMenuList2, array('name' => 'รับของเข้าคลัง(ไม่มีบัญชีคุม)', 'controller' => 'facility_receive_inventories', 'action' => 'view', 'active' => 'receiveinventories', 'img' => 'menu_icon/menu-agreement.png'));
    array_push($subMenuList2, array('name' => 'ข้อมูลสรุปพัสดุในคลัง', 'controller' => 'facility_products_center', 'action' => 'view', 'active' => 'productscenter', 'img' => 'menu_icon/main-menu-accounting.png'));
    array_push($subMenuList2, array('name' => 'ย้ายของภายในคลัง', 'controller' => 'facility_change_locations', 'action' => 'view', 'active' => 'changelocations', 'img' => 'menu_icon/menu-agreement.png'));
    array_push($subMenuList3, array('name' => 'อส.25', 'controller' => 'facility_month_report', 'action' => 'view_25', 'active' => 'monthreport', 'img' => 'menu_icon/menu-report.png'));
    array_push($subMenuList3, array('name' => 'อส.24', 'controller' => 'facility_month_report_detail', 'action' => 'view_24', 'active' => 'monthreportdetail', 'img' => 'menu_icon/menu-report.png'));
    array_push($subMenuList4, array('name' => 'การตรวจนับประจำปี', 'controller' => 'facility_year_checks', 'action' => 'view', 'active' => 'yearcheck', 'img' => 'menu_icon/menu-check.png'));
}
array_push($subMenuList2, array('name' => 'รายการขอเบิกจ่าย อส.1/10', 'controller' => 'facility_products_request', 'action' => 'view', 'active' => 'productsrequest', 'img' => 'menu_icon/menu-report.png'));

$active1 = array('warehouse', 'catalog', 'categorie', 'product');
$active2 = array('intowarehouses', 'receiveinventories', 'productscenter', 'changelocations', 'productsrequest');
$active3 = array('monthreport', 'monthreportdetail');
$active4 = array('yearcheck');
?>
<div id="navbar" class="collapse navbar-collapse">
    <ul class="nav navbar-nav navbar-top">
        <li class="dropdown">
            <a href="<?php echo Router::url(array('controller' => 'facility_products_request', 'action' => 'view')); ?>" class="navbar-img dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"  aria-expanded="false">
                <?php echo $this->Html->image('images_pack_20151119/icons_31.png', array('alt' => 'Facility', 'title' => 'Facility')); ?><span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
                <?php if (in_array('FACILITY_ADMIN', $this->Session->read('userlogin.group'))): ?>
                    <li  class="dropdown dropdown-submenu <?php echo in_array($menuActive, $active1) ? 'fc_active' : ''; ?>"><a href="#" class="dropdown-toggle" data-toggle="dropdown">การสร้างข้อมูลหลัก</a>
                        <ul class="dropdown-menu">
                            <?php foreach ($subMenuList1 as $value): ?>
                                <li class="<?php echo ($value['active'] == $menuActive) ? 'fc_active' : ''; ?>"><?php echo $this->Html->link(__($value['name']), array('controller' => $value['controller'], 'action' => $value['action'])); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li  class="dropdown dropdown-submenu <?php echo in_array($menuActive, $active2) ? 'fc_active' : ''; ?>"><a href="#" class="dropdown-toggle" data-toggle="dropdown">การปฏิบัติงานประจำวัน</a>
                        <ul class="dropdown-menu">
                            <?php foreach ($subMenuList2 as $value): ?>
                                <li class="<?php echo ($value['active'] == $menuActive) ? 'fc_active' : ''; ?>"><?php echo $this->Html->link(__($value['name']), array('controller' => $value['controller'], 'action' => $value['action'])); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li  class="dropdown dropdown-submenu <?php echo in_array($menuActive, $active3) ? 'fc_active' : ''; ?>"><a href="#" class="dropdown-toggle" data-toggle="dropdown">การปฏิบัติงานประจำเดือน</a>
                        <ul class="dropdown-menu">
                            <?php foreach ($subMenuList3 as $value): ?>
                                <li class="<?php echo ($value['active'] == $menuActive) ? 'fc_active' : ''; ?>"><?php echo $this->Html->link(__($value['name']), array('controller' => $value['controller'], 'action' => $value['action'])); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li  class="dropdown dropdown-submenu <?php echo in_array($menuActive, $active4) ? 'fc_active' : ''; ?>"><a href="#" class="dropdown-toggle" data-toggle="dropdown">การปฏิบัติงานประจำปี</a>
                        <ul class="dropdown-menu">
                            <?php foreach ($subMenuList4 as $value): ?>
                                <li class="<?php echo ($value['active'] == $menuActive) ? 'fc_active' : ''; ?>"><?php echo $this->Html->link(__($value['name']), array('controller' => $value['controller'], 'action' => $value['action'])); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                <?php else: ?>
                    <?php foreach ($subMenuList2 as $value): ?>
                        <li class="<?php echo ($value['active'] == $menuActive) ? 'fc_active' : ''; ?>"><?php echo $this->Html->link(__($value['name']), array('controller' => $value['controller'], 'action' => $value['action'])); ?></li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </li>
    </ul>
    <?php
    // Right Menu Contant Profile and Setting Menu
    echo $this->element('RightMenu');
    ?>
</div>
<style>
    .fc_active{
        background-color: #FFF !important;
    }
</style>
