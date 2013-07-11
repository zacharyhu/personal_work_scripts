<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'gp-dc-daily-user-report-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php $this->widget('BAlert',array(

		'content'=>'<p>Fields with <span class="required">*</span> are required.</p>'
	)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="<?php echo $form->fieldClass($model, 'l_date'); ?>">
		<?php echo $form->labelEx($model,'l_date'); ?>
		<div class="input">
			<?php echo $form->textField($model,'l_date'); ?>
			<?php echo $form->error($model,'l_date'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'lobby_id'); ?>">
		<?php echo $form->labelEx($model,'lobby_id'); ?>
		<div class="input">
			<?php echo $form->textField($model,'lobby_id'); ?>
			<?php echo $form->error($model,'lobby_id'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'user_login_num'); ?>">
		<?php echo $form->labelEx($model,'user_login_num'); ?>
		<div class="input">
			<?php echo $form->textField($model,'user_login_num'); ?>
			<?php echo $form->error($model,'user_login_num'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'user_login_time'); ?>">
		<?php echo $form->labelEx($model,'user_login_time'); ?>
		<div class="input">
			<?php echo $form->textField($model,'user_login_time'); ?>
			<?php echo $form->error($model,'user_login_time'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'user_register'); ?>">
		<?php echo $form->labelEx($model,'user_register'); ?>
		<div class="input">
			<?php echo $form->textField($model,'user_register'); ?>
			<?php echo $form->error($model,'user_register'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'user_new'); ?>">
		<?php echo $form->labelEx($model,'user_new'); ?>
		<div class="input">
			<?php echo $form->textField($model,'user_new'); ?>
			<?php echo $form->error($model,'user_new'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->