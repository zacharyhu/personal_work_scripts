<div class="wide form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="clearfix">
		<?php echo $form->label($model,'id'); ?>
		<div class="input">
			<?php echo $form->textField($model,'id'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'l_month'); ?>
		<div class="input">
			<?php echo $form->textField($model,'l_month'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'lobby_id'); ?>
		<div class="input">
			<?php echo $form->textField($model,'lobby_id'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'user_login_num'); ?>
		<div class="input">
			<?php echo $form->textField($model,'user_login_num'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'user_login_time'); ?>
		<div class="input">
			<?php echo $form->textField($model,'user_login_time'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'user_register'); ?>
		<div class="input">
			<?php echo $form->textField($model,'user_register'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'user_new'); ?>
		<div class="input">
			<?php echo $form->textField($model,'user_new'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'beyond_5'); ?>
		<div class="input">
			<?php echo $form->textField($model,'beyond_5'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'beyond_10'); ?>
		<div class="input">
			<?php echo $form->textField($model,'beyond_10'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'beyond_15'); ?>
		<div class="input">
			<?php echo $form->textField($model,'beyond_15'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'beyond_20'); ?>
		<div class="input">
			<?php echo $form->textField($model,'beyond_20'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'beyond_25'); ?>
		<div class="input">
			<?php echo $form->textField($model,'beyond_25'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->