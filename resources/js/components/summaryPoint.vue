<template>
  <div class="container-fluid px-0">
    <div class="block-summary-point">
         <div class="title-summary col-12 card mb-4">
             <div class="card-body container">
                  <div class="header-logo text-center mt-0 mb-2">
                    <h4 class="header-summary text-center">สรุปคะแนนความเสี่ยงจากแบบประเมินความเสี่ยงด้วยตัวเอง <br>(ระยะเวลา 3 เดือนที่ผ่านมา) ID</h4>      
                    <img class="col-6 col-sm-6 col-md-3 col-lg-2 col-xl-2" :src="img" />
                </div>
             </div>
        </div>   
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <div class="block-summary card p-0 mb-4 col-12 col-sm-12 col-md-8 col-lg-6 col-xl-6 shadow">
                        <div class="card-header header-summary-card">
                            <h4 class="text-center"><font-awesome-icon icon="heart" class="text-danger" /> คะแนนความเสี่ยงของคุณ <font-awesome-icon icon="heart" class="text-danger" /></h4>
                        </div>
                        <div class="card-body pb-0">
                           
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="circle-point d-flex justify-content-center align-items-center shadow">
                                    <h1 class="display-1">{{score}}</h1>
                                </div>
                            </div>
                            <div class="block-description text-center p-3 my-3 shadow">
                                <p>คุณอยู่ในเกณฑ์ที่มี <b class="text-description">ความ{{description}}</b><br><br>{{advice}}<br><br>สามารถเข้ารับคิวเจาะเลือดจากปุ่มด้านล่าง</p>
                                <a class="btn btn-primary w-100 h-100 d-block mx-auto btn-submit-anwser" href="https://www.google.com" target="_blank"><h4>เข้ารับคิวเจาะตรวจเลือด <font-awesome-icon icon="external-link-alt"/></h4></a>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="btn-back col-12 d-flex justify-content-center">
                        <a href="/" class="btn btn-danger">กลับไปยังแบบสอบถาม</a>
                </div>
            </div> 
        </div>
    </div>
  </div>
</template>

<script>
export default {
    data() {
      return {
                id: "",
                img: "/img/Mplus-Logo.png",
                point: 0,
                score: 0,
                description: "",
                advice: "",
                condition: [
                {
                    min:4,
                    max:9,
                    description:"เสี่ยงน้อย",
                    advice: "lorem"
                },
                {
                    min:10,
                    max:16,
                    description:"เสี่ยงค่อนข้างน้อย",
                    advice: "lorem"
                },
                {
                    min:17,
                    max:23,
                    description:"เสี่ยงปานกลาง",
                    advice: "lorem"
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
},
methods:{
    async processScore() {
        this.id = this.$route.params.id;
        await axios.get("/api/get-information-user/"+this.id)
        .then((response) =>{
            this.point = response.data.point;
            })
        let pointToScore = this.point;
        let description = "";
        let advice = "";
        this.score = Math.round(pointToScore*2.778);
        this.condition.forEach(function(value){
            if(pointToScore >= Number(value.min) && pointToScore <= Number(value.max)){
               description = String(value.description);
               advice = String(value.advice);
            }
        })
        this.description = description;
        this.advice = advice;
    }
},created(){
   this.processScore();
},mounted(){
    
}

    

}
</script>
<style>
.container-fluid {
  background-color: #d1e6e4;
}
.block-summary-point{
    height: 100vh;
}
.title-summary{
    background-color: #328679 !important;
    color: white;
}
.circle-point{
    /* color:white; */
    background-color: #fff;
    background-color: #fde4a4 !important;

    /* border: 2px solid black;     */
    border-radius: 50%;
    width: 200px;
    height: 200px;
    
    }
.block-description{
    background-color: #fde4a4 !important;

    background-color: white;
    border-radius: 5px;
    font-size: 120%;
    height: auto;
    min-height: 225px;
}
.title-description{
    position: relative;
    border: 1px solid black;
    border-radius: 15%;
    width: 250px;
    height: 250px;
    top: 45px;
    left: 45px;
}
.block-summary{
}
.header-summary-card{
    color:#fff;
    background-color: #805e9d !important;
}

</style>