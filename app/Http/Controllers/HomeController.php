<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
//        $from = new \DateTime('2021-03-30 15:00:00');
//        $to = new \DateTime('2021-03-31 15:59:00');
////
//        $totalDays = ($from->diff($to)->format('%a')) ==0 ? 1: $from->diff($to)->format('%a');
//        $totalDays =($from->diff($to)->format('%h')) >= 1 ? $totalDays+1 : $totalDays;
//
////        $totalDays = $from->diff($to);
//        dd($totalDays);


        return view('layouts.userviews.homepage');
    }

    public function Profile()
    {
        if (!auth()->user()){return redirect('/');}

        $user = auth()->user();
        $active_rents=Rent::Where([

                    ['user_id',$user->id],
                    ['rent_status',1],
            ])->get();

        $rents = Rent::Where([
            ['user_id',$user->id],
        ])
                ->With('car')
                ->get();

        $current_rents = Rent::Where([
            ['user_id',$user->id],
            ['rent_status','!=',2],
             ])
            ->orderBy('created_at', 'DESC')
            ->whereDate('created_at', '>', \Carbon\Carbon::now()->subMonth())
            ->With('car')
            ->get();
//        dd($current_rents);

        return view('layouts.userviews.profile-page',compact('user','rents','current_rents','active_rents'));
    }
}
