<?php

namespace LaravelAcl\Authentication\Controllers;

/**
 * Class UserController
 *
 * @author jacopo beschi jacopo@jacopobeschi.com
 */
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use LaravelAcl\Authentication\Exceptions\PermissionException;
use LaravelAcl\Authentication\Helpers\DbHelper;
use LaravelAcl\Authentication\Models\UserProfile;
use LaravelAcl\Authentication\Presenters\UserPresenter;
use LaravelAcl\Authentication\Services\UserProfileService;
use LaravelAcl\Authentication\Validators\UserProfileAvatarValidator;
use LaravelAcl\Library\Exceptions\NotFoundException;
use LaravelAcl\Authentication\Models\User;
use LaravelAcl\Authentication\Helpers\FormHelper;
use LaravelAcl\Authentication\Validators\UserValidator;
use LaravelAcl\Library\Exceptions\JacopoExceptionsInterface;
use LaravelAcl\Authentication\Validators\UserProfileValidator;
use View,
    Redirect,
    App,
    Config,
    DB;
use LaravelAcl\Authentication\Interfaces\AuthenticateInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
//use App\Repositories\LogActivityRepository;

class UserUploadController extends Controller {

    /**
     * @var \LaravelAcl\Authentication\Repository\SentryUserRepository
     */
    protected $user_repository;
    protected $user_validator;

    /**
     * @var \LaravelAcl\Authentication\Helpers\FormHelper
     */
    protected $form_helper;
    protected $profile_repository;
    protected $profile_validator;
   // protected $LogActivityRepository;

    /**
     * @var use LaravelAcl\Authentication\Interfaces\AuthenticateInterface;
     */
    protected $auth;
    protected $register_service;
    protected $custom_profile_repository;

    public function __construct(UserValidator $v, FormHelper $fh, UserProfileValidator $vp, AuthenticateInterface $auth) {
        $this->profile_repository = App::make('profile_repository');
        $this->auth = $auth;
        //$this->LogActivityRepository = $logActivity;
    }

    public function view() {
        $logged_user = $this->auth->getLoggedUser();
        /* setUserLogActivity */
        $UserProfile= new UserProfile();
      //  $this->LogActivityRepository->setActivitiesLog($logged_user, 'user_uploads', $UserProfile, "A document was uploaded.");
        /* setUserLogActivity */
        return View::make('laravel-authentication-acl::admin.user.upload')
                        ->with([
                            "user_id" => $logged_user->user_profile()->first()->id,
                            "files" => $logged_user->user_uploads()->get()
        ]);
    }

    public function viewPhoto() {
        $logged_user = $this->auth->getLoggedUser();
        //$myitemfiles = $logged_user->user_uploads()->get();
        $myitemfiles = $photo = DB::table('user_uploads')->where([['status', 1], ['user_id', $logged_user->id]])->get();
        $result = "";
        foreach ($myitemfiles as $file) { //get an array which has the names of all the files and loop through it 
            $obj['name'] = $file->file_name; //get the filename in array
            $obj['size'] = "123456"; //get the flesize in array
            $result[] = $obj; // copy it to another array
        }
        header('Content-Type: application/json');
        echo json_encode($result);
//        return View::make('laravel-authentication-acl::admin.user.upload')
//                        ->with([
//                            "user_id" => $logged_user->user_profile()->first()->id,
//                            "files" => $logged_user->user_uploads()->get()
//        ]);
    }

    /*  public function searchphoto($keyword = null) {

      $logged_user = $this->auth->getLoggedUser();

      $myitemfiles = $photo = DB::table('user_uploads')->where([['status', 1], ['file_name', 'like', '%' . $keyword . '%'], ['user_id', $logged_user->id]])->get();
      $result = "";
      foreach ($myitemfiles as $file) { //get an array which has the names of all the files and loop through it
      $obj['name'] = $file->file_name; //get the filename in array
      $obj['size'] = "123456"; //get the flesize in array
      $result[] = $obj; // copy it to another array
      }
      header('Content-Type: application/json');

      echo json_encode($result);
      }
     */
}
