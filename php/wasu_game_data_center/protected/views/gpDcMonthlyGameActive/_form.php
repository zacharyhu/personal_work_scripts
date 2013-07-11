<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'gp-dc-monthly-game-active-form',
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

	<div class="<?php echo $form->fieldClass($model, 'cp_code'); ?>">
		<?php echo $form->labelEx($model,'cp_code'); ?>
		<div class="input">
			<?php echo $form->textField($model,'cp_code'); ?>
			<?php echo $form->error($model,'cp_code'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'game_id'); ?>">
		<?php echo $form->labelEx($model,'game_id'); ?>
		<div class="input">
			<?php echo $form->textField($model,'game_id'); ?>
			<?php echo $form->error($model,'game_id'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'user_num'); ?>">
		<?php echo $form->labelEx($model,'user_num'); ?>
		<div class="input">
			<?php echo $form->textField($model,'user_num'); ?>
			<?php echo $form->error($model,'user_num'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'user_time'); ?>">
		<?php echo $form->labelEx($model,'user_time'); ?>
		<div class="input">
			<?php echo $form->textField($model,'user_time'); ?>
			<?php echo $form->error($model,'user_time'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->