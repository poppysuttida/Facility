<div class="row">
  <div class="col-xs-6 col-md-4"></div>
  <div class="col-xs-6 col-md-4" align = "center">
    <b><H1><?php echo __('เข้าสู่ระบบ');?></H1></b>
    </div>
    <div class="col-xs-6 col-md-4"></div>
</div><br>

<div class="row">
  <div class="col-xs-6 col-md-3"></div>
  <div class="col-xs-6 col-md-6" align = "center">
    <div class="form-group">
             <?php echo $this->Form->create('User'); ?>
        <div class="col-md-12">
        <div class="col-sm-3" align = "right">
            <b><H4><?php echo __('ชื่อผู้ใช้'); ?></H4></b>
        </div>
        <div class="col-sm-6">
            <?php echo $this->Form->input('User_Name', array('label' => false, 
                'div' => false,
                'type' => 'text', 
                'class' => 'form-control'));?> 
        </div>
        <div class="col-sm-3"></div>
        </div>
    <div class="col-xs-6 col-md-3"></div>
  </div>
  </div>
</div><br>

<div class="row">
  <div class="col-xs-6 col-md-3"></div>
  <div class="col-xs-6 col-md-6" align = "center">
    <div class="form-group">
        <div class="col-md-12">
        <div class="col-sm-3" align = "right">
            <b><H4><?php echo __('รหัสผ่าน'); ?></H4></b>
        </div>
        <div class="col-sm-6">
            <?php echo $this->Form->input('Pass_word', array('label' => false, 
                'div' => false,
                'type' => 'password', 
                'class' => 'form-control'));?> 
        </div>
        <div class="col-sm-3"></div>
        </div>
    <div class="col-xs-6 col-md-3"></div>
  </div>
  </div>
</div><br>

<div class="row">
  <div class="col-xs-6 col-md-3"></div>
  <div class="col-xs-6 col-md-6" align = "center">
    <div class="form-group">
        <div class="col-md-12">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <?php echo $this->Form->input('ลงชื่อเข้าใช้', array('label' => false, 
                'div' => false,
                'type' => 'submit', 
                'class' => 'btn btn-info form-control'));?>
        </div>
        <div class="col-sm-3"></div>
        </div>
    <div class="col-xs-6 col-md-3"></div>
  </div>
  </div>
</div>