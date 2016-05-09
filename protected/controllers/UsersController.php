<?php

class UsersController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','indexl','create','login','captcha'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','logged','adminl','delete'),
				'users'=>array('admin'),
			),
			array('deny',
			// deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
	/*	$model= LogInUserInfo::model()->findByPk(
			array('order'=>'t.id DESC',)
		);*/
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{

/*// output:http://localhost/ozv2 //absolute url
//output:D:\xampp\htdocs\oz\protected
echo yii::app()->basePath,"<br>";
//output:D:\xampp\htdocs\oz\protected
echo yii::app()->request->getRequestUri(),"<br>";
// output:/oz/url/urlpage
echo yii::app()->request->getUrl();
// output:url/urlpage/oz/url/urlpage
echo yii::app()->request->getPathInfo(),"<br>";
// output:url/urlpage
echo Yii::app()->createAbsoluteUrl('/'),"<br>";
//output:http://localhost/oz
echo Yii::app()->getHomeUrl(),"<br>";
//output:/oz/
echo Yii::app()->getViewPath(),"<br>";
//output:D:\xampp\htdocs\oz\protected\views
echo Yii::app()->getLayoutPath(),"<br>";*/



		$model=new Users;
		if(isset($_POST['ajax']) && $_POST['ajax']==='users-index-form')
		{
			echo CActiveForm::validate($model);

			Yii::app()->end();
		}

		if(isset($_POST['Users']))

		{

			$model->attributes=$_POST['Users'];
			$password=$_POST['Users']['pwd_hash'];
			$model->pwd_hash=md5($password);
			$model->reg_time=date("Y-m-d H:i:s");
			$image=$model->reg_image=CUploadedFile::getInstance($model,'reg_image');
			//print($model->reg_image);die;
			if($model->validate())

			{


			   $time=microtime();
				$image_name=$time."-".$image;
				$model->reg_image->saveAs('/var/www/html/sample/images/user_image/'.$image_name);
				$model->reg_image='/images/user_image/'.$image_name;

				//print($model->reg_image);die;
				//print($model->reg_image);die;
				if($model->save())

				{

					$this->redirect(array('site/login','id'=>$model->id));

				}
			}

		}

		$this->render('_form',array('model'=>$model));
	}
	/*	$model=new Users;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));*/


	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		//die("arif");

		if(isset($_POST['Users']))

		{

			$model->attributes=$_POST['Users'];
			$password=$_POST['Users']['pwd_hash'];
			$model->pwd_hash=md5($password);
			$model->reg_time=date("Y-m-d H:i:s");
			$image=$model->reg_image=CUploadedFile::getInstance($model,'reg_image');
			//print($model->reg_image);die;
			if($model->validate())

			{


				$time=microtime();
				$image_name=$time."-".$image;
				$model->reg_image->saveAs('/var/www/html/sample/images/user_image/'.$image_name);
				$model->reg_image='/images/user_image/'.$image_name;

				//print($model->reg_image);die;
				//print($model->reg_image);die;

				if($model->save())

				{

					$this->redirect(array('users/view','id'=>$model->id));

				}
			}

		}

		$this->render('update',array('model'=>$model));

	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{


		//Users::model()->findByAttributes(array('username'=>'admin', 'username'=>'tazrib'));
	//	die('hi');


		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Users');
	/*	echo "<pre>";print_r($dataProvider);echo "<pre>";die;*/
		$this->render('index',array(
			'dataProvider'=>$dataProvider,


			$dataProvider->sort->defaultOrder='id DESC',
		));
	}
	public function actionIndexl()
	{
		$model= Users::model()->findAll(
			array('order'=>'t.id DESC',)
		);
		//$dataProvider=new CActiveDataProvider('Users');
		/*	echo "<pre>";print_r($dataProvider);echo "<pre>";die;*/
		$this->render('view',array(
			'model'=>$model,


			//$dataProvider->sort->defaultOrder='id DESC',
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{

		$model=new Users('search');
/*	print_r($model);
		die;*/
		$model->unsetAttributes();
		/*print_r($model);
		die;*/
		// clear any default values
		if(isset($_GET['Users']))
			$model->attributes=$_GET['Users'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function actionAdminl()
	{

		$model=new LogInUserInfo('search');
		/*	print_r($model);
           	$model= LogInUserInfo::model()->findAll(
			array('order'=>'t.id DESC',)
		);     die;*/

	/*	$model= LogInUserInfo::model()->findAll(
			array('order'=>'t.id DESC',)
		);*/
	$model->unsetAttributes();
		/*print_r($model);
		die;*/
		// clear any default values
		if(isset($_GET['LogInUserInfo']))
			$model->attributes=$_GET['LogInUserInfo'];

		$this->render('adminl',array(
			'model'=>$model,

		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Users the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Users::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Users $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='users-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionLogged()
	{
		$model= LogInUserInfo::model()->findAll(
			array('order'=>'t.id DESC',)
		);
		//$dataProvider=new CActiveDataProvider('LogInUserInfo');
		$this->render('logged',array(
			'model'=>$model,
			//'dataProvider'=>$dataProvider,
			//$dataProvider->sort->defaultOrder='id DESC',
			));


	}
}
