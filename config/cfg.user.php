<?php
  //
  // == List of Login/Pass-Users ==
  //
  // -- Setup an "admin" user, with password "secret" --
  $userlist['admin']['pass'] = "admin";
  $userlist['admin']['role'] = "root"; // used to call "/diag.php"

  //*
  // -- Setup readonly-user for regression tests (yourdomain.com/addressbook/test/
  $userlist['simpletest']['pass']   = "simple";
  $userlist['simpletest']['role']   = "readonly";
  $userlist['simpletest']['domain'] = 9999;
  //*/

  /*
  // Setup a "readonly" user
  $userlist['view']['pass']  = "apassword";
  $userlist['view']['role']  = "readonly";

  // Setup a user accessing only one group
  $userlist['mygroup']['pass']  = "apassword";
  $userlist['mygroup']['group'] = "My group";

  // Setup a user for the second domain (0 = default)
  $userlist['adm2']['pass']   = "adm2";
  $userlist['adm2']['domain'] = 1;
  //*/

  //
  // == User table in database ==
  // - Excludes the table_prefix!
  $usertable = "users";

  // == List of IP-Users ==
  $iplist['*.*.*.*']['role']  = "readonly";
  //$iplist['192.168.221.11']['role']  = "admin";


  //
  // == Look & Feel of the domains
  //
  $skin_color = "green"; // global skin color, e.g. on login

  // blue, brown, green, grey, pink, purple, red, turquoise, yellow
  $domain[0]['skin'] = "green";
  $domain[1]['skin'] = "green";
  $domain[2]['skin'] = "green";

?>
