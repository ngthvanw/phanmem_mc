<?php
session_start();
 echo $_SESSION['MST'] . "-" . $_SESSION['TenCongTy'] . " - NIÊN ĐỘ: " . $_SESSION['NienDo']; ?>
                                | Tên đăng nhập : <?php echo $_SESSION['User'] ?>