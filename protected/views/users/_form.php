<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See cl'enableClientValidation'=>true,ass documentation of CActiveForm for details on this.
	//'enableClientValidation'=>true,
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pwd_hash'); ?>
		<?php echo $form->textField($model,'pwd_hash',array('size'=>34,'maxlength'=>34)); ?>
		<?php echo $form->error($model,'pwd_hash'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>225)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<!--<div class="row">
		<?php /*echo $form->labelEx($model,'reg_image'); */?>
		<?php /*echo $form->textArea($model,'reg_image',array('rows'=>6, 'cols'=>50)); */?>
		<?php /*echo $form->error($model,'reg_image'); */?>
	</div>-->
	<div class="row">

		<?php echo $form->labelEx($model,'reg_image'); ?>

		<?php echo $form->fileField($model,'reg_image'); ?>

		<?php echo $form->error($model,'reg_image'); ?>

	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

	<?php if(CCaptcha::checkRequirements()): ?>

		<div class="row">

			<?php echo $form->labelEx($model,'verifyCode'); ?>

			<div>

				<?php $this->widget('CCaptcha'); ?>

				<?php echo $form->textField($model,'verifyCode'); ?>

			</div>

			<div class="hint">Please enter the letters as they are shown in the image above.

				<br/>Letters are not case-sensitive.</div>

			<?php echo $form->error($model,'verifyCode'); ?>

		</div>

	<?php endif; ?>


	<?php $this->endWidget(); ?>

<!--	<img src="images/2.jpg" alt="image not found"/>-->

</div><!-- form -->