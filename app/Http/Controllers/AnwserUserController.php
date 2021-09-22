<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnwserUser;
use Illuminate\Support\Carbon;

class AnwserUserController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $DataUser = new AnwserUser();

        $DataUser->name = $request->anwserUsers['name'];
        $DataUser->tel = $request->anwserUsers['tel'];
        $DataUser->point = $request->anwserUsers['point'];
        $DataUser->submit_at = Carbon::now();
        $DataUser->anwser1 = $request->anwserUsers['anwser1'];
        $DataUser->anwser2 = $request->anwserUsers['anwser2'];
        $DataUser->anwser3 = $request->anwserUsers['anwser3'];
        $DataUser->anwser4 = $request->anwserUsers['anwser4'];
        $DataUser->anwser5 = $request->anwserUsers['anwser5'];
        $DataUser->anwser6 = $request->anwserUsers['anwser6'];
        $DataUser->anwser7 = $request->anwserUsers['anwser7'];
        $DataUser->anwser8 = $request->anwserUsers['anwser8'];
        $DataUser->anwser9 = $request->anwserUsers['anwser9'];
        $DataUser->anwser10 = $request->anwserUsers['anwser10'];
        $DataUser->anwser11 = $request->anwserUsers['anwser11'];
        $DataUser->anwser12 = $request->anwserUsers['anwser12'];
        $DataUser->anwser13 = $request->anwserUsers['anwser13'];

        $DataUser->save();

        return $DataUser;

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
