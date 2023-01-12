<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;

class EnrollmentApprovalController extends Controller
{
    public function update(Enrollment $enrollment)
    {
        if($enrollment->approved_at) {
            $enrollment->approved_at = null;
        } else {
            $enrollment->approved_at = now();    
        }

        $enrollment->save();

        return redirect()
            ->route('enrollments.index', [
                'course' => $enrollment->course,
            ]);
    }
}
