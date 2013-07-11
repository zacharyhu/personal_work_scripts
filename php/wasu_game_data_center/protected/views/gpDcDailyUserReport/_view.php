<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('l_date')); ?>:</b>
	<?php echo CHtml::encode($data->l_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lobby_id')); ?>:</b>
	<?php echo CHtml::encode($data->lobby_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_login_num')); ?>:</b>
	<?php echo CHtml::encode($data->user_login_num); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_login_time')); ?>:</b>
	<?php echo CHtml::encode($data->user_login_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_register')); ?>:</b>
	<?php echo CHtml::encode($data->user_register); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_new')); ?>:</b>
	<?php echo CHtml::encode($data->user_new); ?>
	<br />


</div>