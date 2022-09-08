<?php 
include_once 'config.php';
$adminGetCus = new Conn();
$get = $adminGetCus->adminGetSel();
$output = '';
foreach ($get as $row) {
  if ($row['blocked'] == '0') {
    $output .= '<div class="body flex">
                  <input type="hidden" class="id" value="'.$row['seller_id'].'"/>
                  <span>'.$row['fname'].'</span><button class="block sel_block">Block</button>
                </div>';
  } else {
    $output .= '<div class="body flex">
                  <input type="hidden" class="id" value="'.$row['seller_id'].'"/>
                  <span>'.$row['fname'].'</span><button class="unblock sel_unblock">Unblock</button>
                </div>';
  }
}
echo $output;
?>