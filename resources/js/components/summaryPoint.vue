<template>
    <div class="container-fluid px-0">
         <div class="title-summary-form col-12 card mb-4">
             <div class="card-body container">
                <h1 class="header-summary display-5 text-center">สรุปคะแนนความเสี่ยงจากแบบประเมินความเสี่ยงด้วยตัวเอง <br>(ระยะเวลา 3 เดือนที่ผ่านมา)</h1>
             </div>
        </div>   
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="block-summary card shadow">
                        <!-- <div class="card-header">

                        </div> -->
                        <div class="card-body">
                            <h2 class="text-center">คะแนนความเสี่ยงของคุณ</h2>
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="circle-point d-flex justify-content-center align-items-center">
                                    <h1 class="display-1">100</h1>
                                </div>
                            </div>
                            <div class="block-description text-center p-3 my-4 shadow">
                                <p>คุณอยู่ในเกณฑ์ที่มี ความเสี่ยงสูง </p>
                            </div>
                            <hr>
                        </div>
                        <div class="submit-anwser text-center mb-4">
                            <a class="btn btn-primary w-75 d-block mx-auto btn-submit-anwser" href="https://www.google.com" target="_blank">เข้ารับคิวเจาะตรวจเลือด</a>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</template>

<script>
export default {
    data: function(){
        condition: [
            {
                min:4,
                max:9,
                description:"เสี่ยงน้อย"
            },
            {
                min:10,
                max:16,
                description:"เสี่ยงค่อนข้างน้อย"
            },
            {
                min:17,
                max:23,
                description:"เสี่ยงปานตรง"
            },
            {
                min:24,
                max:30,
                description:"เสี่ยงค่อนข้างสูง"
            },
            {
                min:31,
                max:36,
                description:"เสี่ยงสูง"
            }
        ]
    }
    

}
</script>
<style>
.title-summary-form{
    background-color: #328679;
    color: white;
}
.circle-point{
    color:white;
    background-color: #BF4448;
    border: 2px solid black;    
    border-radius: 50%;
    width: 250px;
    height: 250px;
    }
.block-description{
    background-color: white;
    border-radius: 5px;
    font-size: 130%;
    height: 200px;
}
.title-description{
    position: relative;
    border: 1px solid black;
    border-radius: 15%;
    width: 250px;
    height: 250px;
    top:45px;
    left: 45px;
}
.block-summary{
    background-color: #FFE0BD;
} 
</style>