<?php namespace LaravelAcl\Authentication\Validators;

use Event;
use LaravelAcl\Library\Validators\AbstractValidator;

class TemplateValidator  extends AbstractValidator
{
    protected static $rules = array(
        "template_name" => ["required"],
        "template_content" => ["required"],
        "terms_agree" => ["required"]
    );

    public function __construct()
    {
        Event::listen('validating', function($input)
        {
            static::$rules["template_name"][] = "required";
            static::$rules["description"][] = "required";
            static::$rules["terms_agree"][] = "required";
        });
    }
} 