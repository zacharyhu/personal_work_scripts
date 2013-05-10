<?php
/* @var $this CpContactInfoController */
/* @var $model CpContactInfo */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>


	<div class="row">
		<?php echo $form->label($model,'cp_id'); ?>
		<?php echo $form->dropDownList($model, 'cp_id', CpBaseInfo::model()->getCpNameList()); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contact_name'); ?>
		<?php echo $form->textField($model,'contact_name',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contact_type'); ?>
		<?php echo $form->dropDownList($model, 'contact_type', CpContactInfo::model()->getContactTypeList()); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->