<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: registration.php?r=site/page&view=FileName
			'users'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		//die;// renders the view file 'protected/views/site/registration.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{

		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LogInUserInfo();

		// if it is ajax validation request
	/*	if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}*/


		// collect user input data
		if(isset($_POST['LogInUserInfo']))
		{
			$model->attributes=($_POST['LogInUserInfo']);
			$model->password=trim($_POST['LogInUserInfo']['password']);
			//die($model->password);
			/*print_r($model->attributes);
			die;*/
		//	$username=$_POST['LogInUserInfo']['username'];

			/*$cookie_name = $username;
			$cookie_value =LogInUserInfo::model()->findByAttributes(array('username'=>$username));
			print_r($cookie_value);
			die;
			setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");*/ // 86400 = 1 day

			/*$password=$_POST['LogInUserInfo']['password'];
			$model->password=md5($password);*/
			/*print($model->password);
			die();*/
			$model->log_in_time=date("Y-m-d H:i:s");

			// validate user input and redirect to the previous page if valid
			//
			if($model->validate() &&  $model->login())
			/*	die($model->password);*/


	/*			$log_sql="CREATE TABLE log_in_user_info(
			id serial,
			username varchar(100),
			log_in_time timestamp default CURRENT_TIMESTAMP,
			log_out_time timestamp,
			PRIMARY KEY (id)
		)";*/
//Yii::app()->createUrl
			/*	print(yii::app()->session['password']);
			die;*/
		/*		print_r($model->attributes);
			die;*/
				if($model->save()){
				/*	print_r($model->attributes);
					die;*/


					//yii::app()->session['username']=$model->id;

					/*echo "<pre>";
					print_r($model);
					echo "</pre>";*/
					yii::app()->session['user_id']=$model->id;



				//	die(yii::app()->session['user_id'].'airf');
					//die();

					yii::app()->session['username']=trim($_POST['LogInUserInfo']['username']);
					yii::app()->session['password']=trim($_POST['LogInUserInfo']['password']);
			/*		print(yii::app()->session['password']);
					die;*/


					//die('ui');//,'id'=>$model->id
					$this->redirect(array('users/index','id'=>$model->id));
					//$this->redirect(Yii::app()->createUrl('users/create'));
					//  echo"you r logged in";
				}
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		$user_id=yii::app()->session['user_id'];

		$username=yii::app()->session['username'];
		//$model=new LogInUserInfo();
		//$model=$model->loaddModel($username);

		//$model=new LogInUserInfo;
	//	$model=new LogInUserInfo();
		//$time=date("Y-m-d");

		/*$sql="update log_in_user_info set log_out_time=".$time." where username=$username ";
		//Yii::app()->db->createCommand($sql)->execute();
		Yii::app()->db->createCommand($sql)->execute();*/
		$model=LogInUserInfo::model()->findByAttributes(array('username'=>$username,'id'=>$user_id));
	/*	print_r($model);
		die;*/
		$model->log_out_time=date("Y-m-d H:i:s");
		//$model->log_in_time=date("Y-m-d H:i:s");
		$model->attributes;
	/*	print_r($model->attributes);
		die;*/
		//print_r($model);
		$model->update();
			//die('success');

		Yii::app()->user->logout();
		//	$model->log_out_time=date("Y-m-d H:i:s");
		//print_r($model->log_out_time);
		//	die();
		//$model = LogInUserInfo::model()->findByAttributes(array('username'=>$username));*/
		//Yii::app()->user->logout();
		/*
                if ($model->load(Yii::$app->request->post()))
                        $model->log_out_time=date("Y-m-d H:i:s");*/




		$this->redirect(Yii::app()->homeUrl);

	}
	public static function feed_keys(){
		$feed_keys = array(
			'1'=>'IH',
			'2'=>'FK',
			'3'=>'LG',
			'4'=>'TP',
			'5'=>'BP',
			'6'=>'LR',
			'7'=>'RU',
			'9'=>'RO',
			'10'=>'HT'
		);
		return $feed_keys;
	}
	public function actiongetFeed(){
		$feeds=self::feed_keys();
		foreach($feeds as $feed)
		{
			echo $feed."<br>";
		}

	}

	public function loaddModel($username)
	{
		$model=$model=LogInUserInfo::model()->findByAttributes(array('username'=>$username));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
/*	public function actionCreate()
	{
		$model = new Status();

		if ($model->load(Yii::$app->request->post())) {
			$model->created_at = time();
			$model->updated_at = time();
			if ($model->save()) {
				return $this->redirect(['view', 'id' => $model->id]);
			}
		}
		return $this->render('create', [
			'model' => $model,
		]);
	}*/


/*	public function actionLogged()
	{
		$model= LogInUserInfo::model()->findAll();
		$this->render('logged',array(
			'model'=>$model));


	}*/
/*	public function log_in_user_table()
	{
		$criteria=new CDbCriteria;
		$log_sql="CREATE TABLE log_in_user_info(
			id serial,
			username varchar(100),
			log_in_time timestamp default CURRENT_TIMESTAMP,
			log_out_time timestamp,
			PRIMARY KEY (id)
		)";
		createCommand($sql)
	}*/
}