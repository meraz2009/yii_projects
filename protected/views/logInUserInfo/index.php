<?php
/* @var $this LogInUserInfoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Log In User Infos',
);

$this->menu=array(
	array('label'=>'Create LogInUserInfo', 'url'=>array('create')),
	array('label'=>'Manage LogInUserInfo', 'url'=>array('admin')),
);
?>

<h1>Log In User Infos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
