<template>
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Create A New Account</h5>
        <button
          type="button"
          class="close"
          data-dismiss="modal"
          id="signup-modal-close-btn"
          aria-label="Close"
        >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="padding: 1.5rem 2.5rem;">
        <form>
          <div class="row justify-content-center">
            <div
              class="col-md-6 col-lg-6 col-xl-6 error-msg"
              id="emptyError"
              style="text-align:center;"
            >Field can't be empty!</div>
          </div>
          <div class="row">
            <div class="col-md-6 col-lg-6 col-xl-6">
              <div class="form-group">
                <input
                  type="text"
                  placeholder="First Name"
                  class="form-control"
                  v-model="first_name"
                  required
                />
              </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
              <div class="form-group">
                <input
                  type="text"
                  placeholder="Last Name"
                  class="form-control"
                  v-model="last_name"
                  required
                />
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="input-group">
              <input type="text" class="form-control" v-model="username" placeholder="Username" />
              <div class="input-group-prepend">
                <div class="input-group-text">@eveil.com</div>
              </div>
            </div>
            <div id="alreadyExistAlert">This Username is already exist!</div>
          </div>

          <div class="form-group">
            <input
              type="tel"
              class="form-control"
              placeholder="Mobile Number"
              v-model="mobile_no"
              required
            />
          </div>

          <div class="form-group">
            <input
              type="password"
              class="form-control"
              id="signup-password"
              placeholder="Password"
              v-model="password"
              required
            />
            <div class="error-msg" id="passwordLessThan6">Password is less than 6 digit!</div>
          </div>

          <div class="form-group">
            <input
              type="password"
              class="form-control"
              @change="passwordMatch"
              id="signup-confirmPassword"
              v-model="confirm_password"
              placeholder="Confirm Password"
              required
            />
            <div id="passwordDidntMatch">Password Didn't match!</div>
          </div>

          <div class="form-group-submit" style="text-align: center;">
            <button
              type="submit"
              class="evail-submit-button btn"
              style="margin-top: 10px;"
              @click="signupSubmit"
            >Signup</button>
          </div>
        </form>
      </div>
      <div class="modal-footer" style="padding: .75rem 2rem;">
        <span
          style="cursor: pointer;"
          data-dismiss="modal"
          data-toggle="modal"
          data-target="#loginModal"
        >Already have an account?</span>
      </div>
    </div>
    <button
      data-toggle="modal"
      id="succesfully-created-account-btn"
      data-target="#succesfully-created-account"
    ></button>
  </div>
</template>

<script>
import firebase from "firebase";
export default {
  data: function() {
    return {
      first_name: "",
      last_name: "",
      mobile_no: "",
      address: "N/A",
      sent_mail_count: 0,
      creation_date: "",
      username: "",
      email: "",
      password: "",
      confirm_password: "",
      ref: "user/"
    };
  },
  methods: {
    passwordMatch() {
      if (this.password != this.confirm_password)
        this.showError("passwordDidntMatch");
      else this.hideError("passwordDidntMatch");
    },
    signupSubmit(event) {
      event.preventDefault();
      //console.log("signup");
      this.email = this.username + "@eveil.com";
      //Create present time
      var today = new Date();
      this.creation_date =
        today.getDate() +
        "/" +
        (today.getMonth() + 1) +
        "/" +
        today.getFullYear();

      if (this.verifyInput()) {
        firebase
          .auth()
          .createUserWithEmailAndPassword(this.email, this.password)
          .then(
            () => {
              //alert("account created!", user);
              this.updateToFirebase();
              //this.$router.push("/");
            },
            err => {
              alert(err.message);
            }
          );
      } else {
        //alert("Invalid Input");
      }
    },
    verifyInput() {
      if (
        this.first_name == "" ||
        this.last_name == "" ||
        this.mobile_no == "" ||
        this.address == "" ||
        this.username == ""
      ) {
        this.showError("emptyError");
        return false;
      } else this.hideError("emptyError");
      if (this.password.length < 6) {
        this.showError("passwordLessThan6");
        return false;
      } else this.hideError("passwordLessThan6");
      if (this.password != this.confirm_password) {
        this.showError("passwordDidntMatch");
        return false;
      } else this.hideError("passwordDidntMatch");
      return true;
    },
    updateToFirebase() {
      this.ref += this.username;
      var userRef = firebase.database().ref(this.ref);
      userRef
        .set({
          first_name: this.first_name,
          last_name: this.last_name,
          email: this.email,
          phone_number: this.mobile_no,
          password: this.password,
          address: "N/A",
          sent_email: 0,
          creation_date: this.creation_date
        })
        .then(() => {
          this.resetData();
          firebase
            .auth()
            .signOut()
            .then(() => {
              document.getElementById("signup-modal-close-btn").click();
              document
                .getElementById("succesfully-created-account-btn")
                .click();
              this.$router.push("/?Signup=Successful").catch(error => {
                if (error.name != "NavigationDuplicated") {
                  throw error;
                }
              });
            });
        });
    },
    resetData() {
      (this.first_name = ""),
        (this.last_name = ""),
        (this.mobile_no = ""),
        (this.address = "N/A"),
        (this.sent_mail_count = 0),
        (this.creation_date = ""),
        (this.username = ""),
        (this.email = ""),
        (this.password = ""),
        (this.confirm_password = "");
    },
    showError(id) {
      document.getElementById(id).style.display = "block";
    },
    hideError(id) {
      document.getElementById(id).style.display = "none";
    }
  }
};
</script>

<style scoped>
.error-msg,
#alreadyExistAlert,
#passwordDidntMatch {
  font-size: 80%;
  color: #ba2937;
  display: none;
}

.was-validated .form-control:invalid:focus {
  box-shadow: none;
}

.was-validated .form-control:valid:focus {
  box-shadow: none;
}
</style>