<?php
/* @var $this TvGpLogsPointsController */
/* @var $model TvGpLogsPoints */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tv-gp-logs-points-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'l_user_id'); ?>
		<?php echo $form->textField($model,'l_user_id'); ?>
		<?php echo $form->error($model,'l_user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'l_lobby_id'); ?>
		<?php echo $form->textField($model,'l_lobby_id'); ?>
		<?php echo $form->error($model,'l_lobby_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'l_source_id'); ?>
		<?php echo $form->textField($model,'l_source_id'); ?>
		<?php echo $form->error($model,'l_source_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'l_game_type'); ?>
		<?php echo $form->textField($model,'l_game_type'); ?>
		<?php echo $form->error($model,'l_game_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'l_game_id'); ?>
		<?php echo $form->textField($model,'l_game_id'); ?>
		<?php echo $form->error($model,'l_game_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'l_before_coin'); ?>
		<?php echo $form->textField($model,'l_before_coin'); ?>
		<?php echo $form->error($model,'l_before_coin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'l_chg_coin'); ?>
		<?php echo $form->textField($model,'l_chg_coin'); ?>
		<?php echo $form->error($model,'l_chg_coin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'l_coin'); ?>
		<?php echo $form->textField($model,'l_coin'); ?>
		<?php echo $form->error($model,'l_coin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'l_date'); ?>
		<?php echo $form->textField($model,'l_date'); ?>
		<?php echo $form->error($model,'l_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'l_time'); ?>
		<?php echo $form->textField($model,'l_time'); ?>
		<?php echo $form->error($model,'l_time'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->