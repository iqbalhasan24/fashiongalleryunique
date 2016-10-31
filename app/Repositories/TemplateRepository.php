<?php

namespace App\Repositories;

/**
 * Class ContentRepository
 *
 * @author Sahbaj Uddin
 */
use App\Template;
use Config,
    Event;

class TemplateRepository {

    /**
     * Sentry instance
     * @var
     */
    public function __construct() {
        
    }

    /**
     * Create a new object
     *
     * @return mixed
     * @override
     */
    public function create(array $input) {        
        $data = array(
            "template_content" => $input["template_content"],
            "tag_id" => $input["tag_id"],
            "user_id" => $input["user_id"],
            "campaign_id" => $input["campaign_id"],
            "template_name" => $input["template_name"],
            "verticles" => $input["verticles"]
        );

        $template = new Template;
        $template->create($data);
        return $template;
    }

    /**
     * Update a new object
     *
     * @param       id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data) {
        $obj = $this->find($id);
        Event::fire('repository.updating', [$obj]);
        $obj->update($data);
        return $obj;
    }

    /**
     * Obtains all models
     *
     * @override
     * @param array $search_filters
     * @return mixed
     */
    public function all($user_id = null, array $search_filters = [], $verticles = null) {

        $q = new Template;
        $per_page = Config::get('acl_base.contents_per_page');
        if ($user_id > 0)
            return $q->orderBy('id', 'desc')->where('user_id', $user_id)->paginate($per_page);
        elseif ($verticles !="")
            return $q->orderBy('id', 'desc')->where('verticles', $verticles)->paginate($per_page);
        else
            return $q->orderBy('id', 'desc')->paginate($per_page);
    }

    /**
     * @param array $search_filters
     * @param       $q
     * @return mixed
     */
    protected function applySearchFilters(array $search_filters, $q) {
        if (isset($search_filters['tag_name']) && $search_filters['tag_name'] !== '')
            $q = $q->where('tag_name', 'LIKE', "%{$search_filters['tag_name']}%");
        return $q;
    }

    /**
     * Deletes a new object
     *
     * @param $id
     * @return mixed
     */
    public function delete($id) {
        $obj = $this->find($id);
        Event::fire('repository.deleting', [$obj]);
        return $obj->delete();
    }

    /**
     * Find a model by his id
     *
     * @param $id
     * @return mixed
     * @throws \LaravelAcl\Authentication\Exceptions\UserNotFoundException
     */
    public function find($id) {
        try {
            $content = Template::find($id);
        } catch (GroupNotFoundException $e) {
            throw new NotFoundException;
        }

        return $content;
    }

}
