<?php

use LaravelAcl\Authentication\Helpers\FormHelper;

/**
 * permission select
 */
View::composer(['laravel-authentication-acl::admin.user.edit', 'laravel-authentication-acl::admin.group.edit'], function ($view) {
    $fh = new FormHelper();
    $values_permission = $fh->getSelectValuesPermission();
    $view->with('permission_values', $values_permission);
});
/**
 * group select
 */
View::composer(['laravel-authentication-acl::admin.user.edit', 'laravel-authentication-acl::admin.group.edit',
    'laravel-authentication-acl::admin.user.search'], function ($view) {
    $fh = new FormHelper();
    $values_group = $fh->getSelectValuesGroups();
    $view->with('group_values', $values_group);
});
/**
 * cateory select
 */
View::composer([
    'laravel-authentication-acl::admin.contents.new',
    'laravel-authentication-acl::admin.contents.edit',
    'laravel-authentication-acl::admin.media.content-images',
    'laravel-authentication-acl::admin.media.view-media',
    'admin.templates.new',
    'admin.templates.edit',
    'laravel-authentication-acl::admin.snippets.new',
    'laravel-authentication-acl::admin.snippets.edit',
        ], function ($view) {
    $fh = new FormHelper();
    $values_tag = $fh->getSelectValuesTags();

    $view->with('tag_values', $values_tag);
});
/**
 * campaign select
 */
View::composer([
    'laravel-authentication-acl::admin.contents.new',
    'laravel-authentication-acl::admin.contents.edit',
    'admin.templates.new',
    'admin.templates.edit',
    'laravel-authentication-acl::admin.snippets.new',
    'laravel-authentication-acl::admin.snippets.edit',
        ], function ($view) {
    $fh = new FormHelper();
    $values_campaign = $fh->getSelectValuesCampaigns();
    $view->with('campaign_values', $values_campaign);
});
/**
 * verticle select
 */
View::composer([
    'laravel-authentication-acl::admin.contents.new',
    'laravel-authentication-acl::admin.contents.edit',
    'laravel-authentication-acl::admin.snippets.new',
    'laravel-authentication-acl::admin.snippets.edit'
        ], function ($view) {
    $fh = new FormHelper();
    $values_verticle = $fh->getSelectValuesVerticles();
    $view->with('verticle_values', $values_verticle);
});
/**
 * content output select
 */
View::composer([
    'laravel-authentication-acl::admin.contents.new',
    'laravel-authentication-acl::admin.contents.edit'
        ], function ($view) {
    $fh = new FormHelper();
    $values_content_output = $fh->getSelectContentOutputValues();
    $view->with('content_output_values', $values_content_output);
});
