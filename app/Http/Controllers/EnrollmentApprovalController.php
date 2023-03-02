<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentApprovalController extends Controller
{
    // GATE
    public function update(Request $request, Enrollment $enrollment)
    {
        $data = $request->validate([
            'approval' => ['required', 'in:Aprobado,Reprobado'],
        ]);

        $enrollment->update($data);

        return redirect()
            ->route('enrollments.index', [
                'course' => $enrollment->course,
            ])
            ->with('alert', trans('alerts.approval.updated'));
    }
}
