<?php
/**
 * Company: InfyOm Technologies, Copyright 2019, All Rights Reserved.
 *
 * User: Monika Vaghasiya
 * Email: monika.vaghasiya@infyom.com
 * Date: 11/13/2019
 * Time: 01:14 PM
 */

namespace App\Queries;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use DB;
/**
 * Class UserDataTable.
 */
class UserDataTable
{
    /**
     * @param array $input
     * 
     * @return Builder
     */
    public function get($input = [], $activeW, $userW)
    {
        $users = User::with(['roles']);
        $users->when(
            isset($input['filter_user']),
            function (Builder $q) use ($input, $activeW, $userW) {
                if ($input['filter_user'] == User::FILTER_ARCHIVE) {
                    $q->onlyTrashed();
                }
                if ($input['filter_user'] == User::FILTER_ALL) {
                    $q->withTrashed();
                }
                if ($input['filter_user'] == User::FILTER_ACTIVE) {
                    $q->where('is_active', '=', 1);
                }
                if ($input['filter_user'] == User::FILTER_INACTIVE) {
                    $q->where('is_active', '=', 0);
                }
                //if ($input['filter_user'] == User::FILTER_INACTIVE) {
                    //echo  url()->current();
                $q->where('user', '=', $userW);
                if($activeW == 2)
                {
                    $q->where('is_active', '=', $activeW);
                    $q->orwhere('is_active', '=', 3);
                    $q->orwhere('is_active', '=', 4);
                }
                else
                    $q->where('is_active', '=', $activeW);
                //}
            }
        );
        $users = $users->get()->except(getLoggedInUserId());
        // $userArry = [];
        $index = 0;
        foreach ($users as $key => $user) {
            /** @var User $user */
            //echo ($user->id).",";

            $followers = 0;
            $subscribs = 0;
            $media_datas = 0;

            $sql =   'select count(id) as cnt from user_relation where user_id = "'. $user->id .'" and relation = 2 group by user_id';
            $res = DB::select($sql); 
            for( $index = 0; $index < count($res); $index++) {
                $followers = $res[$index]->cnt;
            }

            $sql =   'select count(id) as cnt from user_relation where user_id = "'. $user->id .'" and relation = 3 group by user_id';
            $res = DB::select($sql); 
            for( $index = 0; $index < count($res); $index++) {
                $subscribs = $res[$index]->cnt;
            }

            $sql =   'select count(id) as cnt from media_upload where user_id = "'. $user->id .'" group by user_id';
            $res = DB::select($sql); 
            for( $index = 0; $index < count($res); $index++) {
                $media_datas = $res[$index]->cnt;
            }

            $users[$key] = $user->apiObj();
            $users[$key] += ["followers"=>$followers];
            $users[$key] += ["subscribs"=>$subscribs];
            $users[$key] += ["media_datas"=>$media_datas];

            $index++;
        }
      
        return $users;
    }
}
