<?php  
namespace App;
namespace LaravelAcl\Authentication\Helpers;
/**
 * Class FormHelper
 *
 * @author jacopo beschi jacopo@jacopobeschi.com
 */
use LaravelAcl\Authentication\Repository\EloquentPermissionRepository as PermissionRepository;
use LaravelAcl\Authentication\Repository\SentryGroupRepository;
use LaravelAcl\Authentication\Repository\SentryTagRepository;
use App\Repositories\CampaignRepository;
use Config;

class FormHelper
{
    /**
     * @var \LaravelAcl\Authentication\Repository\EloquentPermissionRepository
     */
    protected $repository_permission;
    /**
     * @var \LaravelAcl\Authentication\Repository\SentryGroupRepository
     */
    protected $repository_groups;

    public function __construct(PermissionRepository $rp = null, SentryGroupRepository $rg = null)
    {
        $this->repository_permission = $rp ? $rp : new PermissionRepository();
        $this->repository_groups = $rg ? $rg : new SentryGroupRepository();
        $this->repository_tags = $rg ? $rg : new SentryTagRepository();
        $this->repository_campaigns = $rg ? $rg : new CampaignRepository();
    }

    public function getSelectValues($repo_name, $key_value, $value_value)
    {
        $all_objects = $this->{$repo_name}->all();

        if($all_objects->isEmpty()) return [];

        foreach($all_objects as $object) $array_values[$object->{$key_value}] = $object->{$value_value};

        return $array_values;
    }

    public function getSelectValuesPermission()
    {
        return $this->getSelectValues("repository_permission", 'permission', 'description');
    }

    public function getSelectValuesGroups()
    {
        return $this->getSelectValues("repository_groups", 'id', 'name');
    }

    /**
     * Prepares permission for sentry given the input
     *
     * @param array $input
     * @param       $operation
     * @param       $field_name
     * @return void
     */
    public function prepareSentryPermissionInput(array &$input, $operation, $field_name = "permissions")
    {
        $input[$field_name] = isset($input[$field_name]) ? [$input[$field_name] => $operation] : '';
    }
    
    
    public function getSelectValuesTags()
    {
        return $this->getSelectValues("repository_tags", 'id', 'tag_name');
    }
    
    public function getSelectValuesCampaigns()
    {
        return $this->getSelectValues("repository_campaigns", 'id', 'campaign_name');
    }
    
    public function getSelectValuesVerticles()
    {
        return $this->getSelectVerticlesValues();
    }
    
    public function getSelectVerticlesValues(){
        $verticles_array = Config::get('acl_base.verticles'); 
        foreach($verticles_array as $key=>$val) $array_values[$val] = ucwords(str_replace ("_", " ", $val));

        return $array_values;
    }
    
    public function getSelectContentOutputValues(){
        $content_output_array = array("print" => "Print", "doc" => "Doc", "html" => "HTML"); 
        foreach($content_output_array as $key=>$val) $array_values[$key] = $val;

        return $array_values;
    }
} 