<?php 
// Login & Session example by sde 
// logout.php 

// you must start session before destroying it 
session_start();
    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    session_regenerate_id(true);
echo "<META HTTP-EQUIV='refresh' content='0; URL=index.php'> ";
?> 