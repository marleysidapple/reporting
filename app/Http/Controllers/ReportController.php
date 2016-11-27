<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveReportRequest;
use App\Repositories\ReportRepository;
use App\Repositories\UserRepository;
use PDF;

class ReportController extends Controller
{

    protected $reports;
    protected $users;

    public function __construct(ReportRepository $reports, UserRepository $users)
    {
        $this->reports = $reports;
        $this->users   = $users;
    }

    public function listAll()
    {
        $report = $this->reports->allReport();
        return view('modules.report.list', compact('report'));
    }

    /*
     * adding new report
     * render form
     */
    public function addReport()
    {
        $patient = $this->users->patients();
        return view('modules.report.add', compact('patient'));
    }

    /*
     * saving report to database
     * save datas
     */
    public function saveReport(SaveReportRequest $request)
    {
        $mrn  = date('his') . 'RPT';
        $data = array(
            'patient_id'        => $request->patient,
            'mrn'               => $mrn,
            'clinical_history'  => $request->clinical_history,
            'specimen'          => $request->specimen,
            'diagnosis'         => $request->diagnosis,
            'gross_description' => $request->gross_description,
        );

        try {
            $report = $this->reports->saveReport($data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Report couldnot be added at this moment');
        }
        return redirect()->back()->with('success', 'Report addded successfully');
    }

    /*
     * displaying report details
     * render view
     */
    public function viewReport($id)
    {
        $report = $this->reports->reportDetail($id);
        return view('modules.report.detail', compact('report'));
    }

    /*
     * editing report
     * render form
     */
    public function editReport($id)
    {
        $patient = $this->users->patients();
        $report  = $this->reports->reportDetail($id);
        return view('modules.report.edit', compact('report', 'patient'));
    }

    /*
     * updating the report
     * save to database
     */
    public function updateReport(SaveReportRequest $request, $id)
    {
        $data = array(
            'patient_id'        => $request->patient,
            'clinical_history'  => $request->clinical_history,
            'specimen'          => $request->specimen,
            'diagnosis'         => $request->diagnosis,
            'gross_description' => $request->gross_description,
        );
        try {
            $updateReport = $this->reports->updateReport($id, $data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Report couldnot be updated at this moment');
        }
        return redirect()->back()->with('success', 'Report updated successfully');
    }

    /*
     * download the pdf
     * serve pdf file
     */
    public function downloadPdf($id)
    {	
    	$report = $this->reports->reportDetail($id);
        $pdf = PDF::loadView('modules.report.pdf', compact('report'));
        return $pdf->download('report.pdf');

    }
}
