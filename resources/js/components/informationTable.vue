<template>
  <div>
    <h2>ตารางข้อมูลของผู้ใช้งาน</h2>
    <table class="table display table-bordered nowrap" id="informationTable">
      <thead>
        <tr>
          <th>ชื่อหรือนามแฝง</th>
          <th>เบอร์โทรศัพท์</th>
          <th>คะแนน</th>
          <th>เวลาที่คำตอบ</th>
          <th>คำตอบที่1</th>
          <th>คำตอบที่2</th>
          <th>คำตอบที่3</th>
          <th>คำตอบที่4</th>
          <th>คำตอบที่5</th>
          <th>คำตอบที่6</th>
          <th>คำตอบที่7</th>
          <th>คำตอบที่8</th>
          <th>คำตอบที่9</th>
          <th>คำตอบที่10</th>
          <th>คำตอบที่11</th>
          <th>คำตอบที่12</th>
          <th>คำตอบที่13</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="user in informationUser" :key="user.id">
          <td>{{user.name}}</td>
          <td>{{user.tel}}</td>
          <td>{{user.point}}</td>
          <td>{{user.submit_at}}</td>
          <td>{{user.answer1}}</td>
          <td>{{user.answer2}}</td>
          <td>{{user.answer3}}</td>
          <td>{{user.answer4}}</td>
          <td>{{user.answer5}}</td>
          <td>{{user.answer6}}</td>
          <td>{{user.answer7}}</td>
          <td>{{user.answer8}}</td>
          <td>{{user.answer9}}</td>
          <td>{{user.answer10}}</td>
          <td>{{user.answer11}}</td>
          <td>{{user.answer12}}</td>
          <td>{{user.answer13}}</td>
        </tr>    
      </tbody>
    </table>    
</div>
</template>

<script>
import 'jquery/dist/jquery.min.js';
import 'bootstrap/dist/css/bootstrap.min.css';
import "datatables.net-dt/js/dataTables.dataTables"
import "datatables.net-dt/css/jquery.dataTables.min.css"
// import axios from 'axios';
import $ from 'jquery'; 

export default {
  mounted(){
    this.dtRef = $('#informationTable').DataTable();
    axios
    .get("/api/information")
    .then((response)=>
    {
      this.informationUser = response.data;
      this.informationUser.forEach(function(user){
          this.dtRef.clear()
      this.dtRef.rows.add(user);
      this.dtRef.draw();
      })
    })
  },
  data: function() {
        return {
          dtRef: null,
          informationUser:[]
        }
    },
}
</script>