<div class="row center">
    <div class="col-md-4">
        <div class="h2">
                <?php echo __('เข้าสู่ระบบ');?>
        </div>
    </div>
</div>

<div class="row">
<div class="col-md-12">
            <?php echo $this->Form->create('User'); ?>

<div class="h3">
                <?php echo __('ชื่อผู้ใช้');?>
        </div>
        <div class="col-sm-4">
            <?php echo $this->Form->input('User_Name', array('label' => false, 
                'div' => false,
                'type' => 'text', 
                'class' => 'form-control'));?> 
        </div>
</div>
</div>

<div class="row">
<div class="h3">
                <?php echo __('รหัสผ่าน');?>
        </div>
        <div class="col-sm-4">
            <?php echo $this->Form->input('Pass_word', array('label' => false, 
                'div' => false,
                'type' => 'password', 
                'class' => 'form-control'));?> 
        </div>
</div><br>
<div class="row">
<div class="form-group title">
    <div class="col-sm-4">
    <?php echo $this->Form->input('ลงชื่อเข้าใช้', array('label' => false, 
                'div' => false,
                'type' => 'submit', 
                'class' => 'btn btn-info form-control'));?>
</div>
</div>
</div>

