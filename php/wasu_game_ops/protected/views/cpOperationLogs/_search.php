<?php
/* @var $this CpOperationLogsController */
/* @var $model CpOperationLogs */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'arch_id'); ?>
		<?php echo $form->textField($model,'arch_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'arch_title'); ?>
		<?php echo $form->textField($model,'arch_title',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cp_id'); ?>
		<?php echo $form->textField($model,'cp_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'arch_content'); ?>
		<?php echo $form->textField($model,'arch_content',array('size'=>60,'maxlength'=>2550)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'update_time'); ?>
		<?php echo $form->textField($model,'update_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'author'); ?>
		<?php echo $form->textField($model,'author',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->