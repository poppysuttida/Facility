<?php class User extends AppModel{
  public  $name = 'User';
  public  $validate = array(
   'username' => array (
    'notEmpty'=>array(
        'rule' => 'notEmpty','message'=>'กรุณากรอกUsername'
    ),'between'=>array(
   'rule'=>array('between',5,10),'message'=>'กรอกUsernameระหว่าง 5 - 10 ตัวอักษรเท่านั้น'//,'allowEmpty' => true
  ),'isUnique'=>array(
   'rule'=>'isUnique','message'=>'Username นี้มีผู้ใช้งานแล้ว'
  )
 ),'password'=>array(
  'notEmpty'=>array(
   'rule' => 'notEmpty','message'=>'กรุณากรอกPassword'
  ),'minLength'=>array(
   'rule'=>array('minLength', '5'),'message'=>'กรอกรหัสผ่านไม่น้อยกว่า 5 ตัวอักษร'
  ),'pass_equal'=>array(
   'rule' =>'chkPassEqual','message' => 'รหัสผ่านทั้งสองช่องไม่ตรงกัน'
  )
 ),'email'=>array(
  'notEmpty'=>array(
   'rule' => 'notEmpty','message'=>'กรุณากรอกอีเมล'
  ),'chkEmail'=>array(
   'rule'=>array('email',true),'message'=>'กรุณากรอกอีเมลให้ถูกต้อง'
  )
 ),'name'=>array(
  'notEmpty'=>array(
   'rule' => 'notEmpty','message'=>'กรุณากรอกชื่อสกุลให้ถูกต้อง'
  )
 ),'tel'=>array(
  'notEmpty'=>array(
   'rule' => 'notEmpty','message'=>'กรุณากรอกเบอร์โทรศัพท์'
  ),'chkPhone'=>array(
   'rule'=>'numeric','message'=>'กรอกเบอร์โทรศัพท์ไม่ถูกต้อง ตัวอย่าง 0823232323'
  )
 ),'address'=>array(
  'notEmpty'=>array(
   'rule' => 'notEmpty','message'=>'กรุณากรอกที่อยู่ให้ชัดเจน'
  )
 )
);
 public function chkPassEqual(){//ตรวจสอบว่ารหัสผ่านทั้งสองช่องตรงกันหรือไม่
  if($this->data['root@localhost']['']==$this->data['root@localhost'][''])
  {
      return true;
  }
  return false;
 }
}
?>