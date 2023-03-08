<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;

class EnrollmentConfirmationController extends Controller
{
    public function update(Enrollment $enrollment)
    {
        $enrollment->update([
            'confirmed_at' => now(),
        ]);
        
        return redirect()
            ->route('enrollments.index', [
                'course' => $enrollment->course
            ]);
    }
}
