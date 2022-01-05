<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

/**
 * A Hero section
 */
$hero = new FieldsBuilder('hero');
$hero
->addTab('Content')
    ->addText('heading')
    ->addWysiwyg('subhead')
    ->addLink('CTA Button')
->addTab('Background')
    ->addFields($backgroundSettings)
->addTab('Advanced')
    ->addFields($advancedSettings);