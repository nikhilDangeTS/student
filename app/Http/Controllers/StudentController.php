<?php

namespace App\Http\Controllers;

use View;
use App\Student;
use Illuminate\Http\Request;
use DB;
use Auth;
use Log;
use App\Events\SomeEvent;

class StudentController extends Controller
{
    private $_StudentManagement;

    function __construct()
    {
      $this->setStudentManagement();
    }

    public function setStudentManagement()
    {
      $local = new Student();
      $this->_StudentManagement = $local; 
    }


    /*public function test()
     {
        echo "Hi"."\n";
        exit;
     }*/

    public function viewroot()
    {
        //$list = Student::all();
        return view('/student/dashboard');
    }

    public function view()
    {
        /*if(Auth::check())
        {
            return view('student.create');
        }
        else
        {
            return view('login');
        }*/
        return view('student.create');
    }

    public function viewtest()
    {
        return view('test');
    }

    public function viewRegistration()
    {
        return view('/student/dashboard');
    }

    public function viewLogin()
    {
        return view('login');
    }
    
    public function viewList()
    {
        //$storage = storage_path("mydebug.log");
        //file_put_contents($storage, ' ::::: An instance for HELPER CREATED :::: '.print_r(array('nikhil'=>'first_name'),true).PHP_EOL,FILE_APPEND);
        
        $tasks = DB::table('student')->orderBy('id', 'desc')->get();
        return view('student.view', compact('tasks'));
        //return response()->json($tasks);
        
    }

    public function create()
    {
        return view('student.create');
    }

    public function show($id)
    {
        $task = $this->_StudentManagement->getStudentDetailsAgainstId($id);
        //return view('student.details', compact('task'));
        return response()->json($task);
        
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,
            ['first_name' => 'required',
            'last_name' => 'required'
            ]);

        $first_name = $request->get('first_name');
        $last_name = $request->get('last_name');
        $id = $request->get('id');

        $updatedRecords = $this->_StudentManagement->UpdateStudentRecord($first_name, $last_name, $id);

        //return redirect('student/edit/'.$id)->with('success_msg', 'Details has been updated');
        return response()->json('Details has been updated');
        //return redirect('/view')->with('success_update', 'Details has been updated');
    }

    public function registerUsers(Request $request)
    {
        $this->validate($request,
                ['user_name' => 'required',
                'email_id'  => 'required',
                'user_password'  => 'required'
                ]);

        $user_name = $request->get('user_name');
        $email_id = $request->get('email_id');
        //$_token = $request->get('_token');
        $user_password = $request->get('user_password');
        $origin_password = $request->get('user_password');
        $user_password = bcrypt($user_password);

        $registerUser = $this->_StudentManagement->registerUser($user_name, $email_id, $user_password, $origin_password);
        return response()->json('Registered Successfully!');
        //return redirect('/registrations')->with('successs','Registered Successfully');
    }

    public function loginUsers(Request $request)
    {
        $this->validate($request,
            ['email_id'  => 'required',
            'user_password'  => 'required'
            ]);
            
        $request->get('email_id');
        $request->get('user_password');

        event(new SomeEvent($request->all()));

        if (Auth::attempt(['email' => $request->email_id,'password' => $request->user_password]))
        {
            return view('/student/dashboard');
        }
        else
        {
            Log::useFiles(storage_path().'/logs/login_log.log');
            $messsage = "Wrong Authentication Perform";
            Log::critical($messsage.PHP_EOL);

            return redirect('/login')->with('login_error','Email-ID OR Password wrong');
        }
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
            'first_name' => 'required',
            'last_name'  => 'required'
            ]);

        $first_name = $request->get('first_name');
        $last_name = $request->get('last_name');

        $addRecords = $this->_StudentManagement->insertStudent($first_name, $last_name);
        return response()->json('Successfully Data Added!');
        //return redirect('/view')->with('succes_add','Data Added');
    }

    public function updateView($id)
    {
        $task = Student::find($id);
        return response()->json($task);
        //return view('student.update', compact('task'));
    }

    public function destroy($id)
    {
        $deleteRecords = $this->_StudentManagement->DeleteStudentRecord($id);
        //Student::find($id)->delete();
        return response()->json('Successfully deleted!');
        //return redirect('/view')->withErrors('Successfully deleted!');
    }

    public function ajaxUpdate(Request $id)
    {
        $user_id = $id->id;
        $token = $id->_token;

        $task = $this->_StudentManagement->ajaxUpdateStudent($user_id);
        //Student::find($id)->delete();
        /*echo "<pre>";
        print_r($task->id);
        exit;*/
        return view('ajax.updateDetails', compact('task'));
    }

}
