<?php
/* @var $this GpGameStatusCfgController */
/* @var $model GpGameStatusCfg */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ip'); ?>
		<?php echo $form->textField($model,'ip'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'game_status'); ?>
		<?php echo $form->textField($model,'game_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status_name'); ?>
		<?php echo $form->textField($model,'status_name',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->