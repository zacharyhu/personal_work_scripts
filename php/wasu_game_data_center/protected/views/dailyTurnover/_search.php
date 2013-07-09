<?php
/* @var $this DailyTurnoverController */
/* @var $model DailyTurnover */
/* @var $form CActiveForm */
?>

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
		<?php echo $form->label($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lobby_id'); ?>
		<?php echo $form->textField($model,'lobby_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cp_code'); ?>
		<?php echo $form->textField($model,'cp_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'action_id'); ?>
		<?php echo $form->textField($model,'action_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sum'); ?>
		<?php echo $form->textField($model,'sum'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_no'); ?>
		<?php echo $form->textField($model,'user_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_time'); ?>
		<?php echo $form->textField($model,'user_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'arpu'); ?>
		<?php echo $form->textField($model,'arpu',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->