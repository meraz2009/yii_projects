<?php
/* @var $this LoginUserController */
/* @var $model LoginUser */

$this->breadcrumbs=array(
	'Login Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LoginUser', 'url'=>array('index')),
	array('label'=>'Manage LoginUser', 'url'=>array('admin')),
);
?>

<h1>Create LoginUser</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>