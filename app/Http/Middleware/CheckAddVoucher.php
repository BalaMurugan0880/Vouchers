<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use DB;
use App\User;

class CheckAddVoucher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();
        $data = DB::table('users')->where('id', $user->id)->first(['vendorType', 'addvoucher_count']);

        $vendortype = data_get($data, 'vendorType');
        $vouchercount = data_get($data, 'addvoucher_count', 0);

        if ($vendortype == 'advancePackage') {
            if ($vouchercount >= 10) {
                return redirect('package')->with('message', trans('Upgrade To Premium Package To Add More Vouchers'));
            }
        } elseif ($vendortype == 'basicPackage') {
            if ($vouchercount >= 3) {
                return redirect('package')->with('message', trans('Upgrade To Advance Package To Add More Vouchers'));
            }
        } elseif (is_null($vendortype)) {
            if ($vouchercount >= 1) {
                return redirect('package')->with('message', trans('Upgrade To Basic Package To Add More Vouchers'));
            }
        }

        return $next($request);
    }
}
