<div class="wide form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="clearfix">
		<?php echo $form->label($model,'l_lobby_id'); ?>
		<div class="input">
			<?php echo $form->textField($model,'l_lobby_id'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'vc_org_name'); ?>
		<div class="input">
			<?php echo $form->textField($model,'vc_org_name',array('size'=>32,'maxlength'=>32)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'vc_recharge_ipaddr'); ?>
		<div class="input">
			<?php echo $form->textField($model,'vc_recharge_ipaddr',array('size'=>32,'maxlength'=>32)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'l_recharge_port'); ?>
		<div class="input">
			<?php echo $form->textField($model,'l_recharge_port'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'l_payment'); ?>
		<div class="input">
			<?php echo $form->textField($model,'l_payment'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'l_day_money'); ?>
		<div class="input">
			<?php echo $form->textField($model,'l_day_money'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'l_month_money'); ?>
		<div class="input">
			<?php echo $form->textField($model,'l_month_money'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'vc_business_id'); ?>
		<div class="input">
			<?php echo $form->textField($model,'vc_business_id',array('size'=>60,'maxlength'=>256)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'l_status'); ?>
		<div class="input">
			<?php echo $form->textField($model,'l_status'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'vc_filter_gameid'); ?>
		<div class="input">
			<?php echo $form->textField($model,'vc_filter_gameid',array('size'=>60,'maxlength'=>256)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'vc_order_id'); ?>
		<div class="input">
			<?php echo $form->textField($model,'vc_order_id',array('size'=>60,'maxlength'=>256)); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->