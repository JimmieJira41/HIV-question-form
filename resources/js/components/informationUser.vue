<template>
  <div class="container-fluid px-0">
    <div class="title-information col-12 card mb-4">
      <div class="card-body container">
        <div class="header-logo text-center mt-0 mb-2">
          <h4 class="header-information text-center">
            ตารางข้อมูลผู้ใช้งานจากแบบประเมินความเสี่ยงด้วยตัวเอง
            <br />(ระยะเวลา 3 เดือนที่ผ่านมา)
          </h4>
          <img class="col-6 col-sm-6 col-md-3 col-lg-2 col-xl-2" :src="img" />
        </div>
      </div>
    </div>
    <div class="container">
      <information-table></information-table>
    </div>
  </div>
</template>

<script>
import informationTable from "./informationTable.vue";
export default {
  components: {
    informationTable,
  },
  data: function () {
    return {
      img: "/img/Mplus-Logo.png",
    };
  },
};
</script>
<style>
.container-fluid{
    background-color: #D1E6E4;
}
.title-information {
  background-color: #328679 !important;
  color: white;
}
@media only screen and (min-width: 768px) {
  .header-logo {
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .header-logo img {
    order: 0;
  }
  .header-logo h4 {
    order: 1;
    text-align: left !important;
  }
}
@media only screen and (min-width: 1024px) {
  .header-logo {
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .header-logo img {
    order: 0;
  }
  .header-logo h4 {
    order: 1;
    text-align: left !important;
  }
}
@media only screen and (min-width: 1440px) {
  .header-logo {
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .header-logo img {
    order: 0;
  }
  .header-logo h4 {
    order: 1;
    text-align: left !important;
  }
}
</style>

