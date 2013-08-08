<?php
/* @var $this TvGpLogsPointsController */
/* @var $model TvGpLogsPoints */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'l_index'); ?>
		<?php echo $form->textField($model,'l_index'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'l_user_id'); ?>
		<?php echo $form->textField($model,'l_user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'l_lobby_id'); ?>
		<?php echo $form->textField($model,'l_lobby_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'l_source_id'); ?>
		<?php echo $form->textField($model,'l_source_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'l_game_type'); ?>
		<?php echo $form->textField($model,'l_game_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'l_game_id'); ?>
		<?php echo $form->textField($model,'l_game_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'l_before_coin'); ?>
		<?php echo $form->textField($model,'l_before_coin'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'l_chg_coin'); ?>
		<?php echo $form->textField($model,'l_chg_coin'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'l_coin'); ?>
		<?php echo $form->textField($model,'l_coin'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'l_date'); ?>
		<?php echo $form->textField($model,'l_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'l_time'); ?>
		<?php echo $form->textField($model,'l_time'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->