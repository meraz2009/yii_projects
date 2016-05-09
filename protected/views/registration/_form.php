<?php
/* @var $this RegistrationController */
/* @var $model Registration */
/* @var $form CActiveForm */
?>
<?php /*$form=$this->beginWidget('CActiveForm', array(
	'id'=>'registration-form',
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
	'enableAjaxValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
		'afterValidate'=>'js:function(form,data,hasError){
                        if(!hasError){
                                $.ajax({
                                        "type":"POST",
                                        "url":"'.CHtml::normalizeUrl(array("test/eleven")).'",
                                        "data":form.serialize(),
                                        "success":function(data){$("#test").html(data);},

                                        });
                                }
                        }'
	),
)); */?>


<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'registration-form',
		'htmlOptions' => array('enctype'=>'multipart/form-data'),
		'enableAjaxValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
			'afterValidate'=>'js:function(form,data,hasError){
                        if(!hasError){
                                $.ajax({
                                        "type":"POST",
                                        "url":"'.CHtml::normalizeUrl(array("registration/create")).'",
                                        "data":form.serialize(),
                                        "success":function(data){$("#test").html(data);},

                                        });
                                }
                        }'
		),
	)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'confirmPassword'); ?>
		<?php echo $form->passwordField($model,'confirmPassword',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'confirmPassword'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'country'); ?>
		<?php /*echo $form->textArea($model,'country',array('rows'=>6, 'cols'=>50)); */?>
		<?php echo $form->dropDownList($model,'country',array('bangladesh'=>'Bangladesh','india'=>'India','canada'=>'Canada','china'=>'China','pakistan'=>'Pakistan'), array('options' => array('1'=>array('selected'=>true))));?>
		<?php echo $form->error($model,'country'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gender'); ?>
		<?php /*echo $form->checkBox($model,'gender'); */?>
		<?php echo CHtml::activeRadioButtonList($model,'gender',array('male'=>'Male','female'=>'Female'), array( 'separator' => "<br>"));?>

		<?php /*echo $form->radioButton($model,'gender',array('1'=>'Male','2'=>'Female')); */?>
	  <?php /*echo $form->radioButton($model,'gender',array('Female'=>'Female')) . 'Female'; */?>

		<?php echo $form->error($model,'gender'); ?>
	</div>


	<div class="row" >
		<?php echo $form->labelEx($model,'hobby'); ?>
		<?php echo $form->checkBoxList($model, 'hobby', array('gardening'=>'Gardening','traveling'=>'Traveling','singing'=>'Singing','surfing'=>'Surfing','coding'=>'Coding')
		);?>
		<?php echo $form->error($model,'hobby'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'term_service'); ?>
		<?php echo $form->checkBox($model,'term_service'); ?>
		<?php echo $form->error($model,'term_service'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

	<?php $this->endWidget(); ?>

</div>
<div id="test"></div>

<!-- form -->