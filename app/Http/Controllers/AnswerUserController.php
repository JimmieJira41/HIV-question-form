<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnswerUser;
use Illuminate\Support\Carbon;
use Phattarachai\LineNotify\Facade\Line;

class AnswerUserController extends Controller
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
        $DataUser = new AnswerUser();

        $DataUser->name = $request->datasUser['name'];
        $DataUser->tel = $request->datasUser['tel'];
        $DataUser->point = $request->datasUser['point'];
        $DataUser->submit_at = Carbon::now();
        $DataUser->answer1 = $request->datasUser['answer1'];
        $DataUser->answer2 = $request->datasUser['answer2'];
        $DataUser->answer3 = $request->datasUser['answer3'];
        $DataUser->answer4 = $request->datasUser['answer4'];
        $DataUser->answer5 = $request->datasUser['answer5'];
        $DataUser->answer6 = $request->datasUser['answer6'];
        $DataUser->answer7 = $request->datasUser['answer7'];
        $DataUser->answer8 = $request->datasUser['answer8'];
        $DataUser->answer9 = $request->datasUser['answer9'];
        $DataUser->answer10 = $request->datasUser['answer10'];
        $DataUser->answer11 = $request->datasUser['answer11'];
        $DataUser->answer12 = $request->datasUser['answer12'];
        $DataUser->answer13 = $request->datasUser['answer13'];
       
        if($DataUser->save()){
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            date_default_timezone_set("Asia/Bangkok");

            $sToken = "QOeFO6829utICVIxUF699bYSMAZLthL1fuOA7XfJcXh";
            $sMessage = 
            "\nมีรายการส่งคำตอบแบบสอบถาม\n"
            ."ผู้ใช้งาน: ".$DataUser->name."\n"
            ."เบอร์โทรศัพท์: ".$DataUser->tel."\n"
            ."ผลคะแนนความเสี่ยง: ".$DataUser->point."\n"
            ."ส่งคำตอบเมื่อ: ".$DataUser->submit_at 
            ;

            
            $chOne = curl_init(); 
            curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
            curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
            curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
            curl_setopt( $chOne, CURLOPT_POST, 1); 
            curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
            $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
            curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
            curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
            $result = curl_exec( $chOne ); 

            //Result error 
            if(curl_error($chOne)) 
            { 
                echo 'error:' . curl_error($chOne); 
            } 
            else { 
                $result_ = json_decode($result, true); 
                echo "status : ".$result_['status']; echo "message : ". $result_['message'];
            } 
            curl_close( $chOne );
            }

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
