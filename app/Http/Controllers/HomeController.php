<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Media;
use App\Models\Paid;
use App\Models\Relation;
use App\Models\PayjpAccount;
use App\Models\MediaLoveComment;
use App\Queries\UserDataTable;
use App\Repositories\UserRepository;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        // return redirect('/conversations');

        // $user->roles;
        // $user = $user->apiObj();
       // $user = $request->user();
        $users = User::where('user','2')
                ->orderBy('name', 'asc')
                ->get()->except(getLoggedInUserId());    
       
        //return view('users.show')->with('user', $user);
        return view('home.index')->with('user', $users);
    }
    public function file_upload()
    {
         return view('home.file_upload');
    }  
    public function timeline(Request $request)
    {
        $login_user = User::find(\Auth::id());
        $user_id = $login_user['id'];
      //  $user = User::withTrashed()->whereId($id)->first(); //Creator 
        $mediaData = Media::select(
                DB::raw('count(media_love_comment.id) AS loves'),
                'users.id AS creatorID',
                'users.name AS creatorName', 
                'users.photo_url', 
                'media_upload.photo_url AS mediaURL',
                'media_upload.privacy AS mediaPrivacy',
                'media_upload.type',
                'media_upload.comment AS mediaCmnt',
                'media_upload.id AS mediaId',
                'media_upload.created_at',
                'user_relation.relation AS creatorRelation')
       
        ->join('users', 'users.id', '=', 'media_upload.user_id')        
        ->leftjoin('user_relation', 'user_relation.creator_id', '=', 'media_upload.user_id')
        ->leftjoin('media_love_comment', 'media_love_comment.media_id', '=', 'media_upload.id')
        ->where('media_upload.privacy', '>', 0)
        ->where('users.user', '=', 2)
        ->where('user_relation.user_id', '=', $user_id)
        ->orWhere('media_upload.user_id', '=', $user_id)
        ->orderby('media_upload.created_at', 'desc')
        ->groupby('media_upload.id')
        //->where('users.id', '=', 'user_relation.creator_id')
        ->get(); 
        return view('home.timeline',compact('mediaData'));
    }
    public function profile(Request $request)
    {
        $user = $request->user(); 
        $id = $user["id"];   
        $mediaData = Media::where([
            ['user_id', $id],
        ]) 
        ->orderby('created_at', 'desc')
        ->get(); 
        $photo = Media::where([
                ['user_id', $id],
                ['type', '=', 1],                
        ])->get();        
        $video = Media::where([
            ['user_id', $id],
            ['type', '=', 2],                
        ])->get();       
          
        $follower_free_list = Relation::select('users.id','users.photo_url','users.name','users.email','users.about')
        ->join('users', 'users.id', '=', 'user_relation.user_id')
        ->where('user_relation.creator_id', $id)
        ->where('user_relation.relation', 2)
        ->get();   
        
        $follower_sub_list = Paid::select('users.id','users.photo_url','users.name','users.email','users.about','user_paid.paid')
        ->join('users', 'users.id', '=', 'user_paid.user_id') 
        ->where('user_paid.creator_id' , $id)         
        ->get();   
        
        $follow_free_list = Relation::select('users.id','users.photo_url','users.name','users.email','users.about')
        ->join('users', 'users.id', '=', 'user_relation.creator_id')
        ->where('user_relation.user_id', $id)
        ->where('user_relation.relation', 2)
        ->get(); 

         $follow_sub_list = Paid::select('users.id','users.photo_url','users.name','users.email','users.about','user_paid.paid')
        ->join('users', 'users.id', '=', 'user_paid.creator_id') 
        ->where('user_paid.user_id' , $id)         
        ->get(); 

        $follower_sub_paid = Paid::select('*')
        ->where('user_paid.creator_id' , $id)
        ->sum('paid'); 
        $follow_sub_paid = Paid::select('*')
        ->where('user_paid.user_id' , $id)
        ->sum('paid');   


        //get card information
        $card_info = PayjpAccount::where([
            ['user_id', $id],                           
            ])->get(); 
        
         return view('home.profile',compact('mediaData','photo','video','follower_free_list','follower_sub_list',
                                            'follow_free_list','follow_sub_list','follower_sub_paid','follow_sub_paid','card_info'));
    }
    public function user_profile(Request $request)
    {
        $user = $request->user(); 
        $id = $user["id"]; 
        $paid = Paid::where([
            ['user_id', $id],                          
        ])->sum('user_paid.paid');          
        $subscribe = Relation::where([
                ['user_id',  $id], 
                ['relation', 3],                              
        ])->count();                
        $follow = Relation::where([
            ['user_id', $id], 
            ['relation', 2],                              
        ])->count();   
        $followerlist = Relation::select('users.id','users.photo_url','users.name','users.email','users.about')
        ->join('users', 'users.id', '=', 'user_relation.creator_id')
        ->where('user_relation.user_id', $id)
        ->where('user_relation.relation', 2)
        ->get();   
        
        $subscribelist = Paid::select('users.id','users.photo_url','users.name','users.email','users.about','user_paid.paid')
        ->join('users', 'users.id', '=', 'user_paid.creator_id') 
        ->where('user_paid.user_id' , $id)         
        ->get();      
        $card_info = PayjpAccount::where([
            ['user_id', $id],                           
            ])->get();   
       
         return view('home.users_profile',compact('paid','subscribe','follow','followerlist','subscribelist','card_info'));
    }
    public function userprofile($id,Request $request)
    {
        $login_user = User::find(\Auth::id());
        $user_id = $login_user['id']; //userid
        $creator = User::withTrashed()->whereId($id)->first(); //Creator            
        $login_user = User::find(\Auth::id());
        $user_id = $login_user['id'];
        $mediaData = Media::select('users.id AS creatorID', 
                'users.name AS creatorName', 
                'users.photo_url', 
                'users.monthly_price',
                'media_upload.photo_url AS mediaURL',
                'media_upload.privacy AS mediaPrivacy',
                'media_upload.type',
                'media_upload.id AS mediaId',
                'media_upload.created_at',
                'media_upload.comment AS mediaCmnt',
                'user_relation.relation AS creatorRelation',
                'media_love_comment.love AS love',
                'media_love_comment.comment AS comment',
                )
        ->join('users', 'users.id', '=', 'media_upload.user_id')
        ->leftjoin('user_relation', 'user_relation.creator_id', '=', 'media_upload.user_id')
        ->leftjoin('media_love_comment', 'media_love_comment.media_id', '=', 'media_upload.id')
        ->where('media_upload.user_id', '=', $id)
        ->where('users.user', '=', 2)
        ->where('user_relation.user_id', '=', $user_id)
        ->orderby('media_upload.created_at', 'desc')
        //->where('users.id', '=', 'user_relation.creator_id')
        ->get();
        $paidData = Paid::select('*')
            ->where('creator_id', '=', $id)
            ->where('user_id', '=', $user_id)
            ->where('finished_at', '>=', Carbon::now()->format('Y-m-d'))
            ->get();
        $card_info = PayjpAccount::where([
            ['user_id', $user_id],                           
            ])->get(); 
        return view('home.userprofile',compact('creator','mediaData','paidData','card_info'));
        
    }
    public function setLoveAction(Request $request)
    {
        if($request->media_id){

            $userid = \Auth::id();
            $media_id = $request->media_id;
            $followcheck = MediaLoveComment::where([
                ['user_id',     $userid], 
                ['media_id',  $media_id],                      
            ])->first();      
            if(!is_null($followcheck)){
                $user =  MediaLoveComment::where([
                    ['user_id',     $userid], 
                    ['media_id',  $media_id],                      
                ])->update([
                    'love' => !$followcheck->love
                ]);
                return $user;
            }
            else
            {
                try {
                    /** @var subscribe $user */           
                    $user = MediaLoveComment::create([
                        'user_id'           => $userid,
                        'media_id'        => $media_id,
                        'love'                    => 1,
                        'comment'                    => "",
                    ]);
                    return $user;
                } catch (Exception $e) {  
                    throw new UnprocessableEntityHttpException($e->getMessage());
                }
            }
        }
    }
    public function setCommentAction(Request $request)
    {
        if($request->media_id){

            $userid = \Auth::id();
            $media_id = $request->media_id;
            $followcheck = MediaLoveComment::where([
                ['user_id',     $userid], 
                ['media_id',  $media_id],                      
            ])->first();      
            if(!is_null($followcheck)){
                $user =  MediaLoveComment::where([
                    ['user_id',     $userid], 
                    ['media_id',  $media_id],                      
                ])->update([
                    'comment' => $request->comment,
                ]);
                return $user;
            }
            else
            {
                try {
                    /** @var subscribe $user */           
                    $user = MediaLoveComment::create([
                        'user_id'           => $userid,
                        'media_id'        => $media_id,
                        'love'                    => 0,
                        'comment'                    => $request->comment,
                    ]);
                    return $user;
                } catch (Exception $e) {  
                    throw new UnprocessableEntityHttpException($e->getMessage());
                }
            }
        }
    }
}
