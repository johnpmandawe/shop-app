<?php
include_once 'config.php';
$loadCheckBtn = new Conn();
$load = $loadCheckBtn->loadCheckBtn();
$output = '';
foreach($load as $row) {
  if($row['checked'] == '0') {
    $output .= '<input type="hidden" class="check_id" value="'.$row['check_id'].'"/>
                <input type="checkbox" id="checkbtn"><span>'.$row['check_name'].'</span>
                <div class="custom_checkbtn"></div>';
  } else {
    $output .= '<input type="hidden" class="check_id" value="'.$row['check_id'].'"/>
                <input type="checkbox" id="checkbtn" checked><span>'.$row['check_name'].'</span>
                <div class="custom_checkbtn checked"></div>';
  }
}
echo $output;
?>