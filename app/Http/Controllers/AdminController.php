<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['visitsCount'] = Visitor::count();

        $datelimit = date('Y-m-s H:i:s', strtotime('-5 minutes'));
        $dateList = Visitor::select('ip')->where('date_access', '>=', $datelimit)->groupBy('ip')->get();
        $data['onlineCount'] = count($dateList);

        $data['pageCount'] = Page::count();

        $data['userCount'] = User::count();

        $pagePie = [];
        $visitsAll = Visitor::selectRaw('page, count(page) as c')->groupBy('page')->get();
        foreach ($visitsAll as $visit) {
            $pagePie[$visit['page']] = intval($visit['c']);
        }

        $data['pageLabels'] = json_encode(array_keys($pagePie));
        $data['pageValues'] = json_encode(array_values($pagePie));

        return view('admin.home', $data);
    }
}
