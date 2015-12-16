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