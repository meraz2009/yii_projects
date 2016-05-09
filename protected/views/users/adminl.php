
<?php
/* @var $this UsersController */
/* @var $model Users */

/*$this->breadcrumbs=array(
    'Users'=>array('index'),
    'Manage',
);

$this->menu=array(
    array('label'=>'List Users', 'url'=>array('index')),
    array('label'=>'Create Users', 'url'=>array('create')),
);*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#users-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

    <h1>Manage Logged In Users</h1>

    <p>
        You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
        or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
    </p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
    <div class="search-form" style="display:none">
        <?php $this->renderPartial('_searchl',array(
            'model'=>$model,
        )); ?>
    </div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'users-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
 /*   array(
        'name'=>'id',
        'value'=>'$model>id',
        'filter'=>false,
    ),*/
    'columns'=>array(
        array(
            'name'=>'id',
            'value'=>$model->id,
            'filter'=>false,

        ),
        'username',
       // 'pwd_hash',
      //  'email',
       // 'reg_image',
        array(
            'class'=>'CButtonColumn',
        ),
        array(

            'name'=>'log_in_time',
            'value'=>$model->log_in_time,
            'filter'=>false,
        ),
        array(

            'name'=>'log_out_time',

            'value'=>$model->log_out_time,
            'filter'=>false,
        ),

    ),
)); ?>