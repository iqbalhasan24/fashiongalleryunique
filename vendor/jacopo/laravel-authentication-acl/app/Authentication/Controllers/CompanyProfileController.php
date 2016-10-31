<?php

namespace LaravelAcl\Authentication\Controllers;

/**
 * Class UserController
 *
 * @author jacopo beschi jacopo@jacopobeschi.com
 */
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
use View,
    Redirect,
    App,
    Config;
use LaravelAcl\Authentication\Interfaces\AuthenticateInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CompanyProfileController extends Controller {

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

    /**
     * @var use LaravelAcl\Authentication\Interfaces\AuthenticateInterface;
     */
    protected $auth;
    protected $register_service;
    protected $custom_profile_repository;

    public function __construct(UserValidator $v, FormHelper $fh, UserProfileValidator $vp, AuthenticateInterface $auth) {
        $this->user_repository = App::make('user_repository');
        $this->user_validator = $v;
        $this->f = App::make('form_model', [$this->user_validator, $this->user_repository]);
        $this->form_helper = $fh;
        $this->profile_validator = $vp;
        $this->profile_repository = App::make('profile_repository');
        $this->auth = $auth;
        $this->register_service = App::make('register_service');
        $this->custom_profile_repository = App::make('custom_profile_repository');
    }

    public function companyProfile(Request $request) {
        $logged_user = $this->auth->getLoggedUser();
        $modal = $request->get('modal');
        $custom_profile_repo = App::make('custom_profile_repository', [$logged_user->user_profile()->first()->id]);
        return View::make('laravel-authentication-acl::admin.user.company-profile')
                        ->with([
                            "user_profile" => $logged_user->user_profile()
                            ->first(),
                            "custom_profile" => $custom_profile_repo,
                            "modal" => $modal
        ]);
    }

    public function EditCompanyProfile(Request $request) {
        $input = $request->except('_token');
        if (isset($input['company_name']) && !empty($input['company_name'])) {
            foreach ($input['company_name'] as $key => $v) {
                $data['Company' . $key]['company_name'] = $v;
            }
        } else {
            unset($input['company_name']);
        }

        if (isset($input['urls']) && !empty($input['urls'])) {
            foreach ($input['urls'] as $key => $v) {
                $data['Company' . $key]['urls'] = $v;
            }
        } else {
            unset($input['urls']);
        }
        if (isset($input['c_phone']) && !empty($input['c_phone'])) {
            foreach ($input['c_phone'] as $key => $v) {
                $data['Company' . $key]['phone'] = $v;
            }
        } else {
            unset($input['c_phone']);
        }
        if (isset($input['copay_statement']) && !empty($input['copay_statement'])) {
            foreach ($input['copay_statement'] as $key => $v) {
                $data['Company' . $key]['copay_statement'] = $v;
            }
        } else {
            unset($input['copay_statement']);
        }
        if (isset($input['copay_statement']) && !empty($input['copay_statement'])) {
            foreach ($input['copay_statement'] as $key => $v) {
                $data['Company' . $key]['copay_statement'] = $v;
            }
        } else {
            unset($input['copay_statement']);
        }
        if (isset($input['monikers']) && !empty($input['monikers'])) {
            foreach ($input['monikers'] as $key => $v) {
                $data['Company' . $key]['monikers'] = $v;
            }
        } else {
            unset($input['monikers']);
        }

        $logos = array();
        if (isset($input['logos']) && !empty($input['logos'])) {
            $files = $input['logos'];
            $i = 1;
            foreach ($files as $key => $file) {
                if (isset($file) && !empty($file)) {
                    $filename = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $picture = date('His') . $filename;
                    $destinationPath = base_path() . '/public/logos';
                    $file->move($destinationPath, $picture);
                    $img[$key]['logo'] = $picture;
                }
                $i++;
            }
        }
        if (isset($input['old_logos']) && !empty($input['old_logos'])) {
            foreach ($input['old_logos'] as $k => $v) {
                $img[$k]['old_logo'] = $v;
            }
        }
        if (isset($img)) {
            foreach ($img as $k => $val) {
                if (isset($val['logo']) && isset($val['old_logo'])) {
                    $data['Company' . $k]['logo'] = $val['logo'];
                } else if (isset($val['logo'])) {
                    $data['Company' . $k]['logo'] = $val['logo'];
                } else {
                    $data['Company' . $k]['logo'] = $val['old_logo'];
                }
            }
        }
        $modal = $input['modal'];
        unset($input['modal']);
        if (isset($input['page']) && !empty($input['page'])) {
            $page = $input['page'];
            unset($input['page']);
        } else {
            $page = "";
        }
        if (isset($data) && !empty($data)) {
            $data['Default'] = "";
            $data['max_row'] = "";

            if (isset($input['Default']) & !empty($input['Default'])) {
                $data['Default'] = $input['Default'];
            }
            if (isset($input['max_row']) & !empty($input['max_row'])) {
                $data['max_row'] = $input['max_row'];
            }
            $input['company_info'] = json_encode($data);
        } else {
            $input['company_info'] = "";
        }
        $service = new UserProfileService($this->profile_validator);
        try {
            $service->processForm($input);
        } catch (JacopoExceptionsInterface $e) {
            $errors = $service->getErrors();
            return Redirect::back()
                            ->withInput()
                            ->withErrors($errors);
        }
        if (isset($page) && $page == "profile") {
            return Redirect::route('users.companyProfile')->withMessage(Config::get('acl_messages.flash.success.user_profile_edit_success'));
        } else if (isset($page) && $page == "letusdo") {
            return Redirect::route('dashboard.letusdo');
        } else {
            return Redirect::back()
                            ->withInput()
                            ->withMessage(Config::get('acl_messages.flash.success.user_profile_edit_success'));
        }
    }

    public function deleteProfile(Request $request) {
        $input = $request->except('_token');
        UserProfile::deleteProfile($input);
        echo TRUE;
    }

}
