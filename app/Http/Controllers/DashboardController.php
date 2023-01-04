<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Approval;
use App\Models\Nodin;
class DashboardController extends Controller
{
    public function index()
    {
        
        $approval_current_nodin = Approval::where(['status'=>'OPEN','user_id'=>Auth::user()->id])->count();
        $approval_current_memo =0;
        $approval_current_surat =0;
        
        $list_draft_nodin = Nodin::where(['created_by'=>Auth::user()->id,'status'=>0])->count();
        $list_draft_surat =0;
        $list_draft_memo =0;

        $list_onapproval_nodin = Nodin::where(['created_by'=>Auth::user()->id,'status'=>1])->count();
        $list_onapproval_surat =0;
        $list_onapproval_memo =0;

        $list_approved_nodin = Nodin::where(['created_by'=>Auth::user()->id,'status'=>2])->count();
        $list_approved_surat =0;
        $list_approved_memo =0;

        $list_reject_nodin = Nodin::where(['created_by'=>Auth::user()->id,'status'=>3])->count();
        $list_reject_surat =0;
        $list_reject_memo =0;

        $list_all_nodin = Nodin::where(['created_by'=>Auth::user()->id])->count();
        $list_all_surat =0;
        $list_all_memo =0;

        $approval_current = $approval_current_nodin + $approval_current_memo + $approval_current_nodin;
        $list_draft = $list_draft_nodin + $list_draft_memo + $list_draft_surat;
        $list_onapproval = $list_onapproval_nodin + $list_onapproval_surat + $list_onapproval_memo;
        $list_approved = $list_approved_nodin + $list_approved_surat + $list_approved_memo;
        $list_reject = $list_reject_nodin + $list_reject_surat + $list_reject_memo;
        $list_all = $list_all_nodin + $list_all_surat + $list_all_memo;
        return view('dashboard', [
            'approval_current' => $approval_current_nodin,
            'list_draft'=> $list_draft,
            'list_onapproval'=>$list_onapproval,
            'list_approved'=>$list_approved,
            'list_reject'=>$list_reject,
            'list_all'=>$list_all,
        ]);
    }
}
