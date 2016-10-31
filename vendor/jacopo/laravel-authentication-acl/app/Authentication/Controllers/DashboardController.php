<?php

namespace LaravelAcl\Authentication\Controllers;

use Illuminate\Http\Request;
use LaravelAcl\Authentication\Repository\ContentRepository;
use View;
use DB;
use Backpack\PageManager\app\Models\Page;

class DashboardController extends Controller {

    protected $contents;

    public function __construct(ContentRepository $contents) {

        $this->contents = $contents;
    }

    public function base(Request $request) {
        $authentication = \App::make('authentication_helper');
        $auth = \App::make('authenticator');
        $user = $auth->getLoggedUser();
        $verticles = str_replace(" ", "_", strtolower($user->groups()->first()->name));
        $menu = $request->get('menu');
        if ($authentication->hasPermission(array('_template-editor'))) {
            $page = Page::findBySlugOrId('marcom-builder');
            $contents = $this->contents->all($request->except(['page']), $verticles);
//            dd($contents);
            return View::make('laravel-authentication-acl::admin.dashboard.template-campaign')->with(["contents" => $contents, "request" => $request, 'page' => $page->withFakes(), 'letusdo' => 0]);
        } else
            return View::make('laravel-authentication-acl::admin.dashboard.default')->with([]);
    }

    public function letUsDo(Request $request) {
        $authentication = \App::make('authentication_helper');
        $auth = \App::make('authenticator');
        $user = $auth->getLoggedUser();
        $verticles = str_replace(" ", "_", strtolower($user->groups()->first()->name));
        $menu = $request->get('menu');
        if ($authentication->hasPermission(array('_template-editor'))) {
            $page = Page::findBySlugOrId('marcom-builder');
            $contents = $this->contents->all($request->except(['page']), $verticles);
            return View::make('laravel-authentication-acl::admin.dashboard.template-campaign')->with(["contents" => $contents, "request" => $request, 'page' => $page->withFakes(), 'letusdo' => 1]);
        } else
            return View::make('laravel-authentication-acl::admin.dashboard.default')->with([]);
    }

    public function index(Request $request) {
        $authentication = \App::make('authentication_helper');
        if ($authentication->hasPermission(array('_template-editor'))) {
            $campaigns = $this->campaigns->all($request->except(['page']));
            return View::make('admin.dashboard.template-campaign')->with(["campaigns" => $campaigns, "request" => $request]);
        } else
            return View::make('admin.dashboard.default');
    }

    public function pdf(Request $request) {
//        $authentication = \App::make('authentication_helper');
//
//        //$pdf3 = \App::make('dompdf.wrapper');
//        //$pdf3->loadFile('/var/www/html/mdlive_content/MDLIVE-Monthly-Flyer-Cold-and-Flu-Employer.html');
//        //return $pdf3->download();
        $pdf2 = \App::make('snappy.image.wrapper');
        $pdf2->loadFile('http://mdlivemarketinghub.ml:88/admin/templates/list');
        return $pdf2->download();
//        $pdf = \App::make('snappy.pdf.wrapper');
//        $pdf->loadFile('http://localhost/mdlive_content/MDLIVE-Monthly-Flyer-Cold-and-Flu-Employer.html');
//        return $pdf->download();
    }

    public function getTagInfo(Request $request) {
        $authentication = \App::make('authentication_helper');
        $auth = \App::make('authenticator');
        $user = $auth->getLoggedUser();
        $verticles = str_replace(" ", "_", strtolower($user->groups()->first()->name));
        $tag_id_request = $request->tag_id;
        if ($tag_id_request != 10) {
            $columns = array('id', 'campaign_id', 'tag_id');
            $group = 'campaign_id';
            $orderby = array('campaign_id', 'asc');
            $where = array(['tag_id', $tag_id_request], ['verticles', '=', $verticles]);
            $contents_data = $this->contents->findWhere($columns, $where, $group, $orderby);
//            dd($contents_data);
            foreach ($contents_data as $key => $data) {
                $campaign[$key]['campaign_id'] = $data->campaign_id;
                $campaign[$key]['tag_id'] = $data->tag_id;
                $campaign[$key]['campaign_name'] = $data->campaign->campaign_name;
            }

            return response()->json([
                        'status' => 'ok',
                        'downloadable_content' => false,
                        'campaign' => $campaign
            ]);
        } else {
            $columns = array('id', 'campaign_id', 'tag_id');
            $group = 'campaign_id';
            $orderby = array('campaign_id', 'asc');
            $where = array(['tag_id', $tag_id_request], ['downloadable_content', '!=', '']);
            $contents_data = $this->contents->findWhere($columns, $where, $group, $orderby);

            foreach ($contents_data as $key => $data) {
                $campaign[$key]['id'] = $data->id;
                $campaign[$key]['campaign_name'] = $data->campaign->campaign_name;
            }

            return response()->json([
                        'status' => 'ok',
                        'downloadable_content' => true,
                        'campaign' => $campaign
            ]);
        }
    }

}
