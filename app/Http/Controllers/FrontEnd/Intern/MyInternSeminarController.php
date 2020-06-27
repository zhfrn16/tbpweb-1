<?php

namespace App\Http\Controllers\Frontend\Intern;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Internship;
use App\Models\InternshipAudience;
use App\Models\Proposal;
use App\Models\Student;
use App\Models\StudentSemester;
use App\Models\Semester;
use App\Models\Classroom;
use App\Models\ClassLecturer;
use App\Models\Lecturer;
use App\Models\Room;
use Validator;


class MyInternSeminarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create(request $id)
    {

        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        
        $internships = Internship::all()->pluck('name', 'id');  
        $rooms = Room::all();
        $data = Internship::where('student_id',$user_id)->get();
        $datas=$data->first();
        $kpid=$datas->id;

        return view('klp02.createSeminar',compact('kpid','rooms','data', 'datas'));  

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $internships = Internship::where('student_id',auth()->user()->id)->first();
        $this->validate($request, Internship::$validation_rules);
        // Laporan
        if($request->hasFile('file_report')){
            $folder = 'file_report';
            $namamhs=$internships->student->name;
            $filename1 = $internships->id . '_'. $namamhs . '.' . $request->file('file_report')->getClientOriginalExtension();
            $filepath = $request->file_report->storeAs($folder,$filename1);
            $update= Internship::where('id',$internships->id)->update([
                'file_report' => $filename1
                ]);
            notify('success', 'File Laporan Successfully Uploaded');
        }
        // Logbook
        if($request->hasFile('file_logbook')){
            $folder = 'file_logbook';
            $namamhs=$internships->student->name;
            $filename2 = $internships->id . '_'. $namamhs .'_'.$folder. '.' . $request->file('file_logbook')->getClientOriginalExtension();
            $filepath = $request->file_logbook->storeAs($folder,$filename2);
            $update= Internship::where('id',$internships->id)->update([
                'file_logbook' => $filename2
                ]);
            notify('success', 'File Logbook Successfully Uploaded');
        }
        //Penilaian Lapangan
        if($request->hasFile('file_field_grade')){
            $folder = 'file_field_grade';
            $namamhs=$internships->student->name;
            $filename3 = $internships->id . '_'. $namamhs .'_'.$folder. '.' . $request->file('file_field_grade')->getClientOriginalExtension();
            $filepath = $request->file_field_grade->storeAs($folder,$filename3);
            $update= Internship::where('id',$internships->id)->update([
                'file_field_grade' => $filename3
                ]);
            notify('success', 'File field grade Successfully Uploaded');
        }
        //Pengajuan Laporan
        if($request->hasFile('file_report_receipt')){
            $folder = 'file_report_receipt';
            $namamhs=$internships->student->name;
            $filename4 = $internships->id . '_'. $namamhs .'_'.$folder. '.' . $request->file('file_report_receipt')->getClientOriginalExtension();
            $filepath = $request->file_report_receipt->storeAs($folder,$filename4);
            $update= Internship::where('id',$internships->id)->update([
                'file_report_receipt' => $filename4
                ]);
            notify('success', 'File Report Receipt Successfully Uploaded');
        }

        $update= Internship::where('id',$internships->id)->update([
            'title' => $request->title,
            'seminar_date' => $request->seminar_date,
            'seminar_time' => $request->seminar_time,
            'seminar_room_id' => $request->seminar_room_id,
            'grade' => $request->grade,
            ]);

        if($update)
        {
            notify('success', 'Berhasil Tambah data seminar');
        }else{
            notify('error', 'Gagal Tambah data seminar');
        }

        return redirect('myinterns');


    }

    /**
     * Display the specified resource.
     * Test
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $kpid=$id;
        $mhs= Student::where('id', $user_id)->get()->first();
        $data = Internship::where('id', $id)->get()->first();
        $dosbing = DB::table('students')
        ->join('student_semesters', 'students.id',
        '=', 'student_semesters.student_id')
        ->join('semesters', 'student_semesters.semester_id', '=',
        'semesters.id')
        ->join('classrooms', 'classrooms.semester_id', '=',
        'semesters.id')
        ->join('class_lecturers', 'classrooms.id', '=',
        'class_lecturers.classroom_id')
        ->join('lecturers', 'lecturers.id', '=',
        'class_lecturers.lecturer_id')
        ->where('student_id', $user_id)
        ->get();
    
       return view('klp02.showSeminarDetail',compact('data','kpid','dosbing','mhs'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $kpid=$id;


        $rooms = Room::all()->pluck('name','id');
        $data = Internship::where('id',$id)->get();

        
        return view('klp02.edit', compact('rooms','kpid','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $internships = Internship::where('student_id',auth()->user()->id)->first();
        $this->validate($request, Internship::$validation_rules);
        $updating=0;
        // Laporan
        if($request->hasFile('file_report')){
            $folder = 'file_report';
            $namamhs=$internships->student->name;
            $filename1 = $internships->id . '_'. $namamhs . '.' . $request->file('file_report')->getClientOriginalExtension();
            $filepath = $request->file_report->storeAs($folder,$filename1);
            $updating= Internship::where('id',$internships->id)->update([
                'file_report' => $filename1
                ]);
            notify('success', 'File Laporan Successfully Uploaded');
        }
        // Logbook
        if($request->hasFile('file_logbook')){
            $folder = 'file_logbook';
            $namamhs=$internships->student->name;
            $filename2 = $internships->id . '_'. $namamhs .'_'.$folder. '.' . $request->file('file_logbook')->getClientOriginalExtension();
            $filepath = $request->file_logbook->storeAs($folder,$filename2);
            $updating= Internship::where('id',$internships->id)->update([
                'file_logbook' => $filename2
                ]);
            notify('success', 'File Logbook Successfully Uploaded');
        }
        //Penilaian Lapangan
        if($request->hasFile('file_field_grade')){
            $folder = 'file_field_grade';
            $namamhs=$internships->student->name;
            $filename3 = $internships->id . '_'. $namamhs .'_'.$folder. '.' . $request->file('file_field_grade')->getClientOriginalExtension();
            $filepath = $request->file_field_grade->storeAs($folder,$filename3);
            $updating= Internship::where('id',$internships->id)->update([
                'file_field_grade' => $filename3
                ]);
            notify('success', 'File field grade Successfully Uploaded');
        }
        //Pengajuan Laporan
        if($request->hasFile('file_report_receipt')){
            $folder = 'file_report_receipt';
            $namamhs=$internships->student->name;
            $filename4 = $internships->id . '_'. $namamhs .'_'.$folder. '.' . $request->file('file_report_receipt')->getClientOriginalExtension();
            $filepath = $request->file_report_receipt->storeAs($folder,$filename4);
            $updating= Internship::where('id',$internships->id)->update([
                'file_report_receipt' => $filename4
                ]);
            notify('success', 'File Report Receipt Successfully Uploaded');
        }

        $update= Internship::where('id',$internships->id)->update([
            'title' => $request->title,
            'seminar_date' => $request->seminar_date,
            'seminar_time' => $request->seminar_time,
            'seminar_room_id' => $request->seminar_room_id,
            'grade' => $request->grade,
            ]);

            if($update || $updating)
            {
                notify('success', 'Berhasil mengedit data seminar ');
            }else{
                notify('error', 'gagal edit  perubahan ');
            }
        
        return redirect()->route('frontend.myintern-seminars.show', [$id]);
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
