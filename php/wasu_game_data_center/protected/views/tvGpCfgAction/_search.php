<?php
/* @var $this TvGpCfgActionController */
/* @var $model TvGpCfgAction */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'l_action_id'); ?>
		<?php echo $form->textField($model,'l_action_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'l_father_id'); ?>
		<?php echo $form->textField($model,'l_father_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vc_business_name'); ?>
		<?php echo $form->textField($model,'vc_business_name',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vc_father_name'); ?>
		<?php echo $form->textField($model,'vc_father_name',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vc_business_desc'); ?>
		<?php echo $form->textField($model,'vc_business_desc',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->