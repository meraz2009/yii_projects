<?php
/* @var $this LogInUserInfoController */
/* @var $model LogInUserInfo */

$this->breadcrumbs=array(
	'Log In User Infos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List LogInUserInfo', 'url'=>array('index')),
	array('label'=>'Create LogInUserInfo', 'url'=>array('create')),
	array('label'=>'View LogInUserInfo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage LogInUserInfo', 'url'=>array('admin')),
);
?>

<h1>Update LogInUserInfo <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>