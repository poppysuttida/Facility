<div>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation">
      <?php echo $this->Html->link( 'หน้าแรก', array('controller'=>'pages','action' => 'home' )); ?></li>
      <li role="presentation">
      <?php echo $this->Html->link( 'รายการขอเบิกพัสดุ', array('controller'=>'ProductRequests','action' => 'view' )); ?></li>
      <li role="presentation" class="active">
      <?php echo $this->Html->link( 'ขอเบิกพัสดุ', array('controller'=>'ProductRequests','action' => 'add' )); ?></li>
  </ul>
</div>

    <head>
    <h2>ขอเบิกพัสดุ</h2>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script type="text/javascript" language="javascript" src="src/jquery-2.1.3.min.js"></script>
        <style>
        body { margin: 20px; background-color: #F5F5F5; } 
        body table { width: 80%; position: relative; margin: 0 auto !important; }
        body h2 { font-family: Thoma, Times, serif !important; font-size: 24pt; font-weight: bold; } 
        body pre { display: block; margin-top: 20px; padding: 9.5px; font-size: 13px; line-height: 20px; word-break: break-all; word-wrap: break-word; white-space: pre; white-space: pre-wrap; background-color: #FFFFFF; border: 1px solid #ccc; border: 1px solid rgba(0,0,0,0.15); -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; }
        
        input { font: 14px/1.6em arial; width: 200px; height: 30px; padding: 3px; margin: 5px; border: 1px solid #ccc; -moz-border-radius: 5px; -webkit-border-radius:5px; -o-border-radius:5px; -ms-border-radius:5px; border-radius:5px; }
        input:focus { border: 1px solid #77B3D8; -moz-box-shadow: 0 0 7px #C8E0EF; -webkit-box-shadow: 0 0 7px #C8E0EF; -o-box-shadow: 0 0 7px #C8E0EF; -ms-box-shadow: 0 0 7px #C8E0EF; box-shadow: 0 0 7px #C8E0EF; }
        
        table a:link { color: #666; font-weight: bold; text-decoration:none; }
        table a:visited { color: #999999; font-weight:bold; text-decoration:none; }
        table a:active, table a:hover { color: #bd5a35; text-decoration:underline; }
        table { font-family:Arial, Helvetica, sans-serif; color:#666; font-size:12px; text-shadow: 1px 1px 0px #fff; background:#eaebec; margin:20px; border:#ccc 1px solid; -moz-border-radius:3px; -webkit-border-radius:3px; border-radius:3px; -moz-box-shadow: 0 1px 2px #d1d1d1; -webkit-box-shadow: 0 1px 2px #d1d1d1; box-shadow: 0 1px 2px #d1d1d1; }
        table th { padding:21px 25px 22px 25px; border-top:1px solid #fafafa; border-bottom:1px solid #e0e0e0; background: #ededed; background: -webkit-gradient(linear, left top, left bottom, from(#ededed), to(#ebebeb)); background: -moz-linear-gradient(top,  #ededed,  #ebebeb); }
        table th:first-child { text-align: center; padding-left:20px; }
        table tr:first-child th:first-child { -moz-border-radius-topleft:3px; -webkit-border-top-left-radius:3px; border-top-left-radius:3px; }
        table tr:first-child th:last-child { -moz-border-radius-topright:3px; -webkit-border-top-right-radius:3px; border-top-right-radius:3px; }
        table tr { text-align: center; padding-left:20px; }
        table td:first-child { text-align: center; padding-left:20px; border-left: 0; }
        table td { padding:18px; border-top: 1px solid #ffffff; border-bottom:1px solid #e0e0e0; border-left: 1px solid #e0e0e0; background: #fafafa; background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa)); background: -moz-linear-gradient(top,  #fbfbfb,  #fafafa); }
        table tr.even td { background: #f6f6f6; background: -webkit-gradient(linear, left top, left bottom, from(#f8f8f8), to(#f6f6f6)); background: -moz-linear-gradient(top,  #f8f8f8,  #f6f6f6); }
        table tr:last-child td { border-bottom:0; }
        table tr:last-child td:first-child { -moz-border-radius-bottomleft:3px; -webkit-border-bottom-left-radius:3px; border-bottom-left-radius:3px; }
        table tr:last-child td:last-child { -moz-border-radius-bottomright:3px; -webkit-border-bottom-right-radius:3px; border-bottom-right-radius:3px; }
        table tr:hover td { background: #f2f2f2; background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0)); background: -moz-linear-gradient(top,  #f2f2f2,  #f0f0f0); }
        </style>
        <title>Automatic Dynamic Table</title>
    </head>
    <body>
        <form action="<?php echo Router::url(array('controller' => 'product_requests', 'action' => 'add')) ?>" method="post" id="productAddForm">
        <div class="row">
        <div class="col-xs-6 col-md-1"></div>
        <div class="col-xs-6 col-md-10">
            <div align = "right">
            <?php echo $this->Html->link( 'บันทึก', array( 'action' => 'add' ) , 
            array('class' => 'btn btn-primary' , 'id' => 'addItemData')); ?>
            </div> <br>
        </div>
        <div class="col-xs-6 col-md-1"></div>
        </div>
        <!-- <input type="button" id="addItemData" value="บันทึก" class="btn btn-primary"> -->

    <?php
    require_once('ADT.php');
    $ADT = new ADT();
    $ADT->column = array(
        array('ลำดับ', array('adt_type' => 'no')),
        array('รายการ', array(
            'adt_type' => 'input',
            'adt_attr' => array(
                array(
                    'adt_request' => true,
                    'adt_tag' => 'input',
                    'type' => 'hidden',
                    'name' => 'person_id',
                    'id' => 'person_id'
                ),
                array(
                    'adt_request' => true,
                    'adt_tag' => 'input',
                    'type' => 'text',
                    'name' => 'fullname',
                    'id' => 'fullname',
                    'onblur' => '$(\'#person_id\').val(this.value);'
                )
            )
        )),
        array('หน่วยนับ', array(
            'adt_type' => 'input',
            'adt_attr' => array(
                array(
                    'adt_request' => false,
                    'adt_tag' => 'input',
                    'type' => 'text',
                    'name' => 'position',
                    'id' => 'position'
                )
            )
        )),
        /*array('ประเภท', array(
            'adt_type' => 'input',
            'adt_attr' => array(
                array(
                    'adt_request' => true,
                    'adt_tag' => 'select',
                    'name' => 'position',
                    'id' => 'position',
                    'options' => array('พนักงาน', 'ลูกค้า')
                )
            )
        )),*/
        array('จำนวนที่ขอเบิก', array(
            'adt_type' => 'input',
            'adt_attr' => array(
                array('adt_request' => false,
                    'adt_tag' => 'input',
                    'type' => 'number',
                    'name' => 'descriptions',
                    'id' => 'descriptions',
                )
            )
        )),
        /*array('ราคา', array(
            'adt_type' => 'input',
            'adt_attr' => array(
                array(
                    'adt_request' => false,
                    'adt_sum' => true,
                    'adt_tag' => 'input',
                    'type' => 'text',
                    'name' => 'price',
                    'id' => 'price'
                ),
                array(
                    'adt_tag' => 'span',
                    'adt_html' => 'บาท',
                    'class' => ''
                )
            )
        )),*/
        array('จัดการ', array(
            'adt_type' => 'tools',
            'adt_attr' => array(
                'create' => array('label' => 'เพิ่ม'),
                'update' => array('label' => 'แก้ไข'),
                'delete' => array('label' => 'ลบ', 'confirm' => 'ต้องการลบข้อมูล?')
            )
        )),
    );
    $ADT->draw();
    
    //echo '<h2>DEBUG VALUE</h2><pre>'; print_r($ADT->column); echo '</pre>';//DEBUGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGG
    ?>
    <br>
 <div align = "center">
    <?php //echo $this->Html->link( 'เบิกพัสดุ', array( 'action' => '#' ) , array('class' => 'btn btn-success','id'=>'addItemData' )); ?>
    <!-- <input type="button" class="btn btn-success" id="addItemData" value="เบิกพัสดุ">  -->
</div>
</form>
    </body>

</html>
<script>

</script>