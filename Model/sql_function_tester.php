<?php

/*
 * Author: Brian Oleniacz
 * Date: 12/5/2017
 */

include 'sql_function_library.php';

  $email = get_email('brian');
  echo "email for brian is " . $email . "<br />";

  $owner = get_owner(3);
  echo "owner of book #3 is " . $owner . "<br />";

//  del_all_owner_listings('brian');
//  echo "Check PHPMyAdmin to see if Brian's books were deleted."




?>
