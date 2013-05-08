<?php
/* @var $this CpResourceInfoController */
/* @var $model CpResourceInfo */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'cp_id'); ?>
		<?php echo $form->textField($model,'cp_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ip'); ?>
		<?php echo $form->textField($model,'ip',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'port'); ?>
		<?php echo $form->textField($model,'port'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'server'); ?>
		<?php echo $form->textField($model,'server',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'privilege'); ?>
		<?php echo $form->textField($model,'privilege',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->