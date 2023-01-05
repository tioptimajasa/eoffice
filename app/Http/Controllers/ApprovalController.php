<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Approval;
use App\Models\HistoryApproval;
use App\Models\SequenceApproval;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class ApprovalController extends Controller
{
    public static function GenerateApproval($approval){
        $created_by = Auth::user()->id;
        $approval_id = Str::uuid();
        $user = User::where('struktur_id','12')->pluck('id')->first();
        Approval::create([
            'id'=>$approval_id,
            'struktur_id' =>$approval[0] ,
            'user_id' => $user,
            'status' => 'OPEN'
        ]);
        $struktur = User::where('id',$created_by)->pluck('struktur_id')->first();
        HistoryApproval::create([
            'approval_id' =>$approval_id,
            'struktur_id' => $struktur,
            'user_id' => $created_by,
            'status' => 'Create',
            'keterangan'=>'',
        ]);
        $urutan = 1;
        foreach ($approval as $key => $value) {
            SequenceApproval::create([
                'approval_id' =>$approval_id ,
                'struktur_id' =>$value ,
                'user_id' => $user,
                'urutan' => $urutan,
            ]);
            $urutan++;
    
        }

        return $approval_id;
    }
}
