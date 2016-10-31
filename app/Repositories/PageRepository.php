<?php

namespace App\Repositories;

/**
 * Class PageRepository
 *
 * @author Sahbaj Uddin
 */
use App\Page;
use Config,
    Event;

class PageRepository {

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
            "template" => $input["template"],
            "name" => $input["name"],
            "title" => $input["title"],
            "slug" => $input["slug"],
            "content" => $input["content"],
            "extras" => $input["extras"],
            "banner_type" => $input["banner_type"],
        );

        $page = new Page;
        $page->create($data);
        return $page;
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
    
    public function all() {
        $q = new Page;
        $per_page = Config::get('acl_base.pages_per_page');
        return $q->orderBy('id', 'desc')->paginate($per_page);
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
            $page = Page::find($id);
        } catch (GroupNotFoundException $e) {
            throw new NotFoundException;
        }

        return $page;
    }

}
