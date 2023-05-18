<?php

namespace App\Http\Controllers\Admin;

use Analytics;
use App\Http\Controllers\Controller;
use App\Models\ActiveCourseStudent;
use App\Models\ContactUs;
use Spatie\Analytics\Period;

//class GoogleAnalytics{
//
//    static function country() {
//        $country = Analytics::performQuery(Period::days(14),'ga:sessions',  ['dimensions'=>'ga:country','sort'=>'-ga:sessions']);
//        $result= collect($country['rows'] ?? [])->map(function (array $dateRow) {
//            return [
//                'country' =>  $dateRow[0],
//                'sessions' => (int) $dateRow[1],
//            ];
//        });
//        /* $data['country'] = $result->pluck('country'); */
//        /* $data['country_sessions'] = $result->pluck('sessions'); */
//        return $result;
//    }
//
//    static function topbrowsers()
//    {
//        $analyticsData = Analytics::fetchTopBrowsers(Period::days(14));
//        $array = $analyticsData->toArray();
//        foreach ($array as $k=>$v)
//        {
//            $array[$k] ['label'] = $array[$k] ['browser'];
//            unset($array[$k]['browser']);
//            $array[$k] ['value'] = $array[$k] ['sessions'];
//            unset($array[$k]['sessions']);
//            $array[$k]['color'] = $array[$k]['highlight'] = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
//        }
//        return json_encode($array);
//    }
//
//    static function topOs(){
//        $topOs=Analytics::fetchTopOs(Period::days(14));
//        $array = $topOs->toArray();
//        foreach ($array as $k=>$v)
//        {
//            $array[$k] ['label'] = $array[$k] ['operatingSystem'];
//            unset($array[$k]['operatingSystem']);
//            $array[$k] ['value'] = $array[$k] ['sessions'];
//            unset($array[$k]['sessions']);
//            $array[$k]['color'] = $array[$k]['highlight'] = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
//        }
//        return json_encode($array);
//    }
//
//    static function topRefers(){
//        $topRefers= Analytics::fetchTopReferrers(Period::days(14));
//        $array = $topRefers->toArray();
//        foreach ($array as $k=>$v)
//        {
//            $array[$k] ['label'] = $array[$k] ['url'];
//            unset($array[$k]['url']);
//            $array[$k] ['value'] = $array[$k] ['pageViews'];
//            unset($array[$k]['pageViews']);
//            $array[$k]['color'] = $array[$k]['highlight'] = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
//        }
//        return json_encode($array);
//    }
//
//}

class DashboardController extends Controller
{
    //    public function __construct(){
    //        $this->middleware('permission:statistics',['only'=>['index']]);
    //    }

    public function index()
    {
        $contact = ContactUs::where('status', 0)->count();
        //        $activeStudentCountry=DB::raw("");

        //        $activeStudentCountry=ActiveCourseStudent::select('user_id')
        //            ->with(['user'=> function($q){
        //                $q->select('countrie_id')->groupBy('countrie_id');
        //            }])
        //            ->get();
        //        return $activeStudentCountry;
        return view('Admin.Dashboard.dashboard', compact('contact'));
    }
}
