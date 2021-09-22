<template>
    <div class="chiose col-12 col-sm-5 col-m-5 col-l-5 col-xl-5 m-2 rounded shadow" 
        v-on:click="selectOption(numberAnswer)"
        :class="['number-question-'+anwser.number+'-choise-'+numberAnswer]"
         >
        <p class="text-center p-2 my-auto">{{anwser.anwser}}</p>
    </div>
</template>

<script>
const selectedList = [];
export default {
  props:{
      numberAnswer: 0,
      anwser:{}
  },
  data:function(){
    return {
        dataAnwser:[]
    }
  },methods:{
      selectOption(numberAnwser){
        if( this.anwser.number != 6 ){
            if(document.querySelector('.number-question-'+this.anwser.number+'-choise-'+numberAnwser).classList.contains("active")){
                document.querySelector('.number-question-'+this.anwser.number+'-choise-'+numberAnwser).classList.remove("active");
                this.dataAnwser[this.anwser.number] = null;
            }else{
                document.querySelector('.number-question-'+this.anwser.number+'-choise-'+numberAnwser).className += ' active';
                selectedList[this.anwser.number] = this.anwser;
            }
        }else{
            if(document.querySelector('.number-question-'+this.anwser.number+'-choise-'+numberAnwser).classList.contains("active")){
                document.querySelector('.number-question-'+this.anwser.number+'-choise-'+numberAnwser).classList.remove("active");
                this.dataAnwser[this.anwser.number] = null;
            }else{
                document.querySelector('.number-question-'+this.anwser.number+'-choise-'+numberAnwser).className += ' active';
                selectedList[this.anwser.number] = this.anwser;
            }
        }
        console.log(selectedList);
      }
  }
}
</script>

<style>
.chiose{
    border: 1.2px solid #328679;
    width: 100%;
    font-size: 1.25em;
}
.chiose:hover, .chiose p:hover{
    cursor: pointer;
    
}
.chiose.active{
    transition: 0.2s;
    transform: scale(1.025);
    color: white;
    background-color: #0082AA;
}  
</style>