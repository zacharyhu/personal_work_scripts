<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'gp-dc-daily-turnover-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php $this->widget('BAlert',array(

		'content'=>'<p>Fields with <span class="required">*</span> are required.</p>'
	)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="<?php echo $form->fieldClass($model, 'date'); ?>">
		<?php echo $form->labelEx($model,'date'); ?>
		<div class="input">
			<?php echo $form->textField($model,'date'); ?>
			<?php echo $form->error($model,'date'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'lobby_id'); ?>">
		<?php echo $form->labelEx($model,'lobby_id'); ?>
		<div class="input">
			<?php echo $form->textField($model,'lobby_id'); ?>
			<?php echo $form->error($model,'lobby_id'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'cp_code'); ?>">
		<?php echo $form->labelEx($model,'cp_code'); ?>
		<div class="input">
			<?php echo $form->textField($model,'cp_code'); ?>
			<?php echo $form->error($model,'cp_code'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'action_id'); ?>">
		<?php echo $form->labelEx($model,'action_id'); ?>
		<div class="input">
			<?php echo $form->textField($model,'action_id'); ?>
			<?php echo $form->error($model,'action_id'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'sum'); ?>">
		<?php echo $form->labelEx($model,'sum'); ?>
		<div class="input">
			<?php echo $form->textField($model,'sum'); ?>
			<?php echo $form->error($model,'sum'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'user_no'); ?>">
		<?php echo $form->labelEx($model,'user_no'); ?>
		<div class="input">
			<?php echo $form->textField($model,'user_no'); ?>
			<?php echo $form->error($model,'user_no'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'user_time'); ?>">
		<?php echo $form->labelEx($model,'user_time'); ?>
		<div class="input">
			<?php echo $form->textField($model,'user_time'); ?>
			<?php echo $form->error($model,'user_time'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'arpu'); ?>">
		<?php echo $form->labelEx($model,'arpu'); ?>
		<div class="input">
			<?php echo $form->textField($model,'arpu',array('size'=>10,'maxlength'=>10)); ?>
			<?php echo $form->error($model,'arpu'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->