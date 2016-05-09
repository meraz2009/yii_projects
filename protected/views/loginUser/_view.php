<?php
/* @var $this LoginUserController */
/* @var $data LoginUser */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('log_in_time')); ?>:</b>
	<?php echo CHtml::encode($data->log_in_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('log_out_time')); ?>:</b>
	<?php echo CHtml::encode($data->log_out_time); ?>
	<br />


</div>