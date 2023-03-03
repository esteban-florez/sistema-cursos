<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentApprovalController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:Administrador,Instructor');
        // GATE
    }
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
