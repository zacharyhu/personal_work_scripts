<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('l_lobby_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->l_lobby_id), array('view', 'id'=>$data->l_lobby_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vc_org_name')); ?>:</b>
	<?php echo CHtml::encode($data->vc_org_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vc_recharge_ipaddr')); ?>:</b>
	<?php echo CHtml::encode($data->vc_recharge_ipaddr); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('l_recharge_port')); ?>:</b>
	<?php echo CHtml::encode($data->l_recharge_port); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('l_payment')); ?>:</b>
	<?php echo CHtml::encode($data->l_payment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('l_day_money')); ?>:</b>
	<?php echo CHtml::encode($data->l_day_money); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('l_month_money')); ?>:</b>
	<?php echo CHtml::encode($data->l_month_money); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('vc_business_id')); ?>:</b>
	<?php echo CHtml::encode($data->vc_business_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('l_status')); ?>:</b>
	<?php echo CHtml::encode($data->l_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vc_filter_gameid')); ?>:</b>
	<?php echo CHtml::encode($data->vc_filter_gameid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vc_order_id')); ?>:</b>
	<?php echo CHtml::encode($data->vc_order_id); ?>
	<br />

	*/ ?>

</div>