<?php
/* @var $this TvGpCfgActionController */
/* @var $model TvGpCfgAction */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tv-gp-cfg-action-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'l_action_id'); ?>
		<?php echo $form->textField($model,'l_action_id'); ?>
		<?php echo $form->error($model,'l_action_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'l_father_id'); ?>
		<?php echo $form->textField($model,'l_father_id'); ?>
		<?php echo $form->error($model,'l_father_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vc_business_name'); ?>
		<?php echo $form->textField($model,'vc_business_name',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'vc_business_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vc_father_name'); ?>
		<?php echo $form->textField($model,'vc_father_name',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'vc_father_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vc_business_desc'); ?>
		<?php echo $form->textField($model,'vc_business_desc',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'vc_business_desc'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->