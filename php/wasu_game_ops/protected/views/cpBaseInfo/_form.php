<?php
/* @var $this CpBaseInfoController */
/* @var $model CpBaseInfo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cp-base-info-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cp_name'); ?>
		<?php echo $form->textField($model,'cp_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'cp_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cpcode'); ?>
		<?php echo $form->textField($model,'cpcode'); ?>
		<?php echo $form->error($model,'cpcode'); ?>
	</div>


<!-- 	<div class="row"> -->
		<?php //echo $form->labelEx($model,'update_time'); ?>
		<?php //echo $form->textField($model,'update_time'); ?>
		<?php //echo $form->error($model,'update_time'); ?>
<!-- 	</div> -->

	<div class="row">
		<?php echo $form->labelEx($model,'cp_desc'); ?>
		<?php echo $form->textField($model,'cp_desc',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'cp_desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cp_status'); ?>
		<?php echo $form->dropDownList($model,'cp_status',CpBaseInfo::model()->getCPStatusList()); ?>
		<?php echo $form->error($model,'cp_status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->