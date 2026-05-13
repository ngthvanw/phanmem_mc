<?php
$output = shell_exec("C:\Windows\System32\wbem\wmic.exe path win32_computersystemproduct get uuid");
if ($output) {
    echo "$output"; // UUID 1 máy ch? có 1 s? duy nh?t trong win
} else {
    echo "Command failed.";
}
?>