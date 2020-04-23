<template>
  <div>
    <!-- Topbar will be here -->
    <component v-bind:is="'Navbar'"></component>
    <div class="wrapper-body">
      <!-- Sidebar -->
      <component v-bind:is="'Sidebar'"></component>
      <div class="body-container">
        <div class="base-demo">
          <vue-table-dynamic
            :params="params"
            v-on:row-click="getClickedRow"
            @selection-change="onSelectionChange"
            ref="table"
          ></vue-table-dynamic>
          <div style="text-align:center;display:none;" id="no-data-error">No data found</div>
        </div>
        <div style="text-align:right;color:gray;margin-top:30px;">
          <p>Last updated at {{ updateTime }}</p>
        </div>
        <button v-if="selectMsgFlag" class="msg-delete-btn" @click="deleteMsg">
          <i class="fas fa-trash-alt"></i>
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import firebase from "firebase";
import VueTableDynamic from "vue-table-dynamic";
export default {
  data: function() {
    return {
      username: "",
      email: "",
      selectMsgFlag: false,
      updateTime: " ",
      params: {
        data: [["From", "Title", "Description", "id"]],
        header: "row",
        stripe: true,
        showCheck: true,
        enableSearch: true,
        sort: [0, 1],
        pagination: true,
        pageSize: 10,
        pageSizes: [10, 20, 50],
        columnWidth: [
          { column: 0, width: "20%" },
          { column: 1, width: "30%" },
          { column: 2, width: "50%" },
          { column: 3, width: "0%" }
        ]
      }
    };
  },
  components: { VueTableDynamic },
  methods: {
    getClickedRow(index, data) {
      //console.log("getClickedRow  :", index, data);
      if (index == 0) return;
      var url = "/message/" + data[3] + "/inbox";
      this.$router.push(url);
    },
    getDataFromFirebase() {
      var refUser = "emails/" + this.username + "/received";
      var emailsRef = firebase.database().ref(refUser);
      emailsRef.on(
        "value",
        data => {
          var alldata = data.val();
          if (alldata === null || alldata === undefined) {
            document.getElementById("no-data-error").style.display = "block";
          } else {
            document.getElementById("no-data-error").style.display = "none";
            var keys = Object.keys(alldata);
            keys.reverse();
            keys.forEach(index => {
              if (alldata[index].bin == "0") {
                var temp = new Array(4);
                temp[0] = alldata[index].from;
                temp[1] = alldata[index].subject;
                temp[2] = alldata[index].message;
                temp[3] = index;
                this.params.data.push(temp);
              }
            });
          }
          this.printPresentTime();
        },
        errEmailsData => {
          console.log(errEmailsData);
        }
      );
    },
    printPresentTime() {
      var today = new Date();
      this.updateTime =
        today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    },
    onSelectionChange() {
      if (this.$refs.table.getCheckedRowDatas(true).length > 1) {
        this.selectMsgFlag = true;
      } else {
        this.selectMsgFlag = false;
      }
    },
    deleteMsg() {
      var emailObj = new Object();
      for (
        var i = 1;
        i < this.$refs.table.getCheckedRowDatas(true).length;
        i++
      ) {
        var x = this.$refs.table.getCheckedRowDatas(true)[i][3] + "/bin";
        emailObj[x] = "1";
      }
      while (this.params.data.length > 1) {
        this.params.data.pop();
      }
      var ref = "emails/" + this.username + "/received/";
      var userRef = firebase.database().ref(ref);
      userRef.update(emailObj).then(() => {
        this.printPresentTime();
        this.selectMsgFlag = false;
      });
    }
  },
  created() {
    this.email = firebase.auth().currentUser.email;
    this.username = this.email.substring(0, this.email.length - 10);
    this.getDataFromFirebase();
  }
};
</script>

<style scoped>
</style>