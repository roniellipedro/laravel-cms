<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $date = $request->only([
            'start_date',
            'end_date'
        ]);

        if ($date) {
            $data['start_date'] = $request->start_date;
            $data['end_date'] = $request->end_date;
        } else {
            $data['start_date'] = date('Y-m-d');
            $data['end_date'] = date('Y-m-d');
        }

        $data['visitsCount'] = count(Visitor::where('date_access', '>=', $data['start_date'])
            ->where('date_access', '<=', $data['end_date'])
            ->get());

        $datelimit = date('Y-m-s H:i:s', strtotime('-5 minutes'));
        $dateList = Visitor::select('ip')->where('date_access', '>=', $datelimit)->groupBy('ip')->get();
        $data['onlineCount'] = count($dateList);

        $data['pageCount'] = Page::count();

        $data['userCount'] = User::count();

        $pagePie = [];
        $visitsAll = Visitor::selectRaw('page, count(page) as c')
            ->where('date_access', '>=', $data['start_date'])
            ->where('date_access', '<=', $data['end_date'])
            ->groupBy('page')
            ->get();

        foreach ($visitsAll as $visit) {
            $pagePie[$visit['page']] = intval($visit['c']);
        }

        $data['pageLabels'] = json_encode(array_keys($pagePie));
        $data['pageValues'] = json_encode(array_values($pagePie));

        return view('admin.dashboard', $data);
    }
}
