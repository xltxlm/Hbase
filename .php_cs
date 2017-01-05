<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
;

return PhpCsFixer\Config::create()
    ->setRules(array(
        '@PSR2' => true,
        '@Symfony' => true,
        'phpdoc_order'=>true,
        'array_syntax' => array('syntax' => 'short'),
    ))
    ->setFinder($finder)
;