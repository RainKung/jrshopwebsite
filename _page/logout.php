<?php
session_destroy();
      unset($_SESSION['id']);
      unset($_SESSION['username']);
      
      echo "<script>window.location.href='".$config['www']."'</script>";
