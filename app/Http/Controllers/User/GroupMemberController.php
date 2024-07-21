<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\GroupMember;
use App\Services\GroupService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Group;
class GroupMemberController extends Controller
{
    

    public function groupRequest(GroupService $groupService){
        $data['requestData'] = $groupService->getAllGroupRequests(Auth::id());
        // dd($data['requestData']);
        return view('user.group-member.group-request',$data);
    }

    public function acceptGroupRequest(){
        $id = $this->memberObj['id'];
        GroupMember::where('id',$id)->update(['status'=>'Active']);
        return redirect()->back()->with('success','Request sent successfully..you will become group member once approved by group creator');
    }

    public function addMemberToGroup(){
        $groupId = $this->memberObj['id'];
        $userId = $this->memberObj['user_id'];
        $check = GroupMember::where(['group_id'=>$groupId,'user_id'=>$userId,'status'=>'Active'])->first();
        if(!$check){
            return redirect()->back()->with('warning','Something went wrong');
        }
        GroupMember::where('id',$check->id)->update(['status'=>'Member']);
        return redirect()->back()->with('success','User added to group successfully...');
    }

    public function myGroupMember(GroupService $groupService){
        $id = $this->memberObj['id'];
        $data['groupData'] = Group::find($id);
        $data['memberData'] = $groupService->getGroupActiveMembers($id);
        // dd($data['memberData']);
        return view('user.group-member.my-group-member',$data);
    }

    public function removeGroupMembers(){
        $groupId = $this->memberObj['id'];
        $userId = $this->memberObj['user_id'];
        $check = GroupMember::where(['group_id'=>$groupId,'user_id'=>$userId,'status'=>'Member'])->first();
        if(!$check){
            return redirect()->back()->with('warning','Something went wrong');
        }
        GroupMember::where('id',$check->id)->delete();
        return redirect()->back()->with('success','member removed from group successfully...');
    }

    public function myActiveGroups(GroupService $groupService){
        $data['memberData'] = $groupService->myActiveGroups(Auth::id());
        // dd($data['memberData']);
        return view('user.group-member.my-active-groups',$data);
    }

    public function payForGroup(){

    }
}
