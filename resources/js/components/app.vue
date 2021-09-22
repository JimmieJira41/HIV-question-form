<template>
    <div class="container-fluid px-0">
        <template v-if="submited">
            <summary-point v-if="submited"></summary-point>
        </template>
        <template v-else>
        <div class="title-question-form col-12 card mb-4">
             <div class="card-body container">
                <h1 class="header-question display-5 text-center">แบบประเมินความเสี่ยงด้วยตัวเอง <br>(ระยะเวลา 3 เดือนที่ผ่านมา)</h1>
             </div>
        </div>   
        <div class="container">    
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header">
                             <h2 class="header-question text-center"><font-awesome-icon icon="address-card" /> ข้อมูลทั่วไป</h2>
                        </div>
                        <div class="card-body">
                            <form class="d-flex justify-content-center flex-wrap">
                                <div class="form-group mx-auto col-12 col-sm-12 col-m-6 col-l-6 col-xl-6">
                                    <label for="name">ชื่อ</label>
                                    <input type="text" class="form-control border-none shadow" id="name" placeholder="กรอกชื่อของท่าน" autocomplete="off">
                                </div>
                                <div class="form-group mx-auto col-12 col-s-12 col-m-6 col-l-6 col-xl-6">
                                    <label for="tel">เบอร์โทรศัพท์</label>
                                    <input type="tel" class="form-control  border-none shadow" id="tel" placeholder="กรอกเบอร์โทรศัพท์ของท่าน" autocomplete="off">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="card">
                         <div class="card-header">
                            <h2 class="header-question text-center"><font-awesome-icon icon="clipboard" /> ประเมินความเสี่ยง</h2>
                        </div>
                        <div class="card-body" v-for="(question, index) in dataQuestion" :key="index">
                            <div class="question-block border my-2">
                                <h2 class="question my-3 py-4 text-center">{{ index+1 +". " }}{{ question.question + " ?" }}</h2> 
                            </div>
                            <div class="anwser d-flex flex-wrap justify-content-around ">
                            <question-form 
                            v-for="(anwser, index) in question.anwsers" 
                            :key="index"
                            :anwser="anwser"
                            :numberAnswer="index"
                            >
                            </question-form>
                            </div>
                            <hr>
                        </div>  
                        <div class="submit-anwser text-center mb-4">
                            <button class="btn btn-primary w-75 d-block mx-auto btn-submit-anwser">ส่งคำตอบ</button>
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
import questionForm from "./questionForm";

export default {
    components:{
        summaryPoint,
        questionForm
    },data: function() {
        return {
            submited: false,
            dataQuestion:[
                {
                    question:"ท่านนิยามตนเองว่าเป็นกลุ่มประชากรใด (ระยะเวลา 3 เดือนที่ผ่านมา)",
                    
                    anwsers:[
                        {
                            number: 1,
                            anwser:"ชาย",
                            point: 1,
                            selected: false
                        },
                        {
                            number: 1,
                            anwser:"หญิง",
                            point: 2,
                            selected: false
                        },
                        {
                            number: 1,
                            anwser:"ชายที่มีเพศสัมพันธ์กับชาย",
                            point: 2,
                            selected: false
                        },
                        {
                            number: 1,
                            anwser:"สาวประเภทสอง",
                            point: 2,
                            selected: false
                        },
                        {
                            number: 1,
                            anwser:"ไบเซ็กชวล",
                            point: 2,
                            selected: false
                        },
                        {
                            number: 1,
                            anwser:"ไม่อยู่ในกรอบเพศชาย/หญิง",
                            point: 1,
                            selected: false
                        }
                    ]
                },
                {
                    question:"ท่านเคยได้รับสิ่งของหรือเงิน เพื่อนำไปสู่การมีเพศสัมพันธ์หรือไม่ (ระยะเวลา 3 เดือนที่ผ่านมา)",
                    anwsers:[
                        {
                            number: 2,
                            anwser:"เคย",
                            point: 2
                        },
                        {
                            number: 2,
                            anwser:"ไม่เคย",
                            point: 1
                        }
                    ]
                },
                {
                    question:"ผลการตรวจเอชไอวีครั้งล่าสุด (ระยะเวลา 3 เดือนที่ผ่านมา)",
                    anwsers:[
                        {
                            number: 3,
                            anwser:"ไม่เคยตรวจ",
                            point: 1
                        },
                        {
                            number: 3,
                            anwser:"เคยตรวจแต่จำผลการตรวจไม่ได้",
                            point: 1
                        },
                        {
                            number: 3,
                            anwser:"เคยตรวจผลไม่ติดเชื้อเอชไอวี(ลบ)",
                            point: 1
                        },
                        {
                            number: 3,
                            anwser:"เคยตรวจผลติดเชื้อเอชไอวี(บวก)",
                            point: 1
                        },
                        {
                            number: 3,
                            anwser:"เคยตรวจแต่สรุปผลไม่ได้",
                            point: 1
                        }
                    ]

                },
                {
                    question:"เพศสัมพันธ์กับคู่นอนในระยะ 3 เดือนที่ผ่านมา",
                    anwsers:[
                        {
                            number: 4,
                            anwser:"กับคู่นอนประจำ",
                            point: 1
                        },
                        {
                            number: 4,
                            anwser:"กับคู่นอนไม่ประจำ",
                            point: 2
                        },
                        {
                            number: 4,
                            anwser:"กับคู่นอนประจำและคู่นอนไม่ประจำ",
                            point: 3
                        },
                        {
                            number: 4,
                            anwser:"ไม่มีเพศสัมพันธ์",
                            point: 0
                        }
                    ]
                },
                {
                    question:"บทบาททางเพศ",
                    anwsers:[
                        {
                            number: 5,
                            anwser:"รุกเท่านั้น",
                            point: 1
                        },
                        {
                            number: 5,
                            anwser:"รับเท่านั้น",
                            point: 3
                        },
                        {
                            number: 5,
                            anwser:"ทั้งรุกทั้งรับ",
                            point: 2
                        },
                        {
                            number: 5,
                            anwser:"ไม่เคยมีเพศสัมพันธ์",
                            point: 0
                        }
                    ]

                },
                {
                    question:"ท่านมีเพศสัมพันธ์ครั้งล่าสุดทางช่องทางใด (ระยะเวลา 3 เดือนที่ผ่านมา) (สามารถตอบได้มากกว่า 1 ข้อ)",
                    anwsers:[
                        {
                            number: 6,
                            anwser:"ทางทวารหนัก",
                            point: 4
                        },
                        {
                            number: 6,
                            anwser:"ทางช่องคลอดผู้หญิง",
                            point: 3
                        },
                        {
                            number: 6,
                            anwser:"ทางช่องคลอดสาวประเภทสอง",
                            point: 3
                        },
                        {
                            number: 6,
                            anwser:"ทางปาก",
                            point: 2
                        },
                        {
                            number: 6,
                            anwser:"ไม่เคยมีเพศสัมพันธ์",
                            point: 0
                        }
                    ]
                },
                {
                    question:"การใช้ถุงยางอนามัย (ทั้งแบบรุก/แบบรับ) ในระยะ 3 เดือนที่ผ่านมา",
                    anwsers:[
                        {
                            number: 7,
                            anwser:"ใช้ถุงยางทุกครั้ง",
                            point: 1
                        },
                        {
                            number: 7,
                            anwser:"ใช้ถุงยางเป็นบางครั้ง",
                            point: 2
                        },
                        {
                            number: 7,
                            anwser:"ไม่เคยใช้ถุงยางเลย",
                            point: 3
                        },
                        {
                            number: 7,
                            anwser:"ไม่เคยมีเพศสัมพันธ์",
                            point: 0
                        }
                    ]
                },
                {
                    question:"ในช่วง 3 เดือนที่ผ่านมาท่านมีเพศสัมพันธ์แบบสอดใส่ (ทั้งแบบรุก/แบบรับ) หรือไม่",
                    anwsers:[
                        {
                            number: 8,
                            anwser:"มีการสอดใส่",
                            point: 2
                        },
                        {
                            number: 8,
                            anwser:"ไม่มีการสอดใส่",
                            point: 0
                        },
                        {
                            number: 8,
                            anwser:"ไม่แน่ใจ",
                            point: 1
                        }
                    ]
                },
                {
                    question:"ในระยะ 3 เดือนที่ผ่านมา ท่านเคยใช้สารเสพติด Chemsex รวมถึงระหว่างมีเพศสัมพันธ์หรือไม่",
                    anwsers:[
                        {
                            number: 9,
                            anwser:"เคยใช้สารเสพติด",
                            point: 2
                        },
                        {
                            number: 9,
                            anwser:"ไม่เคยใช้สารเสพติด",
                            point: 0
                        },
                        {
                            number: 9,
                            anwser:"ไม่แน่ใจ",
                            point: 1
                        }
                    ]
                },
                {
                    question:"ท่านเคยใช้เข็มฉีดยาหรือฉีดสารเสพติด ร่วมกับผู้อื่นหรือไม่ (ระยะเวลา 3 เดือนที่ผ่านมา)",
                    anwsers:[
                        {   
                            number: 10,
                            anwser:"เคยใช้เข็มร่วมกับผู้อื่น",
                            point: 2
                        },
                        {
                            number: 10,
                            anwser:"ไม่เคยใช้เข็มร่วมกับผู้อื่น",
                            point: 0
                        },
                        {
                            number: 10,
                            anwser:"จำไม่ได้",
                            point: 1
                        }
                    ]
                },
                {
                    question:"ในระยะ 3 เดือนที่ผ่านมา ท่านมีอาการผิดปกติ เช่นแผล ตุ่ม หนอง ที่อวัยวะเพศหรือทวารหนัก หรือไม่ ",
                    anwsers:[
                        {
                            number: 11,
                            anwser:"เคยมี รักษาหายแล้ว",
                            point: 2
                        },
                        {
                            number: 11,
                            anwser:"มีในขณะนี้",
                            point: 0
                        },
                        {
                            number: 11,
                            anwser:"ไม่เคยมีอาการ",
                            point: 1
                        }
                    ]
                },
                {
                    question:"การใช้ PrEP (ยาป้องกันเอชไอวีก่อนสัมผัสเชื้อ) (ระยะเวลา 3 เดือนที่ผ่านมา)",
                    anwsers:[
                        {
                            number: 12,
                            anwser:"เคยใช้ PrEP",
                            point: 0
                        },
                        {
                            number: 12,
                            anwser:"ไม่เคยใช้ PrEP",
                            point: 0
                        },
                        {
                            number: 12,
                            anwser:"ใช้ PrEP อยู่ ",
                            point: 0
                        },
                        {
                            number: 12,
                            anwser:"ไม่รู้จัก PrEP",
                            point: 0
                        }
                    ]
                },
                {
                    question:"การใช้ PEP (ยาป้องกันเอชไอวีแบบฉุกเฉิน) (ระยะเวลา 3 เดือนที่ผ่านมา)",
                    anwsers:[
                        {
                            number: 13,
                            anwser:"เคยใช้ PEP",
                            point: 0
                        },
                        {
                            number: 13,
                            anwser:"ไม่เคยใช้ PEP",
                            point: 0
                        },
                        {
                            number: 13,
                            anwser:"ใช้ PEP อยู่ ",
                            point: 0
                        },
                        {
                            number: 13,
                            anwser:"ไม่รู้จัก PEP",
                            point: 0
                        }
                    ]
                }
            ]
        }
    }
}
</script>

<style scoped>
.title-question-form{
    background-color: #328679;
    color: white;
}
.number-question{
    border:2px solid black;
    font-size: 1.5em;
    width: 45px;
    height: 45px;
}
.question-block {
    background-color: #D1E6E4;
}
form, .question{
    
    font-size: 1.5em;
}   
.btn-submit-anwser{
    font-size: 1.25em;
}

</style>