<?php 
$trans_code = $_POST['trans_code'];
$quant = $_POST['quant'];
$prod_id = $_POST['prod_id'];
echo '<input type="hidden" class="trans_code" value="'.$trans_code.'"/>
      <input type="hidden" class="quant" value="'.$quant.'"/>
      
      <input type="hidden" class="prod_id" value="'.$prod_id.'"/>';
?>