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

        $pagePie = [
            'Teste 1' => 100,
            'Teste 2' => 200,
            'Teste 3' => 300
        ];

        $data['pageLabels'] = json_encode(array_keys($pagePie));
        $data['pageValues'] = json_encode(array_values($pagePie));

        return view('admin.home', $data);
    }
}
