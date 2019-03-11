<?php

namespace App;

use DB;
use Carbon\Carbon;
use App\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\StudentController;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	protected $table = 'student';

    protected $fillable = ['first_name', 'last_name'];

    public function GetStudentDetail()
    {
        $student = DB::select(" SELECT * FROM student ORDER BY id DESC ");
        return $student;
    }

    public function registerUser($user_name, $email_id, $user_password, $origin_password)
    {
        $registerDetail = DB::table('users')->insert(['name' => $user_name, 'email' => $email_id, 'password' => $user_password, 'origin_pass' => $origin_password,'created_at' => Carbon::now('Asia/Kolkata'), 'updated_at' => Carbon::now('Asia/Kolkata')]);
        return $registerDetail; 
    }

    public function insertStudent($first_name,$last_name)
    {
        $InsertRecords = DB::table('student')->insert(['first_name' =>$first_name,'last_name' =>$last_name,'created_at' => Carbon::now('Asia/Kolkata'),'updated_at' => Carbon::now('Asia/Kolkata')]);
        return $InsertRecords; 
    }  

    public function getStudentDetailsAgainstId($id)
    {
        $employees = DB::select(" SELECT * FROM student WHERE id =".$id." ");
        return $employees[0];
    }

    public function UpdateStudentRecord($first_name, $last_name, $id)
    {
        $updateData = DB::table('student')
                        ->where('id',$id)
                        ->update([ 
                            'updated_at'=>Carbon::now('Asia/Kolkata'),
                            'first_name'=>$first_name,
                            'last_name'=>$last_name,
                            ]);
        return $updateData;     
    }  

    public function DeleteStudentRecord($id)
    {
        $deleteData = DB::table('student')                        
                        ->where('id',$id)
                        ->delete();
        return $deleteData;     
    }

    public function ajaxUpdateStudent($user_id)
    {
        $employees = DB::select(" SELECT * FROM student WHERE id =".$user_id." ");
        return $employees[0];
    }
}
