<template>
    <div class="container-fluid px-0">
        <template v-if="submited">
            <summary-point :point="datasUser.point"></summary-point>
        </template>
        <template v-else>
        <div class="title-question-form col-12 card mb-4">
             <div class="card-body container">
                 <div class="header-logo text-center mt-0 mb-2">
                    <h4 class="header-question text-center">แบบประเมินความเสี่ยงด้วยตัวเอง <br>(ระยะเวลา 3 เดือนที่ผ่านมา)</h4>      
                    <img class="col-6 col-sm-6 col-md-3 col-lg-2 col-xl-2" :src="img" />
                </div>
             </div>
        </div>   
        <div class="container">    
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header">
                             <h4 class="header-question text-center"><font-awesome-icon icon="address-card" /> ข้อมูลทั่วไป</h4>
                        </div>
                        <div class="card-body">
                            <form class="d-flex justify-content-center flex-wrap">
                                <div class="form-group mx-auto col-12 col-sm-12 col-m-6 col-l-6 col-xl-6">
                                    <label for="name">ชื่อ (หรือนามแฝง)</label>
                                    <input type="text" class="form-control border-none shadow" id="name" v-model="informationUser.name" placeholder="กรอกชื่อของท่าน" autocomplete="off">
                                </div>
                                <div class="form-group mx-auto col-12 col-s-12 col-m-6 col-l-6 col-xl-6">
                                    <label for="tel">เบอร์โทรศัพท์</label>
                                    <input type="tel" class="form-control  border-none shadow" id="tel" v-model="informationUser.tel" placeholder="กรอกเบอร์โทรศัพท์ของท่าน" autocomplete="off">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="card">
                         <div class="card-header">
                            <h4 class="header-question text-center"><font-awesome-icon icon="clipboard" /> ประเมินความเสี่ยง</h4>
                        </div>
                        <div class="card-body py-0 mx-4" v-for="(question, questionIndex) in dataQuestion" :key="questionIndex">
                            <div class="question-block my-4">
                                <h2 class="question my-3 py-4 text-center">{{ questionIndex+1 +". " }}{{ question.question + " ?" }}</h2> 
                            </div>
                            <div class="answer d-flex flex-wrap justify-content-around "> 
                                <b-form-group   
                                v-for="(answer, answerIndex) in question.answers" 
                                :key="answerIndex"
                                v-slot="{ ariaDescribedby }">
                                    <b-form-radio-group v-if="questionIndex != 5"
                                    v-model="answerUser[questionIndex]"
                                    :aria-describedby="ariaDescribedby"
                                    buttons
                                    >
                                        <b-form-radio class="check-btn"  :value="answer" name="check-button" button>
                                            {{answer.text}}
                                        </b-form-radio>
                                    </b-form-radio-group>

                                    <b-form-checkbox-group v-else
                                    v-model="answerNo6"
                                    :aria-describedby="ariaDescribedby"
                                    buttons
                                    >
                                        <b-form-checkbox class="check-btn checkbox-btn"  @change="unCheckedNo6(answerIndex)" :value="answer" :ref="refForm(answerIndex)" name="check-button" button>
                                            {{answer.text}}
                                        </b-form-checkbox>
                                    </b-form-checkbox-group>

                                </b-form-group>
                            </div>
                            <hr>
                        </div> 
                        <div class="submit-answer text-center mb-4">
                            <button class="btn btn-primary w-75 d-block mx-auto btn-submit-answer" v-on:click="submit">ส่งคำตอบ</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </template>        
    </div>
</template>

<script>
import summaryPoint from "./summaryPoint";

export default {
    components:{
        summaryPoint
    },
    data: function() {
        return {
            img: "/img/Mplus-Logo.jpg",
            datasUser:{
                name: "",
                tel: "",
                answer1: "",
                answer2: "",
                answer3: "",
                answer4: "",
                answer5: "",
                answer6: "",
                answer7: "",
                answer8: "",
                answer9: "",
                answer10: "",
                answer11: "",
                answer12: "",
                answer13: "",
                point: 0,
            },
            informationUser:{
                name:"",
                tel:""
            },
            answerNo6: [],
            answerNo6Used: {
                point:0,
                text:""
            },
            answerUser: [],
            submited: false,
            dataQuestion:[
                {
                    question:"ท่านนิยามตนเองว่าเป็นกลุ่มประชากรใด",
                    answers:[
                        {
                            text:"ชาย",
                            point: 1,
                        },
                        {                           
                            text:"หญิง",
                            point: 2,
                        },
                        {                           
                            text:"ชายที่มีเพศสัมพันธ์กับชาย",
                            point: 2,
                        },
                        {                           
                            text:"สาวประเภทสอง",
                            point: 2,
                        },
                        {                           
                            text:"ไบเซ็กชวล",
                            point: 2,
                        },
                        {                           
                            text:"ไม่อยู่ในกรอบเพศชาย/หญิง",
                            point: 1,
                        }
                    ]
                },
                {
                    question:"ท่านเคยได้รับสิ่งของหรือเงิน เพื่อนำไปสู่การมีเพศสัมพันธ์ในระยะเวลา 3 เดือนที่ผ่านมาหรือไม่",
                    answers:[
                        {                           
                            text:"เคย",
                            point: 2
                        },
                        {
                           
                            text:"ไม่เคย",
                            point: 1
                        }
                    ]
                },
                {
                    question:"ผลการตรวจเอชไอวีภายในระยะเวลา 3 เดือนที่ผ่านมาครั้งล่าสุด",
                    answers:[
                        {
                            
                            text:"ไม่เคยตรวจ",
                            point: 1
                        },
                        {
                            
                            text:"เคยตรวจแต่จำผลการตรวจไม่ได้",
                            point: 1
                        },
                        {
                            
                            text:"เคยตรวจผลไม่ติดเชื้อเอชไอวี(ลบ)",
                            point: 1
                        },
                        {
                            
                            text:"เคยตรวจผลติดเชื้อเอชไอวี(บวก)",
                            point: 1
                        },
                        {
                            
                            text:"เคยตรวจแต่สรุปผลไม่ได้",
                            point: 1
                        }
                    ]

                },
                {
                    question:"เพศสัมพันธ์กับคู่นอนในระยะ 3 เดือนที่ผ่านมา",
                    answers:[
                        {
                            text:"กับคู่นอนประจำ",
                            point: 1
                        },
                        {
                            text:"กับคู่นอนไม่ประจำ",
                            point: 2
                        },
                        {
                            text:"กับคู่นอนประจำและคู่นอนไม่ประจำ",
                            point: 3
                        },
                        {
                            text:"ไม่มีเพศสัมพันธ์",
                            point: 0
                        }
                    ]
                },
                {
                    question:"บทบาททางเพศ",
                    answers:[
                        {
                            text:"รุกเท่านั้น",
                            point: 1
                        },
                        {
                            text:"รับเท่านั้น",
                            point: 3
                        },
                        {
                            text:"ทั้งรุกทั้งรับ",
                            point: 2
                        },
                        {
                            text:"ไม่เคยมีเพศสัมพันธ์",
                            point: 0
                        }
                    ]

                },
                {
                    question:"ท่านมีเพศสัมพันธ์ครั้งล่าสุดภายในระยะเวลา 3 เดือนที่ผ่านมาทางช่องทางใด (สามารถตอบได้มากกว่า 1 ข้อ)",
                    answers:[
                        {
                            text:"ทางทวารหนัก",
                            point: 4
                        },
                        {
                            text:"ทางช่องคลอดผู้หญิง",
                            point: 3
                        },
                        {
                            text:"ทางช่องคลอดสาวประเภทสอง",
                            point: 3
                        },
                        {
                            text:"ทางปาก",
                            point: 2
                        },
                        {
                            text:"ไม่เคยมีเพศสัมพันธ์",
                            point: 0
                        }
                    ]
                },
                {
                    question:"การใช้ถุงยางอนามัย (ทั้งแบบรุก/แบบรับ) ภายในระยะ 3 เดือนที่ผ่านมา",
                    answers:[
                        {
                            text:"ใช้ถุงยางทุกครั้ง",
                            point: 1
                        },
                        {
                            text:"ใช้ถุงยางเป็นบางครั้ง",
                            point: 2
                        },
                        {
                            text:"ไม่เคยใช้ถุงยางเลย",
                            point: 3
                        },
                        {
                            text:"ไม่เคยมีเพศสัมพันธ์",
                            point: 0
                        }
                    ]
                },
                {
                    question:"ในช่วง 3 เดือนที่ผ่านมาท่านมีเพศสัมพันธ์แบบสอดใส่ (ทั้งแบบรุก/แบบรับ) หรือไม่",
                    answers:[
                        {
                            text:"มีการสอดใส่",
                            point: 2
                        },
                        {
                            text:"ไม่มีการสอดใส่",
                            point: 0
                        },
                        {
                            text:"ไม่แน่ใจ",
                            point: 1
                        }
                    ]
                },
                {
                    question:"ในระยะ 3 เดือนที่ผ่านมา ท่านเคยใช้สารเสพติด Chemsex รวมถึงระหว่างมีเพศสัมพันธ์หรือไม่",
                    answers:[
                        {
                            text:"เคยใช้สารเสพติด",
                            point: 2
                        },
                        {
                            text:"ไม่เคยใช้สารเสพติด",
                            point: 0
                        },
                        {
                            text:"ไม่แน่ใจ",
                            point: 1
                        }
                    ]
                },
                {
                    question:"ในระยะเวลา 3 เดือนที่ผ่านมา ท่านเคยใช้เข็มฉีดยาหรือฉีดสารเสพติด ร่วมกับผู้อื่นหรือไม่",
                    answers:[
                        {   
                            text:"เคยใช้เข็มร่วมกับผู้อื่น",
                            point: 2
                        },
                        {
                            text:"ไม่เคยใช้เข็มร่วมกับผู้อื่น",
                            point: 0
                        },
                        {
                            text:"จำไม่ได้",
                            point: 1
                        }
                    ]
                },
                {
                    question:"ในระยะ 3 เดือนที่ผ่านมา ท่านมีอาการผิดปกติ เช่นแผล ตุ่ม หนอง ที่อวัยวะเพศหรือทวารหนัก หรือไม่ ",
                    answers:[
                        {
                            text:"เคยมี รักษาหายแล้ว",
                            point: 2
                        },
                        {
                            text:"มีในขณะนี้",
                            point: 4
                        },
                        {
                            text:"ไม่เคยมีอาการ",
                            point: 1
                        }
                    ]
                },
                {
                    question:"การใช้ PrEP (ยาป้องกันเอชไอวีก่อนสัมผัสเชื้อ) (ระยะเวลา 3 เดือนที่ผ่านมา)",
                    answers:[
                        {
                            text:"เคยใช้ PrEP",
                            point: 0
                        },
                        {
                            text:"ไม่เคยใช้ PrEP",
                            point: 0
                        },
                        {
                            text:"ใช้ PrEP อยู่ ",
                            point: 0
                        },
                        {
                            text:"ไม่รู้จัก PrEP",
                            point: 0
                        }
                    ]
                },
                {
                    question:"การใช้ PEP (ยาป้องกันเอชไอวีแบบฉุกเฉิน) (ระยะเวลา 3 เดือนที่ผ่านมา)",
                    answers:[
                        {
                            text:"เคยใช้ PEP",
                            point: 0
                        },
                        {
                            text:"ไม่เคยใช้ PEP",
                            point: 0
                        },
                        {
                            text:"ใช้ PEP อยู่ ",
                            point: 0
                        },
                        {
                            text:"ไม่รู้จัก PEP",
                            point: 0
                        }
                    ]
                }
            ]
        }
    },
    methods:{
        refForm: function(index){
            return "answer"+index;
        },
        unCheckedNo6: function(index){
            let answer0 = this.$refs.answer0[0].value
            let answer1 = this.$refs.answer1[0].value
            let answer2 = this.$refs.answer2[0].value
            let answer3 = this.$refs.answer3[0].value
            let answer4 = this.$refs.answer4[0].value
            let checkbox_checked = document.getElementsByClassName("checkbox-btn");
            if(index == 4){
                if(checkbox_checked[index].classList.contains('active')){
                    this.answerNo6 = [];
                    this.answerNo6.push(answer4)
                }
            }else{
                if(checkbox_checked[4].classList.contains('active')){
                    this.answerNo6 = [];
                    switch(index){
                        case 0:
                            this.answerNo6.push(answer0)
                            break;
                        case 1:
                            this.answerNo6.push(answer1)
                            break;
                        case 2:
                            this.answerNo6.push(answer2)
                            break;
                        case 3:
                            this.answerNo6.push(answer3)
                            break;
                        case 4:
                            this.answerNo6.push(answer4)
                            break;                        
                    }
                }
            }
        },
        makeAnsertNo6: function(){
            let textAnswer6 = "";
            if(this.answerNo6.length > 0){
                const sumAnswerPoint6 = this.answerNo6.reduce(function(accumulate, answerNo6){
                return accumulate + Number(answerNo6.point);
            },0);
            console.log(sumAnswerPoint6);
            this.answerNo6.forEach(function(value,i){
                  textAnswer6 += value.text+" ";
                })
                this.answerNo6Used.point = Number(sumAnswerPoint6);
                this.answerNo6Used.text = textAnswer6;
            }
        },
        mapData: function(){
            let text_answer = "";
            let tempDatasUser = this.datasUser;
            this.answerUser.forEach(function(value,i){    
                text_answer = value.text;
                switch(i){
                    case 0 :
                        tempDatasUser.answer1 = text_answer;
                        break;
                    case 1 :
                        tempDatasUser.answer2 = text_answer;
                        break;
                    case 2 :
                        tempDatasUser.answer3 = text_answer;
                        break;
                    case 3 :
                        tempDatasUser.answer4 = text_answer;
                        break;
                    case 4 :
                        tempDatasUser.answer5 = text_answer;
                        break;
                    case 5 :
                        tempDatasUser.answer6 = text_answer;
                        break;
                    case 6 :
                        tempDatasUser.answer7 = text_answer;
                        break;
                    case 7 :
                        tempDatasUser.answer8 = text_answer;
                        break;
                    case 8 :
                        tempDatasUser.answer9 = text_answer;
                        break;
                    case 9 :
                        tempDatasUser.answer10 = text_answer;
                        break;
                    case 10 :
                        tempDatasUser.answer11 = text_answer;
                        break;
                    case 11 :
                        tempDatasUser.answer12 = text_answer;
                        break;
                    case 12 :
                        tempDatasUser.answer13 = text_answer;
                        break;
                } 
            })
            this.datasUser = tempDatasUser;
            this.datasUser.name = this.informationUser.name;
            this.datasUser.tel = this.informationUser.tel;
            this.datasUser.point = this.summary();
            console.log(this.datasUser);
        },
        submit: function(){
            let passed_information = false;
            let passed_answer = false;

            // check informationUser
            if(this.informationUser.name == "" && this.informationUser.tel == ""){
                this.$swal({
                    icon:'warning',
                    title:'แจ้งเตือน',
                    text:'กรุณากรอกชื่อและเบอร์โทรศัพท์ของท่าน !',
                })
            }else{
                if(this.informationUser.name == ""){
                    this.$swal({
                        icon:'warning',
                        title:'แจ้งเตือน',
                        text:'กรุณากรอกชื่อของท่าน !',
                    })
                }
                if(this.informationUser.tel == ""){
                    this.$swal({
                        icon:'warning',
                        title:'แจ้งเตือน',
                        text:'กรุณากรอกเบอร์โทรศัพท์ของท่าน !',
                    })
                }else{
                    if(this.informationUser.tel.length != 10){
                        this.$swal({
                            icon:'warning',
                            title:'แจ้งเตือน',
                            text:'กรุณากรอกเบอร์โทรศัพท์ของท่านให้ถูกต้อง !',
                        })
                    }else{
                         passed_information = true;
                    }
                }   
            }
            // check answerUser
            if(this.answerUser.length != 0){
                const answerIncludesNull = this.answerUser.some(function(answerUser){
                    return answerUser == null;
                });
                if(answerIncludesNull){
                    this.$swal({
                    icon:'warning',
                    title:'แจ้งเตือน',
                    text:'กรุณากรอกตอบคำถามให้ครบถ้วน !',
                    })
                }else{
                    if(this.answerUser.length == 13){
                        passed_answer = true;
                    }else{
                        this.$swal({
                            icon:'warning',
                            title:'แจ้งเตือน',
                            text:'กรุณากรอกตอบคำถามให้ครบถ้วน !',
                        })
                    }
                }
            }else{
                this.$swal({
                    icon:'warning',
                    title:'แจ้งเตือน',
                    text:'กรุณากรอกตอบคำถามให้ครบถ้วน !',
                })
            }

            if(passed_information && passed_answer){
                this.$swal({

                    icon:'warning',
                    title:'แจ้งเตือน',
                    text:'ท่านต้องการส่งคำตอบใช่หรือไม่ ?',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'ยืนยัน',
                    cancelButtonText: 'ยกเลิก'
                })
                .then((result) => {
                    if(result.isConfirmed){
                        this.mapData();
                        axios.post('/api/submit',{
                            datasUser: this.datasUser
                        })
                        .then( response => {
                            if( response.status == 201 ) {
                                this.$swal({
                                    icon:'success',
                                    title:'แจ้งเตือน',
                                    text:'การส่งคำตอบสำเร็จ !',
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'ยืนยัน'
                                })
                                .then((result) => {
                                    if(result.isConfirmed){
                                        this.submited = true;
                                    }
                                })
                               
                                }
                            })
                            .catch( error => {
                                console.log(error)
                            })
                    }
                   
                })
                const sum_point = this.summary();
                console.log(this.answerNo6)
                console.log(this.answerUser )
                console.log(sum_point);
            }
        },
        summary: function(){
            this.makeAnsertNo6();
            this.answerUser[5] = this.answerNo6Used;
            const sum = this.answerUser.reduce(function(accumulate, answerUser){
                return accumulate + Number(answerUser.point);
            },0);
            return sum;
        }
    }
}
</script>

<style scoped>
.title-question-form{
    background-color: #328679;
    color: white;
}
.container-fluid{
    background-color: #D1E6E4;
}
.question-block {
    padding: 0 10px;
    border-radius: 10px;
    background-color: #FFE4A1;
}
/* .card-header{
    background-color: #FFE4A1;
} */
.card-header{
    background-color: #FFF6CC;
}
form, .question{
    font-size: 1.25em;
}   
.check-btn{
    color: black;
    background-color: #FAFFFD;
    border:3px solid #328679;
    min-width: 275px;
}
.check-btn:hover{
    color: black !important;
    background-color: #ACC7A5 !important;
    border:3px solid #328679 !important;
    transform: scale(1.00125) !important;
    transition: 0.5s ease-in !important;

}
.check-btn.active{
    font-weight: bold;
    color: #000 !important;
    background-color: #ACC7A5 !important;
    transform: scale(1.025) !important;
    transition: 0.5s ease-in !important;
}
.btn-submit-answer{
    font-size: 1.25em;
}@media only screen and (min-width: 768px){
    .header-logo{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .header-logo img{
        order: 0;
    }
    .header-logo h4{
        order: 1;
        text-align: left !important;
        
    }
}
@media only screen and (min-width: 1024px){
    .header-logo{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .header-logo img{
        order: 0;
    }
    .header-logo h4{
        order: 1;
        text-align: left !important;
        
    }
}
@media only screen and (min-width: 1440px){
    .header-logo{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .header-logo img{
        order: 0;
    }
    .header-logo h4{
        order: 1;
        text-align: left !important;
        
    }
}

</style>