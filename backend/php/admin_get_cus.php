<?php 
include_once 'config.php';
$adminGetCus = new Conn();
$get = $adminGetCus->adminGetCus();
$output = '';
foreach ($get as $row) {
  if ($row['blocked'] == '0') {
    $output .= '<div class="body flex">
                  <input type="hidden" class="id" value="'.$row['customer_id'].'"/>
                  <span>'.$row['fname'].' '.$row['lname'].'</span><button class="block cus_block">Block</button>
                </div>';
  } else {
    $output .= '<div class="body flex">
                  <input type="hidden" class="id" value="'.$row['customer_id'].'"/>
                  <span>'.$row['fname'].' '.$row['lname'].'</span><button class="unblock cus_unblock">Unblock</button>
                </div>';
  }
}
echo $output;
?>