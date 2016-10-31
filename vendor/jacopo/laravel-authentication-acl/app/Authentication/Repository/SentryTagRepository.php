<?php

namespace LaravelAcl\Authentication\Repository;

/**
 * Class CategoryRepository
 *
 * @author Sahbaj Uddin
 */
use Illuminate\Database\Eloquent\ModelNotFoundException;
use LaravelAcl\Library\Repository\Interfaces\BaseRepositoryInterface;
use LaravelAcl\Authentication\Models\Tag;
use LaravelAcl\Authentication\Exceptions\UserNotFoundException as NotFoundException;
use App,
    Event;
use Illuminate\Support\Facades\Config;

class SentryTagRepository {

    /**
     * Sentry instance
     * @var
     */
    public function __construct() {
        //$this->sentry = App::make('sentry');
        //$this->config_reader = $config_reader ? $config_reader : App::make('config');
        //return parent::__construct(new Category);
    }

    /**
     * Create a new object
     *
     * @return mixed
     * @override
     */
    public function create(array $input) {
        $data = array(
            "tag_name" => $input["tag_name"],
            "thumbnail" => $input["thumbnail"],
            "orderby" => $input["orderby"]
        );

        try {
            //$category = $this->sentry->createCategory($data);
            $tag = new Tag;
            $tag->create($data);
        } catch (CartaUserExists $e) {
            throw new NotFoundException;
        }

        return $tag;
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
    public function all(array $search_filters = []) {

        $q = new Tag;
        $q = $this->applySearchFilters($search_filters, $q);
        $per_page = Config::get('acl_base.tags_per_page');
        return $q->paginate($per_page);
    }

    /**
     * @param array $search_filters
     * @param       $q
     * @return mixed
     */
    protected function applySearchFilters(array $search_filters, $q) {
        if (isset($search_filters['tag_name']) && $search_filters['tag_name'] !== '') {
            $q = $q->where('tag_name', 'LIKE', "%{$search_filters['tag_name']}%");
        }
        $q = $q->orderBy('orderby', 'DESC');
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
            //$flight = App\Flight::find(1);
            $tag = Tag::find($id);
            //$category = $this->sentry->findGroupById($id);
        } catch (GroupNotFoundException $e) {
            throw new NotFoundException;
        }

        return $tag;
    }

}
