<?php

use LaravelAcl\Authentication\Classes\Menu\SentryMenuFactory;

/**
 * menu items available depending on permissions
 */
View::composer(['laravel-authentication-acl::admin.layouts.*', 'admin.layouts.*'], function ($view) {
    $menu_items = SentryMenuFactory::create()->getItemListAvailable();
    $view->with('menu_items', $menu_items);
});

/**
 * Dashboard sidebar
 */
View::composer(['laravel-authentication-acl::admin.dashboard.*', 'admin.dashboard.*'], function ($view) {
    $view->with('sidebar_items', [
        "Dashboard" => [
            "url" => URL::route('dashboard.default'),
            "icon" => '<i class="fa fa-tachometer"></i>'
        ]
    ]);
});

/**
 * User sidebar
 */
View::composer([
    'laravel-authentication-acl::admin.user.edit',
    'laravel-authentication-acl::admin.user.groups',
    'laravel-authentication-acl::admin.user.list',
    'laravel-authentication-acl::admin.user.profile',
        //'laravel-authentication-acl::admin.user.document-list',
        ], function ($view) {
    $view->with('sidebar_items', [
        "Users list" => [
            "url" => URL::route('users.list'),
            "icon" => '<i class="fa fa-user"></i>'
        ],
        "Add user" => [
            'url' => URL::route('users.edit'),
            "icon" => '<i class="fa fa-plus-circle"></i>'
        ],
//                "User's Document" => [
//                    'url' => URL::route('users.doc_list'),
//                    "icon" => '<i class="fa fa-user"></i>'
//                ]
    ]);
});
/**
 *  Group sidebar
 */
View::composer([
    'laravel-authentication-acl::admin.group.*',
    'laravel-authentication-acl::admin.permission.*',
        ], function ($view) {
    $view->with('sidebar_items', [
        "Groups list" => [
            'url' => URL::route('groups.list'),
            "icon" => '<i class="glyphicon glyphicon-th-list"></i>'
        ],
        "Add group" => [
            'url' => URL::route('groups.edit'),
            "icon" => '<i class="fa fa-plus-circle"></i>'
        ],
        "Permissions list" => [
            'url' => URL::route('permission.list'),
            "icon" => '<i class="fa fa-lock"></i>'
        ],
        "Add permission" => [
            'url' => URL::route('permission.edit'),
            "icon" => '<i class="fa fa-plus-circle"></i>'
        ]
    ]);
});
/**
 *  Permission sidebar
 */
//View::composer(['laravel-authentication-acl::admin.permission.*'], function ($view)
//{
//    $view->with('sidebar_items', [
//            "Permissions list" => [
//                    'url'  => URL::route('permission.list'),
//                    "icon" => '<i class="fa fa-lock"></i>'
//            ],
//            "Add permission"   => [
//                    'url'  => URL::route('permission.edit'),
//                    "icon" => '<i class="fa fa-plus-circle"></i>'
//            ]
//    ]);
//});
/**
 *  Content sidebar
 */
View::composer([
    'laravel-authentication-acl::admin.tags.*',
    'laravel-authentication-acl::admin.contents.*',
    'laravel-authentication-acl::admin.snippets.*',
    'admin.campaigns.*',
        ], function ($view) {
    $view->with('sidebar_items', [
        " Marketing Types" => [
            'url' => URL::route('tags.list'),
            "icon" => '<i class="glyphicon glyphicon-th-list"></i>'
        ],
        " Add Marketing Type" => [
            'url' => URL::route('tags.new'),
            "icon" => '<i class="fa fa-plus-circle"></i>'
        ],
        " Campaign Types" => [
            'url' => URL::route('campaigns.list'),
            "icon" => '<i class="glyphicon glyphicon-th-list"></i>'
        ],
        " Add Campaign" => [
            'url' => URL::route('campaigns.new'),
            "icon" => '<i class="fa fa-plus-circle"></i>'
        ],
        " Templates" => [
            'url' => URL::route('contents.list'),
            "icon" => '<i class="glyphicon glyphicon-th-list"></i>'
        ],
        " Add Template" => [
            'url' => URL::route('contents.new'),
            "icon" => '<i class="fa fa-plus-circle"></i>'
        ],
        " Snippet List" => [
            'url' => URL::route('snippets.list'),
            "icon" => '<i class="glyphicon glyphicon-th-list"></i>'
        ],
        " Add Snippet" => [
            'url' => URL::route('snippets.new'),
            "icon" => '<i class="fa fa-plus-circle"></i>'
        ]
    ]);
});
