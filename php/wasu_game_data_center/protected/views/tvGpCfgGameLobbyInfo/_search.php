<?php
/* @var $this TvGpCfgGameLobbyInfoController */
/* @var $model TvGpCfgGameLobbyInfo */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'l_lobby_id'); ?>
		<?php echo $form->textField($model,'l_lobby_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vc_org_name'); ?>
		<?php echo $form->textField($model,'vc_org_name',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vc_recharge_ipaddr'); ?>
		<?php echo $form->textField($model,'vc_recharge_ipaddr',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'l_recharge_port'); ?>
		<?php echo $form->textField($model,'l_recharge_port'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'l_payment'); ?>
		<?php echo $form->textField($model,'l_payment'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'l_day_money'); ?>
		<?php echo $form->textField($model,'l_day_money'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'l_month_money'); ?>
		<?php echo $form->textField($model,'l_month_money'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vc_business_id'); ?>
		<?php echo $form->textField($model,'vc_business_id',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'l_status'); ?>
		<?php echo $form->textField($model,'l_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vc_filter_gameid'); ?>
		<?php echo $form->textField($model,'vc_filter_gameid',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vc_order_id'); ?>
		<?php echo $form->textField($model,'vc_order_id',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->