<?php

$header = <<<EOF
This file is part of the appname Project.

(c) appname <contact@***.com>
EOF;

Symfony\CS\Fixer\Contrib\HeaderCommentFixer::setHeader($header);

$finder = Symfony\CS\Finder\DefaultFinder::create()
    ->in(array(__DIR__))
;

return Symfony\CS\Config\Config::create()
    // Set to Symfony Level (PSR1 PSR2)
    ->level(Symfony\CS\FixerInterface::SYMFONY_LEVEL)
    ->fixers(array(
        'header_comment',           // Add the provided header comment ($header)
        'newline_after_open_tag',   // Force new line after <?php
        'ordered_use',              // Order "use" alphabetically
        'short_array_syntax',       // Replace array() by []
        '-empty_return',            // Keep return null;
        'phpdoc_order',             // Clean up the /** php doc */
        
        // Alignment war start here.
        '-align_double_arrow',      // Force no double arrow align
        'unalign_double_arrow',     // Keep double arrow simple
        '-align_equals',            // Force no aligned equals
        'unalign_equals',           // Keep equals simple
    ))
    ->setUsingCache(true)
    ->finder($finder)
;
