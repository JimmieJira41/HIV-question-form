<template>
    <div class="block-summary-point">
         <div class="title-summary-form col-12 card mb-4">
             <div class="card-body container">
                <h2 class="header-summary display-5 text-center">สรุปคะแนนความเสี่ยงจากแบบประเมินความเสี่ยงด้วยตัวเอง <br>(ระยะเวลา 3 เดือนที่ผ่านมา)</h2>
             </div>
        </div>   
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <div class="block-summary card col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 shadow">
                        <div class="card-header"><h2 class="text-center">คะแนนความเสี่ยงของคุณ</h2></div>
                        <div class="card-body">
                           
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="circle-point d-flex justify-content-center align-items-center">
                                    <h1 class="display-1">{{score}}</h1>
                                </div>
                            </div>
                            <div class="block-description text-center p-3 my-4 shadow">
                                <p>คุณอยู่ในเกณฑ์ที่มี ความ{{description}}<br><br>{{advice}}<br><br>สามารถเข้ารับคิวเจาะเลือดจากปุ่มด้านล่าง</p>
                            </div>
                            <hr>
                        </div>
                        <div class="submit-anwser text-center mb-4">
                            <a class="btn btn-primary w-75 d-block mx-auto btn-submit-anwser" href="https://www.google.com" target="_blank"><h2>เข้ารับคิวเจาะตรวจเลือด</h2></a>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</template>

<script>
export default {
    props:['point'],
    data: function(){
      return{
          data:{
                score: 0,
                description: "",
                advice: "",
                condition: [
                {
                    min:4,
                    max:9,
                    description:"เสี่ยงน้อย"
                },
                {
                    min:10,
                    max:16,
                    description:"เสี่ยงค่อนข้างน้อย",
                    advice:""
                },
                {
                    min:17,
                    max:23,
                    description:"เสี่ยงปานตรง"
                },
                {
                    min:24,
                    max:30,
                    description:"เสี่ยงค่อนข้างสูง",
                    advice:"ทางเราขอแนะนำให้ท่านเข้ารับการเจาะตรวจเลือด เพื่อทำการตรวจหาเชื้อ HIV"
                },
                {
                    min:31,
                    max:36,
                    description:"เสี่ยงสูง",
                    advice:"ทางเราขอแนะนำให้ท่านเข้ารับการเจาะตรวจเลือด เพื่อทำการตรวจหาเชื้อ HIV"
                }
                ]
          }     
    }
},
methods:{
    processScore: function(){
        let pointToScore = this.point;
        let conditionList = []
        conditionList = this.condition;
        this.score = Math.round(pointToScore*2.778);
        conditionList.forEach(function(value){
            if(pointToScore >= Number(value.min) && pointToScore <= Number(value.max)){
               console.log(value)
            }
        })
    }
},created(){
    this.processScore();
}

    

}
</script>
<style>
.block-summary-point{
    height: 100vh;
}
.title-summary-form{
    background-color: #328679 !important;
    /* color: white; */
}
.circle-point{
    /* color:white;
    background-color: #BF4448; */
    border: 2px solid black;    
    border-radius: 50%;
    width: 250px;
    height: 250px;
    }
.block-description{
    background-color: white;
    border-radius: 5px;
    font-size: 130%;
    height: 225px;
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
    /* background-color: #FFF6CC !important; */
} 
</style>