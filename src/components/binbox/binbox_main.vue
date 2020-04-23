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
            @selection-change="onSelectionChange"
            v-on:row-click="getClickedRow"
            ref="table"
          ></vue-table-dynamic>
          <div style="text-align:center;" v-if="noDataFoundFlag==true">No data found</div>
        </div>
        <div style="text-align:right;color:gray;margin-top:30px;">
          <p>Last updated at {{ updateTime }}</p>
        </div>

        <button v-if="selectMsgFlag" class="msg-delete-btn msg-recover-btn" @click="recoverMsg">
          <i class="fas fa-redo"></i>
        </button>
        <button
          v-if="selectMsgFlag"
          class="msg-delete-btn"
          data-toggle="modal"
          data-target="#deleteEmailsModal"
        >
          <i class="fas fa-trash-alt"></i>
        </button>

        <!-- Modal -->
        <div
          class="modal fade"
          id="deleteEmailsModal"
          tabindex="-1"
          role="dialog"
          aria-labelledby="deleteEmailsModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5
                  class="modal-title"
                  id="deleteEmailsModalLabel"
                  style="color: #ba2937;"
                >Delete email permanently</h5>
                <button
                  type="button"
                  class="close"
                  id="closebtn-delete-modal"
                  data-dismiss="modal"
                  aria-label="Close"
                >
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Are you sure you want to delete selected items?</p>
                <p>
                  <i class="fas fa-exclamation-triangle" style="margin-right:10px;"></i>All selected data will be deleted permanently!
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="eveilbtn" data-dismiss="modal">No</button>
                <button type="button" class="eveilbtn" @click="deleteMsg">Yes</button>
              </div>
            </div>
          </div>
        </div>
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
      noDataFoundFlag: null,
      updateTime: " ",
      params: {
        data: [["From/To", "Title", "Description", "id", "src"]],
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
          { column: 3, width: "0%" },
          { column: 4, width: "0%" }
        ]
      }
    };
  },
  components: { VueTableDynamic },
  methods: {
    getClickedRow(index, data) {
      //console.log("getClickedRow  :", index, data);
      if (index == 0) return;
      var url = "/message/" + data[3];
      if (data[4] == "received") url += "/inbox";
      if (data[4] == "sent") url += "/outbox";
      if (data[4] == "veilbox") url += "/veilbox";
      this.$router.push(url);
    },
    getDataFromFirebase(from) {
      var refUser = "emails/" + this.username + "/" + from;
      var emailsRef = firebase.database().ref(refUser);
      emailsRef.on(
        "value",
        data => {
          var alldata = data.val();
          if (alldata != null && alldata != undefined) {
            var keys = Object.keys(alldata);
            keys.reverse();
            keys.forEach(index => {
              if (alldata[index].bin == "1") {
                this.noDataFoundFlag = false;
                var temp = new Array(5);
                if (from == "received" || from == "veilbox")
                  temp[0] = alldata[index].from;
                else if (from == "sent") temp[0] = alldata[index].to;
                temp[1] = alldata[index].subject;
                temp[2] = alldata[index].message;
                temp[3] = index;
                if (from == "received") temp[4] = "received";
                else if (from == "veilbox") temp[4] = "veilbox";
                else temp[4] = "sent";
                this.params.data.push(temp);
              }
            });
          }
        },
        errEmailsData => {
          console.log(errEmailsData);
        }
      );
    },
    getData() {
      this.getDataFromFirebase("received");
      this.getDataFromFirebase("sent");
      this.getDataFromFirebase("veilbox");
      if (this.params.data.length > 1) this.noDataFoundFlag = false;
      else this.noDataFoundFlag = true;
      this.printPresentTime();
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
    delete_recover_SelectedMsg(flag) {
      var received_emailObj = new Object();
      var sent_emailObj = new Object();
      var veilbox_emailObj = new Object();
      var rec_dataFlag = false;
      var sent_dataFlag = false;
      var veil_dataFlag = false;
      var val;
      if (flag == "delete") val = null;
      else if (flag == "recover") val = "0";
      for (
        var i = 1;
        i < this.$refs.table.getCheckedRowDatas(true).length;
        i++
      ) {
        var x;
        if (this.$refs.table.getCheckedRowDatas(true)[i][4] == "received") {
          x = this.$refs.table.getCheckedRowDatas(true)[i][3] + "";
          if (val == "0") x += "/bin";
          received_emailObj[x] = val;
          rec_dataFlag = true;
        } else if (this.$refs.table.getCheckedRowDatas(true)[i][4] == "sent") {
          x = this.$refs.table.getCheckedRowDatas(true)[i][3] + "";
          if (val == "0") x += "/bin";
          sent_emailObj[x] = val;
          sent_dataFlag = true;
        } else if (
          this.$refs.table.getCheckedRowDatas(true)[i][4] == "veilbox"
        ) {
          x = this.$refs.table.getCheckedRowDatas(true)[i][3] + "";
          if (val == "0") x += "/bin";
          veilbox_emailObj[x] = val;
          veil_dataFlag = true;
        }
      }
      for (i = 0; i < this.params.data.length; i++) {
        if (rec_dataFlag && this.params.data[i][4] == "received") {
          this.params.data.splice(i, 1);
          i--;
        } else if (sent_dataFlag && this.params.data[i][4] == "sent") {
          this.params.data.splice(i, 1);
          i--;
        } else if (veil_dataFlag && this.params.data[i][4] == "veilbox") {
          this.params.data.splice(i, 1);
          i--;
        }
      }

      var ref, userRef;
      if (rec_dataFlag) {
        ref = "emails/" + this.username + "/received/";
        userRef = firebase.database().ref(ref);
        userRef.update(received_emailObj).then(() => {
          console.log("success received");
        });
      }
      if (sent_dataFlag) {
        ref = "emails/" + this.username + "/sent/";
        userRef = firebase.database().ref(ref);
        userRef.update(sent_emailObj).then(() => {
          console.log("success sent");
        });
      }
      if (veil_dataFlag) {
        ref = "emails/" + this.username + "/veilbox/";
        userRef = firebase.database().ref(ref);
        userRef.update(veilbox_emailObj).then(() => {
          console.log("success veilbox");
        });
      }
    },
    deleteMsg() {
      this.delete_recover_SelectedMsg("delete");
      this.printPresentTime();
      this.selectMsgFlag = false;
      document.getElementById("closebtn-delete-modal").click();
    },
    recoverMsg() {
      this.delete_recover_SelectedMsg("recover");
      this.printPresentTime();
      this.selectMsgFlag = false;
    }
  },
  created() {
    this.email = firebase.auth().currentUser.email;
    this.username = this.email.substring(0, this.email.length - 10);
    this.getData();
  }
};
</script>

<style scoped>
.eveilbtn {
  padding: 5px 20px;
}
.msg-recover-btn {
  right: 90px;
}
</style>