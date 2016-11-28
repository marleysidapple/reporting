<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditPatientRequest;
use App\Http\Requests\OperatorRequest;
use App\Http\Requests\PatientRequest;
use App\Http\Requests\UpdateOperatorRequest;
use App\Repositories\UserRepository;
use App\Role;
use App\User;
use Auth;
use Mail;

class OperatorController extends Controller
{

    protected $users;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
        $this->middleware('role:Operator', ['except' => ['home', 'logout']]);
    }

    public function home()
    {
        return view('modules.operator.home');
    }

    /*
     * listing all patient
     * render view
     */
    public function listPatient()
    {
        $patient = $this->users->patients();
        return view('modules.patient.list', compact('patient'));
    }

    /*
     * adding new patient
     * render form
     */
    public function addPatient()
    {
        return view('modules.patient.add');
    }

    /*
     * saving patient
     * post save to database
     */
    public function savePatient(PatientRequest $request)
    {
        $data = array(
            'name'     => $request->name,
            'email'    => $request->email,
            'address'  => $request->address,
            'phone'    => $request->phone,
            'gender'   => $request->gender,
            'age'      => $request->age,
            'password' => \bcrypt($request->password),
        );

        try {
            $user = $this->users->savePatients($data);
            //assign patient role to user
            $patient = Role::where('name', 'patient')->first();
            $user->attachRole($patient);
            $this->notifyPatient($request);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Patient couldnot be added at this moment');
        }
        return redirect()->back()->with('success', 'Patient added successfully and notification has been sent to patient in respective email');

    }

    /*
     * send a notification email to the user regarding the user creating in the system
     *
     */
    protected function notifyPatient($request)
    {
        $data = array('password' => $request->password, 'email' => $request->email, 'name' => $request->name);

        Mail::send('email.notify', $data, function ($message) use ($request) {
            $message->to($request->email)->subject('Patient Created');
        });
    }




    /*
    * get the patient detail
    * render view
    */
    public function viewPatient($id)
    {
        $patient = $this->users->findPatient($id);
        return view('modules.patient.detail', compact('patient'));
    }



    /*
     * editing patient
     * render form
     */
    public function editPatient($id)
    {
        $patient = $this->users->findPatient($id);
        return view('modules.patient.edit', compact('patient'));
    }

    /*
     * updating patient
     * save to database
     *
     */
    public function updatePatient(EditPatientRequest $request, $id)
    {

        $data = array(
            'name'    => $request->name,
            'email'   => $request->email,
            'address' => $request->address,
            'phone'   => $request->phone,
            'gender'  => $request->gender,
            'age'     => $request->age,
        );

        if ($request->password != "") {
            $data['password'] = \bcrypt($request->password);
        }

        try {
            $user = $this->users->updatePatients($id, $data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Patient couldnot be updated at this moment');
        }
        return redirect()->back()->with('success', 'Patient updated successfully');

    }



    /*
    * deleting patient
    * destroy from db
    */
    public function deletePatient($id)
    {
        $user = $this->users->deletePatient($id);
        return redirect()->to('patient/list')->with('success', 'Patient deleted successfully');
    }


    /*
     * list all operator
     * render view
     */
    public function listOperator()
    {
        $operator = $this->users->operators();
        return view('modules.operator.list', compact('operator'));
    }

    /*
     * adding operator
     * render view
     */
    public function addOperator()
    {
        return view('modules.operator.add');
    }

    /*
     * save operator
     * save to db
     */
    public function saveOperator(OperatorRequest $request)
    {
        $data = array(
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => \bcrypt($request->password),
        );

        try {
            $operator = $this->users->saveOperator($data);
            //assign patient role to user
            $op = Role::where('name', 'operator')->first();
            $operator->attachRole($op);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Operator couldnot be added at this moment');
        }
        return redirect()->back()->with('success', 'Operator added successfully');

    }

    /*
     * editing operator
     * render view
     */
    public function editOperator($id)
    {
        $operator = $this->users->findOperator($id);
        return view('modules.operator.edit', compact('operator'));
    }

    /*
     * updating operator
     * save to db
     */
    public function updateOperator(UpdateOperatorRequest $request, $id)
    {

        $data = array(
            'name'  => $request->name,
            'email' => $request->email,
        );

        if ($request->password != "") {
            $data['password'] = \bcrypt($request->password);
        }

        try {
            $updateOp = $this->users->updateOperator($id, $data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Operator couldnot be updated at this moment');
        }
        return redirect()->back()->with('success', 'Operator updated successfully');

    }

    /*
     * displaying operator details
     * render view
     */
    public function viewOperator($id)
    {
        $operator = $this->users->findOperator($id);
        return view('modules.operator.detail', compact('operator'));
    }



    /*
    * logout function
    *
    */
    public function logout()
    {
        Auth::logout();
        return redirect()->to('/');
    }
}
