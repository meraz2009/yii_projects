<div class="wide form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'action'=>Yii::app()->createUrl($this->route),
        'method'=>'get',
    )); ?>

    <div class="row">
        <?php echo $form->label($model,'id'); ?>
        <?php echo $form->textField($model,'id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'username'); ?>
        <?php echo $form->textField($model,'username',array('size'=>50,'maxlength'=>50)); ?>
    </div>

   <!-- <div class="row">
        <?php /*echo $form->label($model,'pwd_hash'); */?>
        <?php /*echo $form->textField($model,'pwd_hash',array('size'=>34,'maxlength'=>34)); */?>
    </div>

    <div class="row">
        <?php /*echo $form->label($model,'email'); */?>
        <?php /*echo $form->textField($model,'email',array('size'=>60,'maxlength'=>225)); */?>
    </div>-->
  <!--  <div class="row">
        <?php /*echo $form->label($model,'log_time'); */?>
        <?php /*echo $form->textField($model,'reg_time',array('size'=>60,'maxlength'=>225)); */?>
    </div>-->
<!--
    <div class="row">
        <?php /*echo $form->label($model,'reg_image'); */?>
        <?php /*echo $form->textArea($model,'reg_image',array('rows'=>6, 'cols'=>50)); */?>
    </div>-->


    <div class="row buttons">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div>