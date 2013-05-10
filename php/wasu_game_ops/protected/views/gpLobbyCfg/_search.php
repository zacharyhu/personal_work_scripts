<?php
/* @var $this GpLobbyCfgController */
/* @var $model GpLobbyCfg */
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
		<?php echo $form->label($model,'game_lobby'); ?>
		<?php echo $form->textField($model,'game_lobby'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lobby_name'); ?>
		<?php echo $form->textField($model,'lobby_name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->