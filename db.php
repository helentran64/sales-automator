<?php
$conn = oci_connect('user', 'pass', '(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(Host=oracle.scs.ryerson.ca)(Port=1521))(CONNECT_DATA=(SID=orcl)))'); 
if (!$conn) { $m = oci_error(); 
    echo $m['message']; 
} 
?>