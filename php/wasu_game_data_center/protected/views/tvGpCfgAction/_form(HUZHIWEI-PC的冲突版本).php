<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'tv-gp-cfg-action-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php $this->widget('BAlert',array(

		'content'=>'<p>Fields with <span class="required">*</span> are required.</p>'
	)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="<?php echo $form->fieldClass($model, 'l_action_id'); ?>">
		<?php echo $form->labelEx($model,'l_action_id'); ?>
		<div class="input">
			<?php echo $form->textField($model,'l_action_id'); ?>
			<?php echo $form->error($model,'l_action_id'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'l_father_id'); ?>">
		<?php echo $form->labelEx($model,'l_father_id'); ?>
		<div class="input">
			<?php echo $form->textField($model,'l_father_id'); ?>
			<?php echo $form->error($model,'l_father_id'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'vc_business_name'); ?>">
		<?php echo $form->labelEx($model,'vc_business_name'); ?>
		<div class="input">
			<?php echo $form->textField($model,'vc_business_name',array('size'=>60,'maxlength'=>64)); ?>
			<?php echo $form->error($model,'vc_business_name'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'vc_father_name'); ?>">
		<?php echo $form->labelEx($model,'vc_father_name'); ?>
		<div class="input">
			<?php echo $form->textField($model,'vc_father_name',array('size'=>60,'maxlength'=>64)); ?>
			<?php echo $form->error($model,'vc_father_name'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'vc_business_desc'); ?>">
		<?php echo $form->labelEx($model,'vc_business_desc'); ?>
		<div class="input">
			<?php echo $form->textField($model,'vc_business_desc',array('size'=>60,'maxlength'=>256)); ?>
			<?php echo $form->error($model,'vc_business_desc'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->