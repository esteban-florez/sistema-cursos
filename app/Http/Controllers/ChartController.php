<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Payment;
use App\Models\User;

class ChartController extends Controller
{
    // IMPROVE -> puros ciclos nesteados, esta vaina es O(n2) xDDD
    public function paymentsPerType()
    {
        $payments = Payment::all();

        $data = payTypes()->mapWithKeys(function ($type) use ($payments) {
            $count = $this->countByProperty($payments, 'type', $type);
            return [$type => $count];
        });

        return $data;
    }

    public function paymentsPerStatus()
    {
        $unfulfilled = Payment::unfulfilled()->count();
        $payments = Payment::all();
        $total = $unfulfilled + $payments->count();

        $data = payStatuses()->mapWithKeys(
            function ($status) use ($payments, $total) {
                $count = $this->countByProperty($payments, 'status', $status);
                $percentage = ($count / $total) * 100;
                return [$status => $percentage];
            }
        );

        $data['Por realizar'] = ($unfulfilled / $total) * 100;

        return $data;
    }

    public function studentsPerGrade()
    {
        $students = User::students()->get();

        $data = grades()->mapWithKeys(function ($grade) use ($students) {
            $count = $this->countByProperty($students, 'grade', $grade);
            return [$grade => $count];
        });
        
        return $data;
    }

    public function paymentsPerCategory()
    {
        $payments = Payment::withoutGlobalScope('fulfilled')->get();
        $total = $payments->count();

        $data = payCategories()->mapWithKeys(
            function ($category) use ($payments, $total) {
                $count = $this->countByProperty($payments, 'category', $category);
                $percentage = ($count / $total) * 100;
                return [$category => $percentage];
            }
        );

        return $data;
    }

    public function coursesPerPhase()
    {
        $courses = Course::all();

        $data = phases()->mapWithKeys(function ($phase) use ($courses) {
            $count = $this->countByProperty($courses, 'phase', $phase);
            return [$phase => $count];
        });
        
        return $data;
    }

    public function enrollmentsPerStatus()
    {
        $enrollments = Enrollment::all();
        $total = $enrollments->count();

        $data = approvalStatuses()->mapWithKeys(
            function ($status) use ($enrollments, $total) {
                $count = $this->countByProperty($enrollments, 'approval', $status);
                $percentage = ($count / $total) * 100;
                return [$status => $percentage];
            }
        );

        return $data;
    }

    private function countByProperty($models, $property, $value)
    {
        return $models->reject(function ($model) use ($value, $property) {
            return $model->{$property} !== $value;
        })->count();
    }
}
