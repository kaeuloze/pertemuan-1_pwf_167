<?php
$hash = '$2y$12$dFjAlhYSO.5GzBMRsybHw.jtm1WvdeMsSKDCe3dQ8eLfMLc6AUm6O';
echo password_verify('password', $hash) ? "MATCH\n" : "NO_MATCH\n";

