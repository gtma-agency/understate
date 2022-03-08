<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

/**
 * Image text section
 */
$imageText = new FieldsBuilder('imageText');
$imageText
->addTab('Content')
    ->addWysiwyg('content')
    ->addLink('button')
->addTab('Image')
    ->addImage('image', [
        'return_format' => 'array',
    ])
->addButtonGroup('switch', [
    'label' => 'Button Group Field',
    'instructions' => 'Switch order of image and content. Default is image left, content right',
    'required' => 0,
    'conditional_logic' => [],
    'wrapper' => [
        'width' => '',
        'class' => '',
        'id' => '',
    ],
    'choices' => ['img-left' => 'Image Left', 'img-right' => 'Image Right'],
    'allow_null' => 0,
    'default_value' => '',
    'layout' => 'horizontal',
    'return_format' => 'value',
    ])
->addTab('Background')
    ->addFields($backgroundSettings)
->addTab('Advanced')
    ->addFields($advancedSettings);