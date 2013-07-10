<?php
/* @var $this CpContactInfoController */
/* @var $model CpContactInfo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cp-contact-info-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cp_id'); ?>
		<?php echo $form->dropDownList($model,'cp_id',CpBaseInfo::model()->getCpNameList()); ?>
		<?php echo $form->error($model,'cp_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_name'); ?>
		<?php echo $form->textField($model,'contact_name',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'contact_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_phone'); ?>
		<?php echo $form->textField($model,'contact_phone',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'contact_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_email'); ?>
		<?php echo $form->textField($model,'contact_email',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'contact_email'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'contact_type'); ?>
		<?php echo $form->dropDownList($model,'contact_type',CpContactInfo::model()->getContactTypeList()); ?>
		<?php echo $form->error($model,'contact_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_qq'); ?>
		<?php echo $form->textField($model,'contact_qq'); ?>
		<?php echo $form->error($model,'contact_qq'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'contact_others'); ?>
		<?php echo $form->textField($model,'contact_others'); ?>
		<?php echo $form->error($model,'contact_others'); ?>
	</div>
	
	
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->