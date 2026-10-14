<?php
// για να μην μπορει καποιοσ χρηστησ να μπαινει κατευθειαν στισ αλλεσ σελιδεσ βαζουμε αυτο σε ολεσ για να τουσ οδηγει στην σελιδα του λογκ ιν 
   session_start();
   if (isset($_SESSION['username_session']))
   {
        $current_user = $_SESSION['username_session'];
        $isadmmin = $_SESSION['ISAdmin'];
        
   }
   else 
   {
      header("Location: http://localhost/resit/login.php");
      exit;
   }
   
?>
