<?php  namespace LaravelAcl\Authentication\Presenters;
/**
 * Class GroupPresenter
 *
 * @author jacopo beschi jacopo@jacopobeschi.com
 */
use LaravelAcl\Authentication\Presenters\Traits\PermissionTrait;
use LaravelAcl\Library\Presenters\AbstractPresenter;

class TagPresenter extends AbstractPresenter
{
    use PermissionTrait;
} 
