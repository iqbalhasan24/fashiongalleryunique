<?php

return [
        "email" => [
            /*
            |--------------------------------------------------------------------------
            | Email subject
            |--------------------------------------------------------------------------
            |
            | Here you can change the subject of each email sent in the system
            |
            */

            /*
             * User registration request
             */
            "user_registration_request_subject"     => "Registration request to: MDLiveMarketingHUB",
            /*
             * User activation
             */
            "user_registraction_activation_subject" => "Your user is activated on: MDLiveMarketingHUB",
            /*
             * User password recovery
             */
            "user_password_recovery_subject"        => "Password recovery request",
        ],

        /*
        |--------------------------------------------------------------------------
        | Flash messages
        |--------------------------------------------------------------------------
        |
        */
        "flash" => [
            /*
             * User success messages
             */
            "success" => [
                // user
                "user_edit_success"                    => "User edited with success.",
                "user_delete_success"                  => "User deleted with success.",
                "user_group_add_success"               => "Group added with success.",
                "user_group_delete_success"            => "Group deleted with success.",
                "user_permission_add_success"          => "Permission added with success.",
                "user_profile_edit_success"            => "Profile edited with success.",
                "custom_field_added"                   => "Field added succesfully.",
                "custom_field_removed"                 => "Field removed succesfully.",
                "avatar_edit_success"                  => "Avatar changed succesfully",
                // group
                "group_edit_success"                   => "Group edited succesfully.",
                "group_delete_success"                 => "Group deleted succesfully.",
                "group_permission_edit_success"        => "Permission edited succesfully.",
                // permission
                "permission_permission_edit_success"   => "Permission edited with success.",
                "permission_permission_delete_success" => "Permission deleted with success.",
                // category
                "category_edit_success"   => "Category edited with success.",
                "category_delete_success" => "Category deleted with success.",
                // content
                "content_new_success"   => "Content added successfully.",
                "content_edit_success"   => "Content edited successfully.",
                "content_delete_success" => "Content deleted successfully.",
                // template
                "template_new_success"   => "Template added successfully.",
                "template_edit_success"   => "Template edited with success.",
                "template_delete_success" => "Template deleted successfully.",
                "template_edit_not_authorize" => "You are not authorize to edit this template.",
                // campaign
                "campaign_new_success"   => "Campaign added successfully.",
                "campaign_edit_success"   => "Campaign edited with success.",
                "campaign_delete_success" => "Campaign deleted successfully.",
                "template_approval"   => "Template approved.",
                "template_approval_error"   => "No Template found.",
                "media_success"   => "Image added successfully.",
                "media_delete"   => "Image deleted successfully.",
                "not_authorized"   => "You are not authorized fot this operation.",
                // page
                "page_new_success"   => "Page added successfully.",
                "page_edit_success"   => "Page edited successfully.",
                "page_delete_success" => "Page deleted successfully.",
                
                 // Snippet
                "snippet_new_success"   => "Snippet added successfully.",
                "snippet_edit_success"   => "Snippet edited successfully.",
                "snippet_delete_success" => "Snippet deleted successfully.",
                "snippet_delete_without_html_success" => "Snippet deleted from database but html snippet doees not found!!",
                "snippet_update_without_html_success" => "Snippet updated into database but html snippet cannot be updated!!",
                "snippet_template_file_not_found" => "Snippet updated into database but snippet html template does not found!!",
                "document_approved" => "Document has been approved successfully",
                "document_pending" => "Document has been pending successfully",
                "document_delete" => "Document has been deleted successfully",
                "media_category_create" => "Media category has been created successfully",
                "media_category_edit" => "Media category has been edited successfully",
                "media_category_delete" => "Media category has been deleted",
                // reminder

            ],
            /*
             * User error messages
             */
            "error"   => [
                // user
                "user_group_not_found"       => "Group not found.",
                "user_permission_not_found"  => "Permission not found",
                "user_user_not_found"        => "User not found.",
                "custom_field_not_found"     => "Cannot find the custom field.",
                "cannot_upload_file"         => "Cannot upload the file.",
                // group
                "group_permission_not_found" => "Permission not found.",
                // permission
                // reminder
                "reset_password_error" => 'There was a problem changing the password.',
                "captcha_error" => 'Confirmation code is not valid.',
                "content_file_upload_error" => 'File upload error.'
            ]
        ],
        /*
        |--------------------------------------------------------------------------
        | Various link
        |--------------------------------------------------------------------------
        |
        */
        "links" => [
                "change_password" => "Click here to change your password."
        ]
];