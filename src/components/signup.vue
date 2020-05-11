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

          <div class="form-group">
            <input
              type="text"
              placeholder="Name"
              class="form-control"
              v-model="formData.name"
              required
            />
          </div>

          <div class="form-group">
            <div class="input-group">
              <input
                type="text"
                class="form-control"
                v-model="formData.username"
                placeholder="Username"
              />
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
              v-model="formData.mobile_no"
              required
            />
          </div>

          <div class="form-group">
            <input
              type="password"
              class="form-control"
              id="signup-password"
              placeholder="Password"
              v-model="formData.password"
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
              v-model="formData.confirm_password"
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
      formData: {
        name: "",
        mobile_no: "",
        address: "N/A",
        sent_mail_count: 0,
        creation_date: "",
        username: "",
        email: "",
        password: "",
        confirm_password: ""
      }
    };
  },
  methods: {
    passwordMatch() {
      if (this.formData.password != this.formData.confirm_password)
        this.showError("passwordDidntMatch");
      else this.hideError("passwordDidntMatch");
    },
    signupSubmit(event) {
      event.preventDefault();
      //console.log("signup");
      this.formData.email = this.formData.username + "@eveil.com";
      //Create present time
      let today = new Date();
      this.formData.creation_date =
        today.getDate() +
        "/" +
        (today.getMonth() + 1) +
        "/" +
        today.getFullYear();

      if (this.verifyInput()) {
        this.$store.dispatch("signup", this.formData);
      } else {
        //alert("Invalid Input");
      }
    },
    verifyInput() {
      if (
        this.formData.name == "" ||
        this.formData.mobile_no == "" ||
        this.formData.address == "" ||
        this.formData.username == ""
      ) {
        this.showError("emptyError");
        return false;
      } else this.hideError("emptyError");
      if (this.formData.password.length < 6) {
        this.showError("passwordLessThan6");
        return false;
      } else this.hideError("passwordLessThan6");
      if (this.formData.password != this.formData.confirm_password) {
        this.showError("passwordDidntMatch");
        return false;
      } else this.hideError("passwordDidntMatch");
      return true;
    },
    updateToFirebase() {
      /*{
          first_name: this.first_name,
          last_name: this.last_name,
          email: this.email,
          phone_number: this.mobile_no,
          password: this.password,
          address: "N/A",
          sent_email: 0,
          creation_date: this.creation_date
        }*/
    },
    resetData() {
        (this.formData.name = ""),
        (this.formData.mobile_no = ""),
        (this.formData.address = "N/A"),
        (this.formData.sent_mail_count = 0),
        (this.formData.creation_date = ""),
        (this.formData.username = ""),
        (this.formData.email = ""),
        (this.formData.password = ""),
        (this.formData.confirm_password = "");
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