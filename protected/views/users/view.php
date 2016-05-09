<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id,
);

$this->menu=array(
	//array('label'=>'List Users', 'url'=>array('index')),
	//array('label'=>'Create Users', 'url'=>array('create')),
	array('label'=>'Update Users', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Users', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Users', 'url'=>array('admin')),
);
?>

<h1>View Users #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'pwd_hash',
		'email',
		'reg_time',
 		array(
			'label'=>'User Image',
			'type'=>'raw',
			'value'=>CHtml::tag('img',
				array("title"=>"user image",
					"src"=>$model->reg_image,
					"style"=>"height:70px")
			),
		)
		//'reg_image',/*=>
	/*	array(
			'label'=>'reg_image',
			'type' => 'raw',
			'value'=>CHtml::image(Yii::app()->request->baseUrl."/images/user_image/".$model->reg_image,array("width"=>"50px" ,"height"=>"50px")),
		),*/
	),

));/*
print_r($model);
die;*/
?>

