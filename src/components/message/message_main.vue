<template>
  <div>
    <!-- Topbar -->
    <component v-bind:is="'Navbar'"></component>
    <div class="wrapper-body">
      <!-- Sidebar -->
      <component v-bind:is="'Sidebar'"></component>
      <div class="body-container">
        <div class="row" v-if="noDataFlag==true">
          <div class="col-8" v-if="from">
            <b>From:</b>
            {{ from }}
          </div>
          <div class="col-8" v-else>
            <b>To:</b>
            {{ to }}
          </div>
          <div class="col-8">
            <b>Subject:</b>
            {{ subject }}
          </div>
          <div class="col-8">
            <b>Message:</b>
            <p
              style="border:1px solid #111; border-radius:5px;padding:20px 20px;margin-top:10px;"
            >{{ message }}</p>
          </div>
          <div class="col-8">
            <b>Received at:</b>
            <p>{{ time+" "+date }}</p>
          </div>
        </div>
        <div v-if="noDataFlag==false">No data available</div>
        <div v-if="noDataFlag==null">Loading</div>
      </div>
    </div>
  </div>
</template>

<script>
import firebase from "firebase";
export default {
  props: ["id", "prev"],
  data: function() {
    return {
      message: "",
      subject: "",
      from: null,
      to: null,
      time: "",
      date: "",
      email: "",
      username: "",
      noDataFlag: null
    };
  },
  methods: {
    getData() {
      this.email = firebase.auth().currentUser.email;
      this.username = this.email.substring(0, this.email.length - 10);

      var refUser = "emails/" + this.username;
      if (this.prev == "outbox") refUser += "/sent/";
      else if (this.prev == "inbox") refUser += "/received/";
      else if (this.prev == "veilbox") refUser += "/veilbox/";
      refUser += this.id;
      var emailsRef = firebase.database().ref(refUser);
      emailsRef.on(
        "value",
        data => {
          var alldata = data.val();
          if (alldata === null || alldata === undefined) {
            this.noDataFlag = false;
          } else {
            this.noDataFlag = true;
            this.message = alldata.message;
            this.subject = alldata.subject;
            if (alldata.from) this.from = alldata.from;
            if (alldata.to) this.to = alldata.to;
            this.time = alldata.time;
            this.date = alldata.date;
          }
        },
        errEmailsData => {
          console.log(errEmailsData);
        }
      );
    }
  },
  created() {
    this.getData();
  },
  watch: {
    id: function() {
      this.getData();
    }
  }
};
</script>

<style scoped>
</style>