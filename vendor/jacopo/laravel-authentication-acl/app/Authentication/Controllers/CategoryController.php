<?php

namespace LaravelAcl\Authentication\Controllers;

/**
 * Class CategoryController
 *
 * @author Sahbaj Uddin
 */
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use LaravelAcl\Authentication\Presenters\CategoryPresenter;
use LaravelAcl\Library\Form\FormModel;
use LaravelAcl\Authentication\Helpers\FormHelper;
use LaravelAcl\Authentication\Models\Category;
use LaravelAcl\Authentication\Exceptions\UserNotFoundException;
use LaravelAcl\Library\Validators\ValidatorInterface;
use LaravelAcl\Authentication\Validators\CategoryValidator;
use LaravelAcl\Authentication\Repository\SentryCategoryRepository;
use LaravelAcl\Library\Exceptions\JacopoExceptionsInterface;
use View,
    Redirect,
    App,
    Config;
//use LaravelAcl\Authentication\Interfaces\AuthenticateInterface;


class CategoryController extends Controller {

    /**
     * @var \LaravelAcl\Authentication\Repository\SentryCategoryRepository
     */
    protected $categories;
    protected $category_validator;

    /**
     * @var \LaravelAcl\Authentication\Helpers\FormHelper
     */
    protected $form_helper;

    /**
     * @var use LaravelAcl\Authentication\Interfaces\AuthenticateInterface;
     */
    protected $auth;

    public function __construct(CategoryValidator $v, FormHelper $fh, SentryCategoryRepository $categories) {
        $this->categories = $categories;
        $this->category_validator = $v;
        $this->f = App::make('form_model', [$this->category_validator, $this->categories]);
        $this->form_helper = $fh;
//$this->auth = $auth;
        
    }

    public function getList(Request $request) {
        $categories = $this->categories->all($request->except(['page']));
        return View::make('laravel-authentication-acl::admin.categories.index')->with(["categories" => $categories, "request" => $request]);
    }

    

    /**
     * Destroy the given category.
     *
     * @param  Request  $request
     * @param  Category  $category
     * @return Response
     */
    public function deleteCategory(Request $request) {        
        $this->categories->delete($request->get('id'));        
        return Redirect::route('categories.list')->withMessage(Config::get('acl_messages.flash.success.category_delete_success'));
    }

    public function editCategory(Request $request) {
        try {
            $obj = $this->categories->find($request->get('id'));
        } catch (UserNotFoundException $e) {
            $obj = new Category;
        }
        $presenter = new CategoryPresenter($obj);

        return View::make('laravel-authentication-acl::admin.categories.edit')->with(["category" => $obj, "presenter" => $presenter]);
    }

    public function newCategory(Request $request) {
        return View::make('laravel-authentication-acl::admin.categories.new');
    }

    public function postEditCategory(Request $request) {
        $id = $request->get('id');

        try {
            $obj = $this->f->process($request->all());
        } catch (JacopoExceptionsInterface $e) {
            $errors = $this->f->getErrors();
            // passing the id incase fails editing an already existing item
            return Redirect::route("categories.edit", $id ? ["id" => $id] : [])->withInput()->withErrors($errors);
        }
        return Redirect::route('categories.edit', ["id" => $obj->id])->withMessage(Config::get('acl_messages.flash.success.category_edit_success'));
    }

    public function postCategory(Request $request) {
        try {
            $obj = $this->f->process($request->all());
        } catch (JacopoExceptionsInterface $e) {
            $errors = $this->f->getErrors();            
            // passing the id incase fails editing an already existing item
            return Redirect::route("categories.new", [])->withInput()->withErrors($errors);
        }
        return Redirect::route('categories.list', ["id" => $obj->id])->withMessage(Config::get('acl_messages.flash.success.category_edit_success'));
    }

}
