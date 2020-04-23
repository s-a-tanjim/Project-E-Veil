<template>
  <div>
    <!-- Topbar will be here -->
    <component v-bind:is="'Navbar'"></component>
    <div class="wrapper-body">
      <!-- Sidebar -->
      <component v-bind:is="'Sidebar'"></component>
      <div class="body-container">
        <div class="row">
          <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-8">
            <form class="compose-container">
              <div class="row justify-content-center">
                <div
                  class="col-md-6 col-lg-6 col-xl-6 error-msg"
                  id="emptyFieldError"
                  style="text-align:center;"
                >Field can't be empty!</div>
              </div>
              <div class="form-group">
                <label for="receiver_email">To</label>
                <input
                  type="email"
                  class="form-control"
                  id="receiver_email"
                  v-model="receiver_email"
                  placeholder="email@eveil.com"
                />
                <small id="invalidEmail" class="error-msg">Invalid Email!</small>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" v-model="subject" placeholder="Subject" />
              </div>
              <div class="form-group">
                <textarea
                  type="text"
                  class="form-control"
                  rows="4"
                  v-model="message"
                  placeholder="Enter your message"
                />
              </div>
              <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 left-btn-container">
                  <button class="eveilbtn" type="submit" @click="sendNormalEmail">Send</button>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 right-btn-container">
                  <button
                    class="eveilbtn"
                    type="submit"
                    @click="sendEmailAnonymously"
                  >Send Anonymously</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Button trigger modal -->
    <button
      id="successfully-sent-modal-btn"
      style="display:none;"
      data-toggle="modal"
      data-target="#successfully-sent-modal"
    ></button>

    <!-- Modal -->
    <div
      class="modal fade"
      id="successfully-sent-modal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="successfully-sent-modalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content success-color">
          <div class="modal-header" style="border-bottom:none;">
            <h5 class="modal-title" id="successfully-sent-modalLabel">Email Sent Successfully!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import firebase from "firebase";
export default {
  data: function() {
    return {
      receiver_email: "",
      subject: "",
      message: "",
      email: "",
      username: "",
      time: "",
      date: "",
      canSendFlag: false,
      mailType: "",
      counterIncFlag: false,
      send_count: 0
    };
  },
  methods: {
    sendNormalEmail(event) {
      event.preventDefault();
      this.mailType = "Normal";
      this.sendEmail();
    },
    sendEmailAnonymously(event) {
      event.preventDefault();
      this.mailType = "Anonymous";
      this.sendEmail();
    },
    sendEmail() {
      if (
        this.receiver_email == "" ||
        this.subject == "" ||
        this.message == ""
      ) {
        document.getElementById("emptyFieldError").style.display = "block";
      } else {
        document.getElementById("emptyFieldError").style.display = "none";

        if (this.verifySender() == false) {
          document.getElementById("invalidEmail").style.display = "block";
        }
      }
    },
    verifySender() {
      if (this.receiver_email.length < 11) return false;
      if (!this.receiver_email.includes("@eveil.com")) return false;
      var to_uid = this.receiver_email.substring(
        0,
        this.receiver_email.length - 10
      );
      var ref = "user/" + to_uid;
      var userRef = firebase.database().ref(ref);
      userRef.on(
        "value",
        data => {
          var alldata = data.val();
          if (alldata === null || alldata === undefined) {
            document.getElementById("invalidEmail").style.display = "block";
            return;
          } else {
            document.getElementById("invalidEmail").style.display = "none";
            this.canSendFlag = true;
          }
        },
        errUserData => {
          console.log(errUserData);
          return false;
        }
      );
    },
    updateReceiver() {
      //Update receiver DB
      var to_uid = this.receiver_email.substring(
        0,
        this.receiver_email.length - 10
      );
      var ref, to_userRef, newEmailRef;
      if (this.mailType == "Normal") {
        ref = "emails/" + to_uid + "/received";
        to_userRef = firebase.database().ref(ref);
        newEmailRef = to_userRef.push();
        newEmailRef.set({
          from: this.email,
          subject: this.subject,
          message: this.message,
          bin: "0",
          seen: "0",
          time: this.time,
          date: this.date
        });
      } else {
        ref = "emails/" + to_uid + "/veilbox";
        to_userRef = firebase.database().ref(ref);
        newEmailRef = to_userRef.push();
        newEmailRef.set({
          from: "Anonymous",
          subject: this.subject,
          message: this.message,
          bin: "0",
          seen: "0",
          time: this.time,
          date: this.date
        });
      }
    },
    getTime() {
      var today = new Date();
      this.time =
        today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
      this.date =
        today.getDate() +
        "-" +
        (today.getMonth() + 1) +
        "-" +
        today.getFullYear();
    },
    updateSender() {
      //Update sender DB
      var ref = "emails/" + this.username + "/sent";
      var userRef = firebase.database().ref(ref);
      var newEmailRef = userRef.push();
      newEmailRef.set({
        to: this.receiver_email,
        subject: this.subject,
        message: this.message,
        bin: "0",
        time: this.time,
        date: this.date
      });
      //increase send count of sender
      //Get current sendEmail count
      ref = "user/" + this.username;
      userRef = firebase.database().ref(ref);
      userRef.on(
        "value",
        data => {
          this.send_count = data.val().sent_email;
          this.counterIncFlag = true;
        },
        err => {
          console.log(err);
        }
      );
    },
    resetForm() {
      this.receiver_email = "";
      this.subject = "";
      this.message = "";
      document.getElementById("successfully-sent-modal-btn").click();
    }
  },
  created() {
    this.email = firebase.auth().currentUser.email;
    this.username = this.email.substring(0, this.email.length - 10);
  },
  watch: {
    canSendFlag: function() {
      if (this.canSendFlag) {
        this.getTime();
        this.updateReceiver();
        this.updateSender();
        this.resetForm();
      }
      this.canSendFlag = false;
    },
    counterIncFlag: function() {
      if (this.counterIncFlag) {
        var ref = "user/" + this.username;
        this.send_count++;
        var from_userRef_count = firebase.database().ref(ref);
        from_userRef_count.update({
          sent_email: this.send_count
        });
      }
      this.counterIncFlag = false;
    }
  }
};
</script>

<style scoped>
.compose-container {
  border: 1px solid #111;
  border-radius: 5px;
  padding: 80px 60px;
}
.form-group {
  margin-bottom: 2rem;
}
label {
  margin-bottom: 0px;
}
.left-btn-container {
  text-align: left;
}
.right-btn-container {
  text-align: right;
}
@media screen and (max-width: 767px) {
  .compose-container {
    padding: 60px 30px;
  }
  .left-btn-container,
  .right-btn-container {
    text-align: center;
    margin: 10px auto;
  }
}
</style>