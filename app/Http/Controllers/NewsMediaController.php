<?php

namespace LaravelAcl\Authentication\Controllers;

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use view,
    DB,
    App,
    Config;
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
use Backpack\NewsCRUD\app\Models\Article as Article;
use Backpack\PageManager\app\Models\Page;
use Backpack\NewsCRUD\app\Models\Category as Category;

class NewsMediaController extends Controller {

    protected $auth;

    public function __construct(AuthenticateInterface $auth) {

        $this->auth = $auth;
    }

    public function index(Request $request) {
        $authentication = \App::make('authentication_helper');
        $auth = \App::make('authenticator');
        $user = $auth->getLoggedUser();

        $per_page = Config::get('acl_base.contents_per_page');
        $news = Article::where([['category_id', 7], ['status', 'PUBLISHED']])->paginate($per_page);
        return View::make('admin.news.news-all')->with(['user' => $user, 'newsmedia' => $news, 'request' => $request]);
    }

    public function press(Request $request) {

        $authentication = \App::make('authentication_helper');
        $auth = \App::make('authenticator');
        $user = $auth->getLoggedUser();

        $per_page = Config::get('acl_base.contents_per_page');
        $pressrelease= Article::where([['category_id', 8], ['status', 'PUBLISHED']])->paginate($per_page);
        
        //dd($pressrelease);
        return View::make('admin.news.press-release-all')->with(['user' => $user, 'pressrelease' => $pressrelease, 'request' => $request]);
    }
    
    
        public function getdetail(Request $request, $slug) {
        $authentication = \App::make('authentication_helper');
        $auth = \App::make('authenticator');
        $user = $auth->getLoggedUser();
        $pressrelease= Article::where([['category_id', 8], ['slug', $slug], ['status', 'PUBLISHED'] ])->get();
        return View::make('admin.news.press-release-detail')->with(['user' => $user, 'pressrelease' => $pressrelease, 'request' => $request]);
    }
    

}
