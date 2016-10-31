<?php

namespace App\Repositories;

/**
 * Class ContentRepository
 *
 * @author Sahbaj Uddin
 */
use Config,
    Event;

class LogActivityRepository {

    /**
     * Sentry instance
     * @var
     */
    public function __construct() {
        
    }

    public function setActivitiesLog($logged_user, $log_keyword, $performedOn, $message, Array $Properties=NULL) {
        activity($log_keyword)
                ->causedBy($logged_user->id)
                ->performedOn($performedOn)
                ->withProperties($Properties)
                ->log($message);
    }

}
