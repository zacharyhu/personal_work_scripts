<?php
/* @var $this DailyTurnoverController */
/* @var $model DailyTurnover */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'daily-turnover-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lobby_id'); ?>
		<?php echo $form->textField($model,'lobby_id'); ?>
		<?php echo $form->error($model,'lobby_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cp_code'); ?>
		<?php echo $form->textField($model,'cp_code'); ?>
		<?php echo $form->error($model,'cp_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'action_id'); ?>
		<?php echo $form->textField($model,'action_id'); ?>
		<?php echo $form->error($model,'action_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sum'); ?>
		<?php echo $form->textField($model,'sum'); ?>
		<?php echo $form->error($model,'sum'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_no'); ?>
		<?php echo $form->textField($model,'user_no'); ?>
		<?php echo $form->error($model,'user_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_time'); ?>
		<?php echo $form->textField($model,'user_time'); ?>
		<?php echo $form->error($model,'user_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'arpu'); ?>
		<?php echo $form->textField($model,'arpu',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'arpu'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->