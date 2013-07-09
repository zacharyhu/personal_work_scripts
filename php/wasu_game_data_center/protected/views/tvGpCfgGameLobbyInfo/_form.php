<?php
/* @var $this TvGpCfgGameLobbyInfoController */
/* @var $model TvGpCfgGameLobbyInfo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tv-gp-cfg-game-lobby-info-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'l_lobby_id'); ?>
		<?php echo $form->textField($model,'l_lobby_id'); ?>
		<?php echo $form->error($model,'l_lobby_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vc_org_name'); ?>
		<?php echo $form->textField($model,'vc_org_name',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'vc_org_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vc_recharge_ipaddr'); ?>
		<?php echo $form->textField($model,'vc_recharge_ipaddr',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'vc_recharge_ipaddr'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'l_recharge_port'); ?>
		<?php echo $form->textField($model,'l_recharge_port'); ?>
		<?php echo $form->error($model,'l_recharge_port'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'l_payment'); ?>
		<?php echo $form->textField($model,'l_payment'); ?>
		<?php echo $form->error($model,'l_payment'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'l_day_money'); ?>
		<?php echo $form->textField($model,'l_day_money'); ?>
		<?php echo $form->error($model,'l_day_money'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'l_month_money'); ?>
		<?php echo $form->textField($model,'l_month_money'); ?>
		<?php echo $form->error($model,'l_month_money'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vc_business_id'); ?>
		<?php echo $form->textField($model,'vc_business_id',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'vc_business_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'l_status'); ?>
		<?php echo $form->textField($model,'l_status'); ?>
		<?php echo $form->error($model,'l_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vc_filter_gameid'); ?>
		<?php echo $form->textField($model,'vc_filter_gameid',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'vc_filter_gameid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vc_order_id'); ?>
		<?php echo $form->textField($model,'vc_order_id',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'vc_order_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->