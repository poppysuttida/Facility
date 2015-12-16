<div class="row">
    <div class="col-md-12">
        <div class="form-group title">
                <?php
                echo __('รายการพัสดุ');
	?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table" id="table_data">
            <thead>
                <tr>
                    <th style="width: 10%"></th>
                    <th><?php echo __('รหัสพัสดุ'); ?></th>
                    <th><?php echo __('รายการพัสดุ'); ?></th>
                    <th><?php echo __('ราคา (บาท) / หน่วย'); ?></th>
                    <th><?php echo __('หน่วยนับ'); ?></th>
                    <th><?php echo __('คลัง'); ?></th>
                </tr>
            </thead>
            <tbody>
                <tr class="tr-link" onclick="document.location = '<?php echo Router::url(array('controller'=>'products', 'action'=>'show',$value['Product']['product_id'])); ?>'"> <th style="width: 10%"></th>
                    <td class="right"><?php echo __('ๆๆๆๆๆ'); ?></td>
                    <td class="center"><?php echo __('ปริมาณถือครอง'); ?></td>
                    <td class="right"><?php echo __('ปริมาณถือครอง'); ?></td>
                    <td class="right"><?php echo __('ปริมาณถือครอง'); ?></td>
                    <td class="right"><?php echo __('ปริมาณถือครอง'); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<!--
<div class="row" id="searchform" style="display:none;">
    <div class="col-md-12">
        <div class="form-group title">
          <?php echo __('กรองข้อมูล'); ?>
        </div>
    <?php echo $this->Form->create(null, array('name' => 'FindRequest', 'type' => 'get', 'url' => array('controller' => 'facility_products', 'action' => 'view'), 'class' => 'form-horizontal')); ?>
        <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo __('รหัส'); ?></label>
            <div class="col-sm-6">
                <?php echo $this->Form->input('detail_screen', array('label' => false, 'type' => 'text','div' => false, 'class' => 'form-control',
                    'value' => isset($this->params->query['detail_screen'])? $this->params->query['detail_screen']: '')); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo __('เลขบาร์โค้ด'); ?></label>
            <div class="col-sm-6">
                <?php echo $this->Form->input('inventory_message', array('label' => false, 'type' => 'text','div' => false, 'class' => 'form-control',
                    'value' => isset($this->params->query['inventory_message'])? $this->params->query['inventory_message']: '')); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo __('ชื่อ'); ?></label>
            <div class="col-sm-6">
                <?php echo $this->Form->input('cust_request_id', array('label' => false, 'type' => 'text','div' => false, 'class' => 'form-control',
                    'value' => isset($this->params->query['cust_request_id'])? $this->params->query['cust_request_id']: '')); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo __('ระบุการขึ้นทะเบียน'); ?></label>
            <div class="col-sm-6">
                <?php 
                echo $this->Form->input('productbrandname', array('label' => false, 'div' => false, 'class' => 'form-control',
                    'options' => array('' => '--ไม่ระบุ--', 'Product_Register' => 'พัสดุที่ขึ้นทะเบียน', 'Product_Unregister' => 'พัสดุที่ไม่ขึ้นทะเบียน', 'ProductProduct' => 'สินค้า'),
                  'value' => isset($this->params->query['productbrandname'])? $this->params->query['productbrandname']: '')); 
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label"></label>
            <div class="col-sm-6">
                <?php echo $this->Form->submit(__('ค้นหา'), array('class' => 'btn btn-default')); ?>
            </div>
        </div>
    </div>
        <?php echo $this->Form->end(); ?>
    
    
          
</div>

<script type="text/javascript">
    $("#search").fancybox({
        'width': '65%',
        'height': '280px',
        'autoScale': false,
        'autoSize': false,
        'transitionIn': 'none',
        'transitionOut': 'none',
        'type': 'inline',
        'scrolling': 'no'
    });
</script>
-->
