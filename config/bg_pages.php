<?php

return[
    'pages' => [
        'home' => [
            'fields' => [
                [
                    'name' => 'content',
                    'label' => 'Content',
                    'type' => 'wysiwyg',
                    'placeholder' => 'Your content here',
                ],
                [
                    'name' => 'short_description',
                    'label' => 'Short description',
                    'type' => 'wysiwyg',
                    'placeholder' => '',
                    'fake' => true,
                    'store_in' => 'extras'
                ]
            ]
        ],
        'how_to_use' => [
            'fields' => [
                [
                    'name' => 'banner_title',
                    'label' => 'Banner title',
                    'type' => 'text',
                    'fake' => true,
                    'store_in' => 'extras',
                ],
                [
                    'name' => 'banner_image',
                    'label' => 'Banner image',
                    'type' => 'file',
                    'fake' => true,
                    'store_in' => 'extras',
                ],
                [
                    'name' => 'banner_description',
                    'label' => 'Banner description',
                    'type' => 'textarea',
                    'fake' => true,
                    'store_in' => 'extras',
                ],
                [
                    'name' => 'content_separator',
                    'type' => 'custom_html',
                    'value' => '<h2>Easy as 1-2-3</h2>',
                ],
                [
                    'name' => 'download',
                    'label' => 'Step 1. Download',
                    'type' => 'wysiwyg',
                    'fake' => true,
                    'store_in' => 'extras',
                ],
                [
                    'name' => 'customize',
                    'label' => 'Step 2. Customize',
                    'type' => 'text',
                    'fake' => true,
                    'store_in' => 'extras',
                ],
                [
                    'name' => 'customize_content1_title',
                    'type' => 'custom_html',
                    'value' => '<p class="lead">Download the document(s) you want to use depending on your objective:</p>',
                ],
                [
                    'name' => 'customize_content1_image',
                    'label' => 'Customize sample 1 preview image',
                    'type' => 'file',
                    'fake' => true,
                    'store_in' => 'extras',
                ],
                [
                    'name' => 'customize_content1_image',
                    'label' => 'Customize sample 1 preview image',
                    'type' => 'file',
                    'fake' => true,
                    'store_in' => 'extras',
                ],
                [
                    'name' => 'customize_content1_image',
                    'type' => 'custom_html',
                    'value' => '<p class="lead">Customize the document(s) by adding your phone number and web address</p>',
                ],
                [
                    'name' => 'customize_content2_image',
                    'label' => 'Customize sample preview image',
                    'type' => 'file',
                    'fake' => true,
                    'store_in' => 'extras',
                ]
            ]
        ],
        'encourage_activation' => [
            'fields' => [
                [
                    'name' => 'banner_title',
                    'label' => 'Banner title',
                    'type' => 'text',
                    'fake' => true,
                    'store_in' => 'extras',
                ],
                [
                    'name' => 'banner_image',
                    'label' => 'Banner image',
                    'type' => 'file',
                    'fake' => true,
                    'store_in' => 'extras',
                ],
                [
                    'name' => 'banner_description',
                    'label' => 'Banner description',
                    'type' => 'textarea',
                    'fake' => true,
                    'store_in' => 'extras',
                ],
                [
                    'name' => 'content',
                    'label' => 'Consumer Overview',
                    'type' => 'wysiwyg'
                ],
                [
                    'name' => 'faq',
                    'label' => 'FAQ',
                    'type' => 'wysiwyg',
                    'fake' => true,
                    'store_in' => 'extras',
                ]
            ]
        ],
        'promote_utilization' => [
            'fields' => [
                [
                    'name' => 'banner_title',
                    'label' => 'Banner title',
                    'type' => 'text',
                    'fake' => true,
                    'store_in' => 'extras',
                ],
                [
                    'name' => 'banner_image',
                    'label' => 'Banner image',
                    'type' => 'file',
                    'fake' => true,
                    'store_in' => 'extras',
                ],
                [
                    'name' => 'banner_description',
                    'label' => 'Banner description',
                    'type' => 'textarea',
                    'fake' => true,
                    'store_in' => 'extras',
                ],
                [
                    'name' => 'content',
                    'label' => 'Content',
                    'type' => 'wysiwyg'
                ],
                [
                    'name' => 'marcom_builder',
                    'label' => 'MARCOM Builder',
                    'type' => 'wysiwyg',
                    'fake' => true,
                    'store_in' => 'extras',
                ],
                [
                    'name' => 'engagement_material',
                    'type' => 'custom_html',
                    'value' => '<b>MDLIVE Engagement Material</b><br><hr>',
                ],
                [
                    'name' => 'flyers',
                    'label' => 'Flyers',
                    'type' => 'wysiwyg',
                    'fake' => true,
                    'store_in' => 'extras',
                ],
                [
                    'name' => 'posters',
                    'label' => 'Posters',
                    'type' => 'wysiwyg',
                    'fake' => true,
                    'store_in' => 'extras',
                ],
                [
                    'name' => 'web_banners',
                    'label' => 'Web Banners',
                    'type' => 'wysiwyg',
                    'fake' => true,
                    'store_in' => 'extras',
                ],
                [
                    'name' => 'ready_to_go_campaigns',
                    'type' => 'custom_html',
                    'value' => '<b>Ready to Go Campaigns</b><br><hr>',
                ],
                [
                    'name' => 'campaign_description',
                    'label' => 'Campaign description',
                    'type' => 'wysiwyg',
                    'fake' => true,
                    'store_in' => 'extras',
                ],
                [
                    'name' => 'campaign_health_system',
                    'label' => 'Campaign for health system',
                    'type' => 'wysiwyg',
                    'fake' => true,
                    'store_in' => 'extras',
                ],
                [
                    'name' => 'campaign_health_plan',
                    'label' => 'Campaign for health plan',
                    'type' => 'wysiwyg',
                    'fake' => true,
                    'store_in' => 'extras',
                ],
                [
                    'name' => 'campaign_employer',
                    'label' => 'Campaign for employer',
                    'type' => 'wysiwyg',
                    'fake' => true,
                    'store_in' => 'extras',
                ],
                [
                    'name' => 'video_presentations',
                    'label' => 'Video Presentations',
                    'type' => 'wysiwyg',
                    'fake' => true,
                    'store_in' => 'extras',
                ]
            ]
        ],
        'market_the_brand' => [
            'fields' => [
                [
                    'name' => 'banner_title',
                    'label' => 'Banner title',
                    'type' => 'text',
                    'fake' => true,
                    'store_in' => 'extras',
                ],
                [
                    'name' => 'banner_image',
                    'label' => 'Banner image',
                    'type' => 'file',
                    'fake' => true,
                    'store_in' => 'extras',
                ],
                [
                    'name' => 'banner_description',
                    'label' => 'Banner description',
                    'type' => 'textarea',
                    'fake' => true,
                    'store_in' => 'extras',
                ],
                [
                    'name' => 'logos_description',
                    'type' => 'custom_html',
                    'value' => '<b>Logos</b><br><hr>',
                ],
                [
                    'name' => 'content',
                    'label' => '',
                    'type' => 'wysiwyg'
                ],
                [
                    'name' => 'item_html',
                    'type' => 'custom_html',
                    'value' => '<b>Promotional Items</b><br><hr>',
                ],
                [
                    'name' => 'item_description',
                    'label' => 'MARCOM Builder',
                    'type' => 'wysiwyg',
                    'fake' => true,
                    'store_in' => 'extras',
                ]
            ]
        ]
    ],
    'posts' => [
        'home' => [
            'fields' => [
                [
                    'name' => 'thumbnail',
                    'label' => 'Thubnail',
                    'type' => 'file',
                    'placeholder' => '',
                    'fake' => true,
                    'store_in' => 'extras'
                ],
                [
                    'name' => 'content',
                    'label' => 'Content',
                    'type' => 'wysiwyg',
                    'placeholder' => 'Your content here',
                ]
            ]
        ],
        'slider' => [
            'fields' => [
                [
                    'name' => 'thumbnail',
                    'label' => 'Thubnail',
                    'type' => 'file',
                    'placeholder' => '',
                    'fake' => true,
                    'store_in' => 'extras'
                ],
                [
                    'name' => 'content',
                    'label' => 'Content',
                    'type' => 'wysiwyg',
                    'placeholder' => 'Your content here',
                ]
            ]
        ],
        'video' => [
            'fields' => [
                [
                    'name' => 'thumbnail',
                    'label' => 'Thubnail',
                    'type' => 'file',
                    'placeholder' => '',
                    'fake' => true,
                    'store_in' => 'extras'
                ],
                [
                    'name' => 'video_link',
                    'label' => 'Video link',
                    'type' => 'text',
                    'placeholder' => '',
                    'fake' => true,
                    'store_in' => 'extras'
                ],
                [
                    'name' => 'content',
                    'label' => 'Content',
                    'type' => 'wysiwyg',
                    'placeholder' => 'Your content here',
                ]
            ]
        ],
        'logo' => [
            'fields' => [
                [
                    'name' => 'thumbnail',
                    'label' => 'Thubnail',
                    'type' => 'file',
                    'placeholder' => '',
                    'fake' => true,
                    'store_in' => 'extras'
                ],
                [
                    'name' => 'content',
                    'label' => 'Content',
                    'type' => 'wysiwyg',
                    'placeholder' => 'Your content here',
                ]
            ]
        ],
        'promotional_items' => [
            'fields' => [
                [
                    'name' => 'thumbnail',
                    'label' => 'Thubnail',
                    'type' => 'file',
                    'placeholder' => '',
                    'fake' => true,
                    'store_in' => 'extras'
                ],
                [
                    'name' => 'big_image',
                    'label' => 'Big image',
                    'type' => 'file',
                    'placeholder' => '',
                    'fake' => true,
                    'store_in' => 'extras'
                ],
                [
                    'name' => 'video_link',
                    'label' => 'Video link',
                    'type' => 'text',
                    'placeholder' => '',
                    'fake' => true,
                    'store_in' => 'extras'
                ],
                [
                    'name' => 'content',
                    'label' => 'Content',
                    'type' => 'wysiwyg',
                    'placeholder' => 'Your content here',
                ]
            ]
        ]
    ]
];
