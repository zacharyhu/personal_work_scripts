<?php
/* @var $this CpResourceInfoController */
/* @var $model CpResourceInfo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cp-resource-info-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ip'); ?>
		<?php echo $form->textField($model,'ip',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'ip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'port'); ?>
		<?php echo $form->textField($model,'port'); ?>
		<?php echo $form->error($model,'port'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'server'); ?>
		<?php echo $form->textField($model,'server',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'server'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'privilege'); ?>
		<?php echo $form->textField($model,'privilege',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'privilege'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->