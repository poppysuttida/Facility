<div>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation">
      <?php echo $this->Html->link( 'หน้าแรก', array('controller'=>'pages','action' => 'home' 
      )); ?></li>
    <li role="presentation" class="active">
      <?php echo $this->Html->link( 'คลังพัสดุ', array('controller'=>'Facilitys','action' => 'view' 
      )); ?>
    </li>
  </ul>
</div>
<div class="row">
  <div class="col-xs-6 col-md-1"></div>
  <div class="col-xs-6 col-md-10">
	<H2><?php echo __('รายการคลังพัสดุ');?></H2>
	<div class="form-group" id="searchform">
        <div class="col-md-12">
        <div class="col-sm-9" align = "right">
        	<?php echo $this->Form->create('Facility', array('name' => 'FindFacility', 
        'type' => 'get', 'url' => array('controller' => 'Facilitys', 
        'action' => 'view'), 'class' => 'form-horizontal')); ?>
        	<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
        	<?php echo __('ชื่อคลังพัสดุ'); ?>
    	</div>
		<div class="col-sm-3">
			<?php echo $this->Form->input('facility_name', array('label' => false, 'div' => false,'class' => 'nav-search-input', 
                    'type' => 'text',
                    'value' => isset($this->params->query['facility_name'])?
                    $this->params->query['facility_name']: '')); ?>
            &nbsp;&nbsp;&nbsp;
             <a href="<?php echo Router::url(array('controller'=>'Facilitys', 'action'=>'add')); ?>">
            <?php echo $this->Html->image('icon-create.png', 
            array('alt' => 'Facility')); ?> </a>
        </div>
		</div>
    </div><br><br>
<!-- link to add new users page -->
<!-- 	<div align = "right">
	<?php echo $this->Html->link( 'สร้างรายการ', array( 'action' => 'add' ) , array(
						'class' => 'btn btn-success' )); ?>
	</div> --> 

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
	foreach( $facilitys as $facility ){
	?>
		<tr>
			 <td><?php echo $facility['Facility']['facility_id']?></td>
			 <td><?php echo $facility['Facility']['facility_name']?></td>			
			 <!-- here are the links to edit and delete actions -->
			 <td class='actions'>
				<?php echo $this->Html->link( '', array('action' => 'edit', 
					$facility['Facility']['facility_id']), array(
						'class' => 'ace-icon fa fa-pencil bigger-130' )); ?>

				<!--<?php echo $this->Html->link($this->Html->tag('span', '', 
				array('class' => 'vbar')),
				array('controller'=>'facilitys',
				'action'=>'edit',$facility['Facility']['facility_id']), 
				array('class'=>'ace-icon fa fa-pencil bigger-130'));  ?>-->

				<!-- in cakephp 2.0, we won't use get request for deleting records -->
				<!-- we use post request (for security purposes) -->
				<?php echo $this->Form->postLink( '', array('action' => 'delete', 
					$facility['Facility']['facility_id']), array(
						'confirm'=>'Are you sure you want to delete that Facility?' ,'class' => 'ace-icon fa fa-trash-o bigger-130' )); ?>
		<div class="pull-right action-buttons">
		<a href="#" class="blue">
			<i class="ace-icon fa fa-pencil bigger-130"></i>
		</a>

		<span class="vbar"></span>

		<a href="#" class="red">
			<i class="ace-icon fa fa-trash-o bigger-130"></i>
		</a>

		<span class="vbar"></span>
	</div>
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