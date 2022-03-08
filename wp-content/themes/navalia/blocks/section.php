<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

/**
 * Simple section  
 */
$section = new FieldsBuilder('section');
$section
->addTab('Content')
    ->addImage('image')
    ->addWysiwyg('content')
    ->addLink('button')
->addTab('Background')
    ->addFields($backgroundSettings)
->addTab('Advanced')
    ->addFields($advancedSettings);