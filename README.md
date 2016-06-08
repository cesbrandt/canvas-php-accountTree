# canvas-php-accountTree
This is a set of basic functions for retrieving the account tree for a designated account and it's sub-accounts in the Canvas LMS and formatting them as options for a dropdown menu.

[**Canvas LMS - REST API and Extensions Documentation**](https://canvas.instructure.com/doc/api/index.html)

#### Dependencies
- [canvas-php-curl](https://github.com/cesbrandt/canvas-php-curl)

# How-To Use
#### Retrieving Multidimensional Array of Tree
The array is based off a need for only three (3) pieces of information: Account ID, Account Name, and Sub-Acocunts.
``` php
<?php
  // Update to reflect the token of the admin user that is to be used
  $token = "Authorization: Bearer 1234~8ca7f0dc11599a193be27500387156b982e53d7a180973cc33c8c159a62c1373";
  // Update to reflect the address to your institute
  $site = "canvas.instructure.com";
  // Update to reflect the root account the tree is to be built off

  // Dependency
  require "class.curl.php";

  // Functions
  require "functions.accountTree.php";

  $cURL = new Curl($token, $site);

  $subAccounts = buildTreeArray($accountID);

  $cURL->closeCurl();
?>
```

#### Converting the Multidimensional Array into a Dropdown Menu
This function only creates the `OPTION`s for a `SELECT`. Building the `SELECT` will be dependent upon your use for it.
``` php
<?php
  // Update to reflect the token of the admin user that is to be used
  $token = "Authorization: Bearer 1234~8ca7f0dc11599a193be27500387156b982e53d7a180973cc33c8c159a62c1373";
  // Update to reflect the address to your institute
  $site = "canvas.instructure.com";
  // Update to reflect the root account the tree is to be built off

  // Dependency
  require "class.curl.php";

  // Functions
  require "functions.accountTree.php";

  $cURL = new Curl($token, $site);

  // Customize the SELECT element to meet your needs
  $dropdownMenu = '<select id="account" name="account">' . buildOptions(buildTreeArray($accountID)) . '</select>';

  $cURL->closeCurl();
?>
```
