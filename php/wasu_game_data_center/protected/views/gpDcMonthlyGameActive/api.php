<?php
// $data_all = $dataProvider;
$get_id = $_GET['id'];
print_r(GpDcMonthlyGameActive::model()->get_DATA_by_id($get_id));