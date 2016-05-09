<?php
/* @var $this LogInUserInfoController */
/* @var $model LogInUserInfo */

$this->breadcrumbs=array(
	'Log In User Infos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List LogInUserInfo', 'url'=>array('index')),
	array('label'=>'Create LogInUserInfo', 'url'=>array('create')),
	array('label'=>'Update LogInUserInfo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete LogInUserInfo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LogInUserInfo', 'url'=>array('admin')),
);
?>

<h1>View LogInUserInfo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'username',
		'password',
		'log_in_time',
		'log_out_time',
		'id',
	),
)); ?>
