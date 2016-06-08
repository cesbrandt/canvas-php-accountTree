<?php
  function buildTreeArray($accountID, $root = true) {
    global $cURL;

    $subAccounts = array();

    if($root) {
      $root = $cURL->get("/accounts/$accountID")[0];
      array_push($subAccounts, array('id' => $root->id, 'name' => $root->name, 'subAccounts' => buildTreeArray($accountID, false)));
    } else {
      $accounts = $cURL->get("/accounts/$accountID/sub_accounts");
      foreach($accounts as $account) {
        array_push($subAccounts, array('id' => $account->id, 'name' => $account->name, 'subAccounts' => buildTreeArray($account->id, false)));
      }
    }
    return $subAccounts;
  }

  function buildOptions($accounts, $level = 0) {
    $options = '';
    foreach($accounts as $account) {
      $options .= '<option value="' . $account['id'] . '">' . str_repeat('&nbsp;&nbsp;&nbsp;', $level) . $account['name'] . '</option>' . "\n" . buildOptions($account['subAccounts'], $level + 1);
    }
    return $options;
  }
?>
