<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\History_model;
use App\User;
use App\Products_model;
use App\Charts\UserChart;


class ChartController extends Controller
{
    public function index()
    {
        $menu_active = 1;
        // $users = History_model::select(\DB::raw("COUNT(*) as count"))
        //             ->whereYear('created_at', date('Y'))
        //             ->groupBy(\DB::raw("Month(created_at)"))
        //             ->pluck('count');

        $users = History_model::select('quantity', \DB::raw('count(*) as total'))
                 ->groupBy('quantity')
                 ->pluck('total');

        $chart = new UserChart;
        $chart->labels(['Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des', 'Jan', 'Feb', 'Mar', 'Apr', 'Mei']);
        $chart->dataset('History', 'line', $users)->options([
            'fill' => 'true',
            'borderColor' => '#51C1C0'
        ]);

        return view('backEnd.chart.user', compact('chart','users','menu_active'));
    }   
    
}
