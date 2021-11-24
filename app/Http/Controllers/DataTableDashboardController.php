<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\EmployeeDataTable;

class DataTableDashboardController extends Controller
{
    public function index(EmployeeDataTable $dataTable)
    {
        return $dataTable->render('admin.user.employee');
    }
}
