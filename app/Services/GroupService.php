<?php

namespace App\Services;

use App\Models\Group;
use App\Models\GroupMember;
use App\Models\User;

class GroupService
{
   public function allGroups($userId=null){
     $data = Group::select('id','group_name','group_amount','no_of_week','time_duration','no_of_members','start_date');
     if(!is_null($userId)){
        $data->where('user_id',$userId);
     }
     $data = $data->paginate(30);
     return $data;
   }

   public function allUsersWithMember($userId,$groupId){
      return User::select('id','name','phone_number','profile_img')->with(['group_member'=>function($q) use($groupId){
         $q->where('group_id',$groupId);
      }])->where('id','!=',$userId)->paginate(50);
   }

   public function searchAllUsersWithMember($userId,$groupId,$search){
      return User::select('id','name','phone_number','profile_img')->with(['group_member'=>function($q) use($groupId){
         $q->where('group_id',$groupId);
      }])->where('id','!=',$userId)->where(function($qr) use($search){
         $qr->where('name','like',"%$search%");
         $qr->orWhere('phone_number','like','%'.$search.'%');
      })->limit(50)->paginate(50);
   }

   public function getAllGroupRequests($userId){
      return GroupMember::select('id','group_id')->where(['user_id'=>$userId,'status'=>'Pending'])->with(['group_data'=>function($q){
         $q->join('users as u','u.id','user_id')->select('groups.id','group_name','group_amount','no_of_week','no_of_members','start_date','name','user_id','time_duration');
      }])->paginate(50);
   }

   public function getGroupActiveMembers(int $groupId){
      return GroupMember::select('id','group_id','user_id')->with(['users'=>function($q){
         $q->select('id','name','phone_number','profile_img');
      }])->where(['status'=>'Member','group_id'=>$groupId])->paginate(50);
   }

   public function myActiveGroups(int $userId){
      return GroupMember::select('id','group_id','user_id')->with(['group_data'=>function($q){
         $q->join('users as u','u.id','user_id')->select('groups.id','group_name','group_amount','no_of_week','no_of_members','start_date','name','user_id','time_duration');
      }])->where(['status'=>'Member','user_id'=>$userId])->paginate(50);
   }
}
