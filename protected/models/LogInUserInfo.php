<?php

/**
 * This is the model class for table "log_in_user_info".
 *
 * The followings are the available columns in table 'log_in_user_info':
 * @property string $username
 * @property string $password
 * @property string $log_in_time
 * @property string $log_out_time
 * @property integer $id
 */
class LogInUserInfo extends CActiveRecord
{
	public $rememberMe;
	private $_identity;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'log_in_user_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password', 'required'),
			array('username, password', 'length', 'max'=>100),
			array('rememberMe', 'boolean'),
			array('password', 'authenticate'),
			array('log_in_time, log_out_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('username, password, id','safe', 'on'=>'search'),
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
			'username' => 'Username',
			'password' => 'Password',
			'log_in_time' => 'Log In Time',
			'log_out_time' => 'Log Out Time',
			'id' => 'ID',
			'rememberMe'=>'Remember me next time',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		//$criteria->compare('log_in_time',$this->log_in_time,true);
		//$criteria->compare('log_out_time',$this->log_out_time,true);
		$criteria->compare('id',$this->id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return LogInUserInfo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			if(!$this->_identity->authenticate())
				//die('hi');
				$this->addError('password','Incorrect username or password.');
		}
	}
	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			return false;
	}

}
