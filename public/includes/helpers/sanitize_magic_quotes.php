<?php
// This solution is to be used on servers where magic quotes are TURNED ON by default
// and you can't change it to OFF. In this case, you have to *undo* all the modifications
// it makes to your code.
// Insert this solution at the top of the SQL instructions controller, before anything else.
// From: PHP & MySQL: Novice to Ninja, 5th Edition, by Kevin Yank, Sitepoint, 2012 (p. 123).

if (get_magic_quotes_gpc()) {
    $process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
    while (list($key, $val) = $each($process)) {
        foreach ($val as $k => $v) {
            unset($process[$key][$k]);
            if (is_array($v)) {
                $process[$key][stripslashes($k)] = $v;
                $process[] = &$process[$key][stripslashes($k)];
            } else {
                $process[$key][stripslashes($k)] = stripslashes($v);
            }
        }
    }
    unset($process);
}

// End of PHP code tag not included as for included files policy.
