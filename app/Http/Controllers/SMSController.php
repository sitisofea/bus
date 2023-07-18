<?php

namespace App\Http\Controllers;

// use App\Models\SMS;
use App\SMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreSMSRequest;
use App\Http\Requests\UpdateSMSRequest;

class SMSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sms = DB::table('sms')
            ->orderBy('date', 'asc')
            ->get();
        return view('sms.index')->with('SMS', $sms);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'content' => 'required',
            'date' => 'required',
            'time' => 'required',
            'status' => 'required'
        ]);

        SMS::create([
            'title'=>$request->title,
            'content' => $request->content,
            'date' => $request->date,
            'time' => $request->time,
            'status' => $request->status,
        ]);

        return redirect('sms')->with('message', 'SMS created sucessfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $sms = SMS::find($id);
        return view('sms.show', compact('sms'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sms = SMS::find($id);
        return view('sms.edit')->with('sms', $sms);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $sms = SMS::find($id);
        $sms->update($request->all());
        return redirect('sms')->with('flash_message', 'SMS updated sucessfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        SMS::destroy($id);
        return redirect('sms')->with('flash_message', 'SMS deleted!');
    }
}
