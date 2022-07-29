<?php

namespace App\Http\Controllers\Private\Admin;

use App\Http\Controllers\Controller;
use App\Models\Komentar;
use App\Models\Lokasi;
use App\Models\Toko;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $count_user = User::all()->count();
        $count_valid_user = User::where('status', 1)->count();
        $count_invalid_user = User::where('status', null)->where('role', 'toko')->count();
        $count_frozen_user = User::where('status', '>' ,1)->count();

        $komentar = Komentar::all();
        $komentar->count('toko');
        $now = Carbon::now()->toDateTimeString();
        $twuday = Carbon::now()->subDays(1)->toDateTimeString();
        $tokos = Toko::whereBetween('created_at', [$twuday, $now])->get();
        return view('private.admin.dashboard', compact(
            'count_user',
            'count_valid_user',
            'count_frozen_user',
            'count_invalid_user',
            'komentar',
            'tokos'
        ));
    }


}
