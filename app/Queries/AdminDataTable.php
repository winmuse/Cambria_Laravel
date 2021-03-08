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
 * Class AdminDataTable.
 */
class AdminDataTable
{
    /**
     * @param array $input
     * 
     * @return Builder
     */
    public function get($input = [], $activeW, $userW)
    {
        // $users = [];
        // $users=array("Volvo","BMW","Toyota");

        $users = User::with(['roles']);
        $users->when(
            isset($input['filter_user']),
            function (Builder $q) use ($input, $activeW, $userW) {
                //if ($input['filter_user'] == User::FILTER_INACTIVE) {
                    //echo  url()->current();
                    $q->orwhere('is_system', '=', 1);
                //}
            }
        );

        $users = $users->get();
        // $userArry = [];
        $index = 0;
        foreach ($users as $key => $user) {
            $amount = 0;

            $sql =   'select sum(paid)/0.8*0.2 as cnt from user_paid';
            $res = DB::select($sql); 
            for( $index = 0; $index < count($res); $index++) {
                $amount = $res[$index]->cnt;
            }

            $users[$key] = $user->apiObj();
            $users[$key] += ["amount"=>$amount];

            $index++;
        }
        
        return $users;
    }
}
