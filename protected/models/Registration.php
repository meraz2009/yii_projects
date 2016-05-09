<?php

/**
 * This is the model class for table "registration".
 *
 * The followings are the available columns in table 'registration':
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $country
 * @property boolean $gender
 * @property boolean $hobby
 * @property boolean $term_service
 */
class Registration extends CActiveRecord
{
	public $confirmPassword;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'registration';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, country, gender, hobby,confirmPassword', 'required'),
			array('password', 'compare', 'compareAttribute'=>'confirmPassword'),
			array('username, email, password', 'length', 'max'=>100),
			array('term_service', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, email, password,confirmPassword, country, gender, hobby, term_service', 'safe', 'on'=>'search'),
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
			'email' => 'Email',
			'password' => 'Password',
			'confirmPassword'=>'Confirm Password',
			'country' => 'Country',
			'gender' => 'Gender',
			'hobby' => 'Selects your hobby',
			'term_service' => 'Term Service',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('gender',$this->gender);
		$criteria->compare('hobby',$this->hobby);
		$criteria->compare('term_service',$this->term_service);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Registration the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
