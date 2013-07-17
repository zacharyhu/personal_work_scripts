<div class="wide form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="clearfix">
		<?php echo $form->label($model,'l_action_id'); ?>
		<div class="input">
			<?php echo $form->textField($model,'l_action_id'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'l_father_id'); ?>
		<div class="input">
			<?php echo $form->textField($model,'l_father_id'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'vc_business_name'); ?>
		<div class="input">
			<?php echo $form->textField($model,'vc_business_name',array('size'=>60,'maxlength'=>64)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'vc_father_name'); ?>
		<div class="input">
			<?php echo $form->textField($model,'vc_father_name',array('size'=>60,'maxlength'=>64)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'vc_business_desc'); ?>
		<div class="input">
			<?php echo $form->textField($model,'vc_business_desc',array('size'=>60,'maxlength'=>256)); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->