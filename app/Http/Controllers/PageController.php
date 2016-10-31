<?php

namespace LaravelAcl\Authentication\Controllers;

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use view,
    App;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use LaravelAcl\Authentication\Exceptions\PermissionException;
use LaravelAcl\Authentication\Exceptions\ProfileNotFoundException;
use LaravelAcl\Authentication\Helpers\DbHelper;
use LaravelAcl\Authentication\Models\UserProfile;
use LaravelAcl\Authentication\Presenters\UserPresenter;
use LaravelAcl\Authentication\Services\UserProfileService;
use LaravelAcl\Authentication\Validators\UserProfileAvatarValidator;
use LaravelAcl\Library\Exceptions\NotFoundException;
use LaravelAcl\Authentication\Models\User;
use LaravelAcl\Authentication\Helpers\FormHelper;
use LaravelAcl\Authentication\Exceptions\UserNotFoundException;
use LaravelAcl\Authentication\Validators\UserValidator;
use LaravelAcl\Library\Exceptions\JacopoExceptionsInterface;
use LaravelAcl\Authentication\Validators\UserProfileValidator;
use LaravelAcl\Authentication\Interfaces\AuthenticateInterface;
use Backpack\NewsCRUD\app\Models\Article;
use Backpack\PageManager\app\Models\Page;

class PageController extends Controller {

    protected $auth;

    public function __construct(AuthenticateInterface $auth) {

        $this->auth = $auth;
    }

    public function getWecomePage() {
        $logged_user = $this->auth->getLoggedUser();

        $sliders = Article::where([['category_id', 1], ['status', 'PUBLISHED']])->get();
        $home = Article::where([['category_id', 4], ['status', 'PUBLISHED']])->get();
        $page = Page::findBySlugOrId('home');

        return View::make('admin.pages.page')->with(['user_data' => $logged_user, 'sliders' => $sliders, 'page' => $page->withFakes(), 'home_rows' => $home]);
    }

    public function howtouse() {
        $page = Page::findBySlugOrId('how-to-use-hub');
        return View::make('admin.pages.howtouse')->with(['page' => $page->withFakes()]);
    }

    public function encourageactivation() {
        $page = Page::findBySlugOrId('encourage-activation');
        return View::make('admin.pages.encourageactivation')->with(['page' => $page->withFakes()]);
    }

    public function brandassets() {
        $page = Page::findBySlugOrId('brand-assets');
        $logos = Article::where([['category_id', 2], ['status', 'PUBLISHED']])->get();
        $items = Article::where([['category_id', 5], ['status', 'PUBLISHED']])->get();
        return View::make('admin.pages.brandassets')->with(['page' => $page->withFakes(), 'logos' => $logos, 'items' => $items]);
    }

    public function promoteutilization() {
        $authentication = \App::make('authentication_helper');
        $auth = \App::make('authenticator');
        $user = $auth->getLoggedUser();

        $videos = Article::where([['category_id', 3], ['status', 'PUBLISHED']])->get();
        $materials = Article::where([['category_id', 6], ['status', 'PUBLISHED']])->get();
        $page = Page::findBySlugOrId('promote-utilization');
        return View::make('admin.pages.promoteutilization')->with(['user' => $user, 'page' => $page->withFakes(), 'videos' => $videos, 'materials' => $materials]);
    }

    public function newsmedia() {
        $authentication = \App::make('authentication_helper');
        $auth = \App::make('authenticator');
        $user = $auth->getLoggedUser();

        $videos = Article::where([['category_id', 3], ['status', 'PUBLISHED']])->get();
        $materials = Article::where([['category_id', 6], ['status', 'PUBLISHED']])->get();
        $page = Page::findBySlugOrId('promote-utilization');
        return View::make('admin.pages.news-media')->with(['user' => $user, 'page' => $page->withFakes(), 'videos' => $videos, 'materials' => $materials]);
    }

    public function resources() {
        $page = Page::findBySlugOrId('resources');
        return View::make('admin.pages.resources')->with(['page' => $page->withFakes()]);
    }

}
