<?php

declare(strict_types=1);

defined('TYPO3') or die('Access denied.');

// Register the maidem_pdfexport CType as a standard content element
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(
    [
        'label' => 'PDF Export',
        'value' => 'maidem_pdfexport',
        'icon'  => 'EXT:maidem_pdfexport/Resources/Public/Icons/pdfexport.svg',
        'group' => 'default',
    ],
    'CType'
);

// The two tile labels
$GLOBALS['TCA']['tt_content']['columns']['maidem_pdfexport_info_label'] = [
    'label' => 'Kachel „Info": Kategorie-Label (z. B. Vitals)',
    'config' => [
        'type'    => 'input',
        'size'    => 30,
        'eval'    => 'trim',
        'default' => 'Vitals',
    ],
];
$GLOBALS['TCA']['tt_content']['columns']['maidem_pdfexport_tech_label'] = [
    'label' => 'Kachel „Skills": Kategorie-Label (z. B. Stack)',
    'config' => [
        'type'    => 'input',
        'size'    => 30,
        'eval'    => 'trim',
        'default' => 'Stack',
    ],
];

// Define which fields are shown in the backend form for this CType
$GLOBALS['TCA']['tt_content']['types']['maidem_pdfexport'] = [
    'showitem' => '
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
            --palette--;;general,
            --palette--;;headers,
            bodytext;Description,
            subtitle;Button-Beschriftung (z. B. PDF ERSTELLEN),
            section_anchor,
        --div--;Kachel-Beschriftungen,
            maidem_pdfexport_info_label,
            maidem_pdfexport_tech_label,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
            --palette--;;hidden,
            --palette--;;access,
    ',
    'columnsOverrides' => [
        'bodytext' => [
            'config' => [
                'enableRichtext' => true,
            ],
        ],
    ],
];
