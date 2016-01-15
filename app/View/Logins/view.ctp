<div class="row">
    <div class="col-md-12">
        <div class="form-group title">
                <?php
                echo __('เข้าสู่ระบบ');
	?>
        </div>
    </div>
</div>
<div class="row">
<div class="col-md-10">
            <?php echo $this->Form->create('ProductCategory'); ?>
<div class="form-group title">
                <?php
                echo __('UserName');
    ?>
        </div>
        <div class="col-sm-4">
            <?php echo $this->Form->input('User_Name', array('label' => false, 
                'div' => false,
                'type' => 'text', 
                'class' => 'form-control'));?> 
        </div>
</div>
<div class="row">
<div class="form-group title">
                <?php
                echo __('Password');
    ?>
        </div>
        <div class="col-sm-4">
            <?php echo $this->Form->input('Pass_word', array('label' => false, 
                'div' => false,
                'type' => 'password', 
                'class' => 'form-control'));?> 
        </div>
</div>
<div class="row">
<div class="form-group title">
    <?php echo $this->Form->input('ลงชื่อเข้าใช้', array('label' => false, 
                'div' => false,
                'type' => 'submit', 
                'class' => 'btn btn-info form-control'));?>
</div>
</div>

        </div>