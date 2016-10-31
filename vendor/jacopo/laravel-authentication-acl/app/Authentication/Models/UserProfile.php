<?php

namespace LaravelAcl\Authentication\Models;

use LaravelAcl\Authentication\Presenters\UserProfilePresenter;
use DB;

/**
 * Class UserProfile
 *
 * @author jacopo beschi jacopo@jacopobeschi.com
 */
class UserProfile extends BaseModel {

    protected $table = "user_profile";
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'phone',
        'vat',
        'state',
        'city',
        'country',
        'zip',
        'code',
        'address',
        'avatar',
//        'company_name',
//        'urls',
//        'logos',
//        'copay_statement',
//        'monikers',
        'company_info'
    ];
    protected $guarded = ["id"];

    public function user() {
        return $this->belongsTo('LaravelAcl\Authentication\Models\User', "user_id");
    }

    public function profile_field() {
        return $this->hasMany('LaravelAcl\Authentication\Models\ProfileField');
    }

    public function getAvatarAttribute() {
        return isset($this->attributes['avatar']) ? base64_encode($this->attributes['avatar']) : null;
    }

    public function presenter() {
        return new UserProfilePresenter($this);
    }

    public static function deleteProfile($input) {
        $id = $input['id'];
        $user_profile = DB::table('user_profile')->where('id', $id)->first();
        $column_data = json_decode($user_profile->{$input['column_name']});
        if (is_object($column_data)) {
            $column_data = get_object_vars($column_data);
        }
        if ($input['column_name'] != "logos") {
            $key = array_search($input['name'], $column_data);
        } else {
            $key = array_search($input['name'], $column_data);
            $destinationPath = base_path() . '/public/logos' . "/" . $input['name'];
            unlink($destinationPath);
        }
        $unset_column_data = array_diff($column_data, array($input['name']));
        if (isset($unset_column_data) && !empty($unset_column_data)) {
            $input[$input['column_name']] = json_encode($unset_column_data);
        } else {
            $input[$input['column_name']] = "";
        }
        unset($input['name']);
        if (isset($input[$input['column_name']]) && empty($input[$input['column_name']])) {
            $input[$input['column_name']] = "";
        }
        unset($input['column_name']);
        $sql = DB::table('user_profile')->where('id', $id)->update($input);
        return $sql;
    }

}
