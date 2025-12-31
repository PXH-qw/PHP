<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(9); // 每页显示9个课程，适应3列布局
        return view('courses.index_reservation', compact('courses'));
    }

    // 课程管理列表
    public function courseList()
    {
        $courses = Course::paginate(9); // 每页显示9个课程，适应3列布局
        return view('courses.list', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'instructor' => 'required|string|max:255',
            'schedule' => 'required|date',
            'max_participants' => 'required|integer|min:1',
        ]);

        Course::create($validated);

        return redirect()->route('courses.list')->with('success', '课程创建成功');
    }

    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'instructor' => 'required|string|max:255',
            'schedule' => 'required|date',
            'max_participants' => 'required|integer|min:1',
        ]);

        $course->update($validated);

        return redirect()->route('courses.list')->with('success', '课程更新成功');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.list')->with('success', '课程删除成功');
    }
    
    // 预约课程
    public function reserve(Course $course)
    {
        // 检查课程是否已满
        if ($course->current_participants >= $course->max_participants) {
            return redirect()->back()->with('error', '该课程人数已满，无法预约');
        }

        // 检查用户是否已预约该课程
        $existingReservation = Reservation::where('user_id', Auth::id())
            ->where('course_id', $course->id)
            ->first();

        if ($existingReservation) {
            return redirect()->back()->with('error', '您已预约该课程');
        }

        // 创建预约
        Reservation::create([
            'user_id' => Auth::id(),
            'course_id' => $course->id,
            'reservation_date' => now(),
            'status' => 'confirmed',
        ]);

        // 更新课程当前参与人数
        $course->increment('current_participants');

        return redirect()->back()->with('success', '课程预约成功');
    }
    
    // 取消预约
    public function cancelReservation(Course $course)
    {
        $reservation = Reservation::where('user_id', Auth::id())
            ->where('course_id', $course->id)
            ->first();

        if (!$reservation) {
            return redirect()->back()->with('error', '您未预约该课程');
        }

        // 删除预约
        $reservation->delete();
        
        // 更新课程当前参与人数
        $course->decrement('current_participants');

        return redirect()->back()->with('success', '课程预约已取消');
    }
    
    // 获取我的预约课程
    public function myReservations()
    {
        $user = Auth::user();
        
        // 获取当前用户的预约记录，包括课程信息
        $reservations = Reservation::with('course')
            ->where('user_id', $user->id)
            ->paginate(10);
            
        return view('courses.my_reservations', compact('reservations'));
    }
}