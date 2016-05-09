
<?php
class Users extends CActiveRecord

{
	public $password;
	//public $image;
	public $verifyCode;
	public function tableName()

	{
		return 'users';
	}

	public function rules()
	{
		return array(
			array('username', 'unique'),

			array('username', 'length', 'max'=>20),

			array('password', 'length', 'max'=>32),

			//array('fname, lname', 'length', 'max'=>64),

			array('email', 'email'),

		//	array('country, address', 'length', 'max'=>100),

			//verifyCode needs to be entered correctly

			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),


			// The following rule is used by search().

			//array('reg_image', 'on' => 'upload'),
			array('reg_image', 'file', 'types' => 'jpg,jpeg,gif,png', 'allowEmpty'=>FALSE,'maxSize' => 1024 * 1024 * 2, 'tooLarge' => 'Size should be less then 2MB !!!', 'on' => 'upload'),
			//array('reg_image', 'file', 'allowEmpty'=>FALSE,'types'=>'jpg,jpeg,gif,png','on'=>'update'),

			array('id, username, pwd_hash, email', 'safe', 'on'=>'search'),
		);
	}
	/**

	 * @return array relational rules.

	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related

		// class name for the relations automatically generated below.

		return array(
		);
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(

			'id' => 'ID',

			'username' => 'Username',

			'pwd_hash' => 'Password',

		//	'fname' => 'First Name',

			//'lname' => 'Last Name',

			'email' => 'Email',
			'reg_image'=>'User Image',
			'reg_time'=>'Registration Time',

			//'country' => 'Country',

			//'address' => 'Address',

		//	'gender' => 'Gender',

			'verifyCode'=>'Verification Code',
		);
	}
	public function search()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('pwd_hash',$this->pwd_hash,true);
	//	$criteria->compare('fname',$this->fname,true);
	///	$criteria->compare('lname',$this->lname,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('reg_time',$this->pwd_hash,true);
		$criteria->compare('reg_image',$this->pwd_hash,true);
		//$criteria->compare('reg_image',$this->reg_image,true);


		//$criteria->compare('country',$this->country,true);
		//$criteria->compare('address',$this->address,true);
		//$criteria->compare('gender',$this->gender,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	//Save encripted password
	/*public function hash($value){
		return crypt($value,'rl');
	}*/

	//calling hash to encrypt given password
/*	protected function beforeSave(){

		if(parent::beforeSave()){
			$this->pwd_hash = $this->hash($this->password);
			//print($this->pwd_hash);
			return true;
		}
		return false;
	}*/
	//check if the password is matched with stored encrypted password
/*	public function check($value){
		$new_hash = crypt($value, $this->pwd_hash);

		if($new_hash == $this->pwd_hash){
			return true;
		}
		return false;
	}*/
}
