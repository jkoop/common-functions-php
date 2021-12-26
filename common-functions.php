<?php

/**
 * escape for html
 */
function e(string $string, bool $addExtraTags = true): string {
    if ($addExtraTags) {
        return str_replace('  ', ' &nbsp;', str_replace('/', '/<wbr>', htmlspecialchars($string, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8')));
    } else {
        return htmlspecialchars($string, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }
}

/**
 * emit http status code and exit
 */
function abort(int $status, string $message) {
    http_response_code($status);
    echo $message;
    exit;
}

/**
 * dump var(s) and exit
 */
function dd(...$args): void {
    dump(...$args);
    exit;
}

/**
 * dump var(s)
 */
function dump(...$args): void {
    echo '<pre>';
    ob_start();
    var_dump(...$args);
    $dump = ob_get_clean();
    echo e($dump, false);
    echo '</pre>';
    exit;
}

function echo_to_stderr(string $string): void {
    fwrite(STDERR, $string);
}
