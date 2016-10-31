<?php

namespace App;

trait PageTemplates {
    /*
      |--------------------------------------------------------------------------
      | Page Templates for Backpack\PageManager
      |--------------------------------------------------------------------------
      |
      | Each page template has its own method, that define what fields should show up using the Backpack\CRUD API.
      | Use snake_case for naming and PageManager will make sure it looks pretty in the create/update form
      | template dropdown.
      |
      | Any fields defined here will show up after the standard page fields:
      | - select template
      | - page name (only seen by admins)
      | - page title
      | - page slug
     */

    private function home() {
       

        $this->crud->addField([   // CustomHTML
            'name' => 'content_separator',
            'type' => 'custom_html',
            'value' => '<br><h2>Content</h2><hr>',
        ]);

        $this->crud->addField([
            'name' => 'content',
            'label' => 'Content',
            'type' => 'tinymce',
            'placeholder' => 'Your content here',
        ]);
        $this->crud->addField([
            'name' => 'short_description',
            'label' => 'Short description',
            'type' => 'tinymce',
            'fake' => true,
            'store_in' => 'extras',
        ]);

    }    

 
    private function partnership() { 
      
        $this->crud->addField([   // CustomHTML
            'name' => 'content_separator',
            'type' => 'custom_html',
            'value' => '<br><h2>Content</h2><hr>',
        ]);

        $this->crud->addField([
            'name' => 'content',
            'label' => 'Content',
            'type' => 'tinymce',
        ]);

        $this->crud->addField([
            'name' => 'short_description',
            'label' => 'Short description',
            'type' => 'tinymce',
            'fake' => true,
            'store_in' => 'extras',
        ]);

        $this->crud->addField([
            'name' => 'documentation_details',
            'label' => 'Documentation Details',
            'type' => 'tinymce',
            'fake' => true,
            'store_in' => 'extras'
        ]);

        $this->crud->addField([
            'name' => 'aws_support_documentation',
            'label' => 'AWS Support Documentation',
            'type' => 'tinymce',
            'fake' => true,
            'store_in' => 'extras'
        ]);


       }

 
        private function westcon_Comstor_AWS_Cloud_Portfolio() {
            
            $this->crud->addField([
                'name' => 'content',
                'label' => 'Content',
                'type' => 'tinymce',
                'placeholder' => 'Your content here',
            ]);
            $this->crud->addField([
                'name' => 'short_description',
                'label' => 'Short description',
                'type' => 'tinymce',
                'fake' => true,
                'store_in' => 'extras',
            ]);
        }


         private function training_Enablement() {
            

            $this->crud->addField([
                'name' => 'short_description',
                'label' => 'Short description',
                'type' => 'tinymce',
                'fake' => true,
                'store_in' => 'extras',
            ]);

            
            $this->crud->addField([
                'name' => 'content',
                'label' => 'Content',
                'type' => 'tinymce',
            ]);
        }

    
   
        private function engaging_End_Customers() {
                

                $this->crud->addField([
                    'name' => 'short_description',
                    'label' => 'Short description',
                    'type' => 'tinymce',
                    'fake' => true,
                    'store_in' => 'extras',
                ]);

                
                $this->crud->addField([
                    'name' => 'content',
                    'label' => 'Content',
                    'type' => 'tinymce',
                ]);
            } 
    
    
        private function activition_On_Boarding_And_Support() {
        

            $this->crud->addField([   // CustomHTML
                'name' => 'content_separator',
                'type' => 'custom_html',
                'value' => '<br><h2>It\'s as easy as ...</h2><hr>',

                'store_in' => 'extras',

            ]);
            $this->crud->addField([
                'name' => 'short_description',
                'label' => 'Short description',
                'type' => 'tinymce',
                'fake' => true,
                'store_in' => 'extras',
            ]);
          
            $this->crud->addField([
                'name' => 'content',
                'label' => 'Content',
                'type' => 'tinymce',
            ]);
        }

 
     
}
