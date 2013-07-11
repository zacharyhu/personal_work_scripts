<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'gp-dc-monthly-user-report-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php $this->widget('BAlert',array(

		'content'=>'<p>Fields with <span class="required">*</span> are required.</p>'
	)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="<?php echo $form->fieldClass($model, 'l_month'); ?>">
		<?php echo $form->labelEx($model,'l_month'); ?>
		<div class="input">
			<?php echo $form->textField($model,'l_month'); ?>
			<?php echo $form->error($model,'l_month'); ?>
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

	<div class="<?php echo $form->fieldClass($model, 'beyond_5'); ?>">
		<?php echo $form->labelEx($model,'beyond_5'); ?>
		<div class="input">
			<?php echo $form->textField($model,'beyond_5'); ?>
			<?php echo $form->error($model,'beyond_5'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'beyond_10'); ?>">
		<?php echo $form->labelEx($model,'beyond_10'); ?>
		<div class="input">
			<?php echo $form->textField($model,'beyond_10'); ?>
			<?php echo $form->error($model,'beyond_10'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'beyond_15'); ?>">
		<?php echo $form->labelEx($model,'beyond_15'); ?>
		<div class="input">
			<?php echo $form->textField($model,'beyond_15'); ?>
			<?php echo $form->error($model,'beyond_15'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'beyond_20'); ?>">
		<?php echo $form->labelEx($model,'beyond_20'); ?>
		<div class="input">
			<?php echo $form->textField($model,'beyond_20'); ?>
			<?php echo $form->error($model,'beyond_20'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'beyond_25'); ?>">
		<?php echo $form->labelEx($model,'beyond_25'); ?>
		<div class="input">
			<?php echo $form->textField($model,'beyond_25'); ?>
			<?php echo $form->error($model,'beyond_25'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->