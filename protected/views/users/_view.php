<?php
/* @var $this UsersController */
/* @var $data Users */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php /*echo CHtml::encode($data->id); */?>
  <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pwd_hash')); ?>:</b>
	<?php echo CHtml::encode($data->pwd_hash); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<?php echo CHtml::encode($data->getAttributeLabel('reg_image')); ?>:</b>
		<?php echo CHtml::image($data->reg_image); ?>
	<br />
	<?php echo CHtml::encode($data->getAttributeLabel('reg_time')); ?>:</b>
	<?php echo CHtml::encode($data->reg_time); ?>


</div>