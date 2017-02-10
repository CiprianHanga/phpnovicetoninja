<?php

function html($text) {
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

function htmlout($text) {
    echo html($text);
}

// End of PHP code tag not included as for included files policy.
