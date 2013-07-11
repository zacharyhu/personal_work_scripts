<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'tv-gp-cfg-game-lobby-info-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php $this->widget('BAlert',array(

		'content'=>'<p>Fields with <span class="required">*</span> are required.</p>'
	)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="<?php echo $form->fieldClass($model, 'l_lobby_id'); ?>">
		<?php echo $form->labelEx($model,'l_lobby_id'); ?>
		<div class="input">
			<?php echo $form->textField($model,'l_lobby_id'); ?>
			<?php echo $form->error($model,'l_lobby_id'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'vc_org_name'); ?>">
		<?php echo $form->labelEx($model,'vc_org_name'); ?>
		<div class="input">
			<?php echo $form->textField($model,'vc_org_name',array('size'=>32,'maxlength'=>32)); ?>
			<?php echo $form->error($model,'vc_org_name'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'vc_recharge_ipaddr'); ?>">
		<?php echo $form->labelEx($model,'vc_recharge_ipaddr'); ?>
		<div class="input">
			<?php echo $form->textField($model,'vc_recharge_ipaddr',array('size'=>32,'maxlength'=>32)); ?>
			<?php echo $form->error($model,'vc_recharge_ipaddr'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'l_recharge_port'); ?>">
		<?php echo $form->labelEx($model,'l_recharge_port'); ?>
		<div class="input">
			<?php echo $form->textField($model,'l_recharge_port'); ?>
			<?php echo $form->error($model,'l_recharge_port'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'l_payment'); ?>">
		<?php echo $form->labelEx($model,'l_payment'); ?>
		<div class="input">
			<?php echo $form->textField($model,'l_payment'); ?>
			<?php echo $form->error($model,'l_payment'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'l_day_money'); ?>">
		<?php echo $form->labelEx($model,'l_day_money'); ?>
		<div class="input">
			<?php echo $form->textField($model,'l_day_money'); ?>
			<?php echo $form->error($model,'l_day_money'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'l_month_money'); ?>">
		<?php echo $form->labelEx($model,'l_month_money'); ?>
		<div class="input">
			<?php echo $form->textField($model,'l_month_money'); ?>
			<?php echo $form->error($model,'l_month_money'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'vc_business_id'); ?>">
		<?php echo $form->labelEx($model,'vc_business_id'); ?>
		<div class="input">
			<?php echo $form->textField($model,'vc_business_id',array('size'=>60,'maxlength'=>256)); ?>
			<?php echo $form->error($model,'vc_business_id'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'l_status'); ?>">
		<?php echo $form->labelEx($model,'l_status'); ?>
		<div class="input">
			<?php echo $form->textField($model,'l_status'); ?>
			<?php echo $form->error($model,'l_status'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'vc_filter_gameid'); ?>">
		<?php echo $form->labelEx($model,'vc_filter_gameid'); ?>
		<div class="input">
			<?php echo $form->textField($model,'vc_filter_gameid',array('size'=>60,'maxlength'=>256)); ?>
			<?php echo $form->error($model,'vc_filter_gameid'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'vc_order_id'); ?>">
		<?php echo $form->labelEx($model,'vc_order_id'); ?>
		<div class="input">
			<?php echo $form->textField($model,'vc_order_id',array('size'=>60,'maxlength'=>256)); ?>
			<?php echo $form->error($model,'vc_order_id'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->