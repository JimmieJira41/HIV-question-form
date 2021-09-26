<template>
  <div class="card">
    <div class="card-header text-center">
      <h2>ตารางข้อมูลของผู้ใช้งาน <font-awesome-icon icon="table"/></h2>
    </div>
    <div class="card-body">
      <data-table v-bind="informationTable" />
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    axios.get("/api/information").then((response) => {
      this.informationUser = response.data;
    });
  },
  data: function () {
    return {
      informationUser: [],
    };
  },
  computed: {
    informationTable() {
      return {
        data: this.informationUser,
        actionMode: "multiple",
        columns: [
          {
            key: "name",
            title: "ชื่อหรือนามแฝง",
          },
          {
            key: "tel",
            title: "เบอร์โทรศัพท์",
          },
          {
            key: "point",
            title: "คะแนน",
          },
          {
            key: "submit_at",
            title: "เวลาส่งคำตอบ",
          },
          {
            key: "answer1",
            title: "คำตอบที่ 1",
          },
          {
            key: "answer2",
            title: "คำตอบที่ 2",
          },
          {
            key: "answer3",
            title: "คำตอบที่ 3",
          },
          {
            key: "answer4",
            title: "คำตอบที่ 4",
          },
          {
            key: "answer5",
            title: "คำตอบที่ 5",
          },
          {
            key: "answer6",
            title: "คำตอบที่ 6",
          },
          {
            key: "answer7",
            title: "คำตอบที่ 7",
          },
          {
            key: "answer8",
            title: "คำตอบที่ 8",
          },
          {
            key: "answer9",
            title: "คำตอบที่ 9",
          },
          {
            key: "answer10",
            title: "คำตอบที่ 10",
          },
          {
            key: "answer11",
            title: "คำตอบที่ 11",
          },
          {
            key: "answer12",
            title: "คำตอบที่ 12",
          },
          {
            key: "answer13",
            title: "คำตอบที่ 13",
          },
        ],
      };
    },
  },
};
</script>