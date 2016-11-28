<?php

namespace App\Repositories;

use App\User;
use App\Report;

class ReportRepository
{
    /*
    * get all reports
    */
    public function allReport()
    {
    	return Report::all();
    }


    /*
    * save report
    */
    public function saveReport($data)
    {
    	return Report::create($data);
    }

    /*
    * detail of report
    */
    public function reportDetail($id)
    {
    	return Report::find($id);
    }


    /*
    * updating report
    *
    */
    public function updateReport($id, $data)
    {
    	return Report::where('id', $id)->update($data);
    }


    /*
    * get selected report
    *
    */
    public function selectedReport($id)
    {
        return Report::where('patient_id', $id)->get();
    }


    /*
    * deleting report
    *
    */
    public function deleteReport($id)
    {
        return Report::find($id)->delete();
    }
}
