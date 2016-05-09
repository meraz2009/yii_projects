<?php
/* @var $this LogInUserInfoController */
/* @var $model LogInUserInfo */

$this->breadcrumbs=array(
	'Log In User Infos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LogInUserInfo', 'url'=>array('index')),
	array('label'=>'Manage LogInUserInfo', 'url'=>array('admin')),
);
?>

<h1>Create LogInUserInfo</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>