<?php
/* @var $this CpOperationLogsController */
/* @var $model CpOperationLogs */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cp-operation-logs-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'arch_title'); ?>
		<?php echo $form->textField($model,'arch_title',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'arch_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cp_id'); ?>
		<?php echo $form->dropDownList($model,'cp_id',CpBaseInfo::model()->getCpNameList()); ?>
		<?php echo $form->error($model,'cp_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'arch_content'); ?>
		<?php echo $form->textArea($model,'arch_content',array('size'=>60,'maxlength'=>2550)); ?>
		<?php echo $form->error($model,'arch_content'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->