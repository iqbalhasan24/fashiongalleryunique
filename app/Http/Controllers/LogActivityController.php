<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Sentry,
    Redirect,
    App,
    Config;
use LaravelAcl\Authentication\Interfaces\AuthenticateInterface;
use App\Repositories\LogActivityRepository;
use LaravelAcl\Authentication\Models\Snippet as Snippet;

class LogActivityController extends Controller {

    protected $authenticator;
    protected $reminder;
    protected $reminder_validator;
    protected $auth;
    protected $LogActivityRepository;

    public function __construct(AuthenticateInterface $auth, LogActivityRepository $logActivity) {
        $this->authenticator = App::make('authenticator');
        $this->auth = $auth;
        $this->LogActivityRepository = $logActivity;
    }

    public function postSnippetLogActivity(Request $request) {
        $snippet = new Snippet;
        $logged_user = $this->auth->getLoggedUser();
        $message = "snippets campaign was visited.";
        $properties = [ 'tag_id' => $request->tag_id, 'campaign_id' => $request->campaign_id];
        $this->LogActivityRepository->setActivitiesLog($logged_user, 'snippet_campaign', $snippet, $message, $properties);
    }
    
   /*not in use*/
     public function postUserUpload(Request $request) {
         
        $snippet = new Snippet;
        $logged_user = $this->auth->getLoggedUser();
        $message = "snippets campaign was visited.";
        $properties = [ 'tag_id' => $request->tag_id, 'campaign_id' => $request->campaign_id];
        $this->LogActivityRepository->setActivitiesLog($logged_user, 'snippet_campaign', $snippet, $message, $properties);
    }   
    
    

}
