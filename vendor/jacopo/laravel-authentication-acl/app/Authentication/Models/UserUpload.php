<?php

namespace LaravelAcl\Authentication\Models;

use DB;

/**
 * Class UserUploads
 *
 * @author jacopo beschi jacopo@jacopobeschi.com
 */
class UserUpload extends BaseModel {

    protected $table = "user_uploads";
    protected $fillable = [
        'user_id',
        'file_name'
    ];
    protected $guarded = ["id"];

    public function user() {
        return $this->belongsTo('LaravelAcl\Authentication\Models\User');
    }
    
}
