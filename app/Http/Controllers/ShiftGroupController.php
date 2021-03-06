<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shared\UserHelper;
use App\User;
use App\ShiftGroupMember;
use App\ShiftGroup;

class ShiftGroupController extends Controller
{
  public function index(Request $req){

    $all_subord = UserHelper::GetMySubords($req->user()->id, true);
    $freesubord = [];
    $ingroup = [];

    foreach($all_subord as $os){
      // check if this staff already in a group
      $sgrp = ShiftGroupMember::where('user_id', $os['id'])->first();
      if($sgrp){
        // already in group
        array_push($ingroup, $sgrp);
      } else {
        array_push($freesubord, $os);
      }
    }

    $glist = ShiftGroup::where('manager_id', $req->user()->id)
      ->orWhere('planner_id', $req->user()->id)->get();

    return view('shiftplan.shift_group', [
      'p_list' => $glist,
      'stafflist' => $all_subord,
      's_list' => $freesubord,
      'in_grp' => $ingroup
    ]);
  }

  public function addGroup(Request $req){
    // check for duplicate code
    $dups = ShiftGroup::where('manager_id', $req->user()->id)
      ->where('group_code', $req->group_code)->first();

    if($dups){
      return redirect()->back()->withInput()->with(['alert' => 'Duplicate code with ' . $dups->group_name, 'a_type' => 'danger']);
    }

    // no duplicate. proceed create new group
    $nugrup = new ShiftGroup;
    $nugrup->manager_id = $req->user()->id;
    $nugrup->planner_id = $req->planner_id;
    $nugrup->group_name = $req->group_name;
    $nugrup->group_code = $req->group_code;
    $nugrup->save();

    return redirect(route('shift.group.view', ['id' => $nugrup->id], false));
  }

  public function viewGroup(Request $req){

    $grup = ShiftGroup::find($req->id);
    if($grup){

      $all_subord = UserHelper::GetMySubords($req->user()->id, true);

      // return $all_subord;

      $freesubord = [];

      foreach($all_subord as $key => $os){
        // check if this staff already in a group

        if($os['id'] == $grup->planner_id){
          $all_subord[$key]['selected'] = 'selected';
        } else {
          $all_subord[$key]['selected'] = '';
        }

        $sgrp = ShiftGroupMember::where('user_id', $os['id'])->first();
        if($sgrp){
        } else {
          array_push($freesubord, $os);
        }
      }

      // dd($all_subord);

      return view('shiftplan.shift_group_detail', [
        'groupd' => $grup,
        'free_member' => $freesubord,
        'stafflist' => $all_subord
      ]);
    } else {
      return redirect(route('shift.group', [], false))->with(['alert' => 'Group not found', 'a_type' => 'warning']);
    }

  }

  public function addStaff(Request $req){
    // double check if this staff in any group
    $ingrp = ShiftGroupMember::where('user_id', $req->user_id)->first();
    if($ingrp){
      return redirect()->back()->with(['alert' => 'Selected user already in group', 'a_type' => 'danger']);
    }

    // add to group
    $nugrpmbr = new ShiftGroupMember;
    $nugrpmbr->user_id = $req->user_id;
    $nugrpmbr->shift_group_id = $req->group_id;
    $nugrpmbr->save();

    return redirect(route('shift.group.view', ['id' => $req->group_id], false))->with(['alert' => 'Staff added to group', 'a_type' => 'success']);

  }

  public function removeStaff(Request $req){
    $ingrp = ShiftGroupMember::where('user_id', $req->user_id)
            ->where('shift_group_id', $req->group_id)
            ->first();

    if($ingrp){
      $ingrp->delete();

      return redirect(route('shift.group.view', ['id' => $req->group_id], false))->with(['alert' => 'Staff removed from group', 'a_type' => 'success']);
    } else {
      return redirect(route('shift.group.view', ['id' => $req->group_id], false))->with(['alert' => 'Selected staff is not in this group', 'a_type' => 'warning']);
    }
  }

  public function editGroup(Request $req){
    $cgroup = ShiftGroup::find($req->id);

    if($cgroup->manager_id != $req->user()->id){
      return redirect()->back()->withInput()->with(['alert' => 'Only owner is allowed to edit the group', 'a_type' => 'danger']);
    }

    if($cgroup){
      $cgroup->group_name = $req->group_name;
      $cgroup->planner_id = $req->planner_id;
      $cgroup->save();
      return redirect(route('shift.group.view', ['id' => $req->id], false))->with(['alert' => 'Shift Group updated', 'a_type' => 'success']);
    } else {
      return redirect(route('shift.group', [], false))->with(['alert' => 'Group not found', 'a_type' => 'warning']);
    }
  }

  public function delGroup(Request $req){
    $cgroup = ShiftGroup::find($req->id);
    $gname = $cgroup->group_code;

    if($cgroup->manager_id != $req->user()->id){
      return redirect()->back()->withInput()->with(['alert' => 'Only owner is allowed to edit the group', 'a_type' => 'danger']);
    }

    if($cgroup){
      // remove all member of this group first
      ShiftGroupMember::where('shift_group_id', $cgroup->id)->delete();

      // then only delete this group
      $cgroup->delete();

      return redirect(route('shift.group', [], false))->with(['alert' => 'Shift Group ' . $gname . ' deleted', 'a_type' => 'warning']);
    } else {
      return redirect(route('shift.group', [], false))->with(['alert' => 'Group not found', 'a_type' => 'warning']);
    }
  }

}
