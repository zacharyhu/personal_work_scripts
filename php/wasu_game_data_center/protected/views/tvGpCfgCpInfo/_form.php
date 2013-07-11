<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'tv-gp-cfg-cp-info-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php $this->widget('BAlert',array(

		'content'=>'<p>Fields with <span class="required">*</span> are required.</p>'
	)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="<?php echo $form->fieldClass($model, 'l_cp_code'); ?>">
		<?php echo $form->labelEx($model,'l_cp_code'); ?>
		<div class="input">
			<?php echo $form->textField($model,'l_cp_code'); ?>
			<?php echo $form->error($model,'l_cp_code'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'vc_cp_name'); ?>">
		<?php echo $form->labelEx($model,'vc_cp_name'); ?>
		<div class="input">
			<?php echo $form->textField($model,'vc_cp_name',array('size'=>60,'maxlength'=>64)); ?>
			<?php echo $form->error($model,'vc_cp_name'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->