<?php

namespace App\Http\Controllers;

use App\Events\EnrollmentEvent;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentApprovalController extends Controller
{
    public function update(Request $request, Enrollment $enrollment)
    {
        $this->authorize('enrollments.approval.update', $enrollment);

        $data = $request->validate([
            'approval' => ['required', 'in:Aprobado,Reprobado'],
        ]);

        $enrollment->update($data);

        event(new EnrollmentEvent($enrollment));

        return redirect()
            ->route('enrollments.index', [
                'course' => $enrollment->course,
            ])
            ->with('alert', trans('alerts.approval.updated'));
    }
}
