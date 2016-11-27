<?php

use App\Permission;
use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $operator               = new Role();
        $operator->name         = 'Operator';
        $operator->display_name = 'operator';
        $operator->description  = 'Main user of the system. handle Patient crud and report crud';
        $operator->save();

        $patient               = new Role();
        $patient->name         = 'Patient';
        $patient->display_name = 'patient';
        $patient->description  = 'read and export their reports';
        $patient->save();

        $listOp               = new Permission();
        $listOp->name         = 'list-operator';
        $listOp->display_name = 'List Operators'; // optional
        $listOp->save();

        $addOp               = new Permission();
        $addOp->name         = 'add-operator';
        $addOp->display_name = 'Add Operators'; // optional
        $addOp->save();

        $delOp               = new Permission();
        $delOp->name         = 'delete-operator';
        $delOp->display_name = 'Delete Operators'; // optional
        $delOp->save();

        $listP               = new Permission();
        $listP->name         = 'list-patient';
        $listP->display_name = 'List Patient'; // optional
        $listP->save();

        $addP               = new Permission();
        $addP->name         = 'add-patient';
        $addP->display_name = 'Add Patient'; // optional
        $addP->save();

        $editP               = new Permission();
        $editP->name         = 'edit-patient';
        $editP->display_name = 'Edit Patient'; // optional
        $editP->save();

        $delP               = new Permission();
        $delP->name         = 'delete-patient';
        $delP->display_name = 'Delete Patient'; // optional
        $delP->save();

        $listRpt               = new Permission();
        $listRpt->name         = 'list-report';
        $listRpt->display_name = 'List Report'; // optional
        $listRpt->save();

        $viewRpt               = new Permission();
        $viewRpt->name         = 'view-report';
        $viewRpt->display_name = 'View Report'; // optional
        $viewRpt->save();

        $addRpt               = new Permission();
        $addRpt->name         = 'add-report';
        $addRpt->display_name = 'Add Report'; // optional
        $addRpt->save();

        $editRpt               = new Permission();
        $editRpt->name         = 'edit-report';
        $editRpt->display_name = 'Edit Report'; // optional
        $editRpt->save();

        $delRpt               = new Permission();
        $delRpt->name         = 'delete-report';
        $delRpt->display_name = 'Delete Report'; // optional
        $delRpt->save();

        $mailRpt               = new Permission();
        $mailRpt->name         = 'mail-report';
        $mailRpt->display_name = 'Mail Report'; // optional
        $mailRpt->save();

        $operator->attachPermissions(array($listOp, $addOp, $delOp, $listP, $addP, $editP, $delP, $listRpt, $viewRpt, $addRpt, $editRpt, $delRpt, $mailRpt));
        $patient->attachPermissions(array($listRpt, $viewRpt, $mailRpt));

    }
}
