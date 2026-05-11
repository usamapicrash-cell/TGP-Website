<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceSetting;
use App\Models\Service;
class ServiceController extends Controller
{
    public function index()
    {
        $serviceSetting = ServiceSetting::first();
        $services = Service::orderBy('order', 'asc')->get();
        return view('service', compact('serviceSetting', 'services'));
    }
}
