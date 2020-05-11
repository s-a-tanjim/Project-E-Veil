<template>
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Login Your Account</h5>
        <button
          type="button"
          id="login-modal-close-btn"
          class="close"
          data-dismiss="modal"
          aria-label="Close"
        >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="padding: 1.5rem 2.5rem;">
        <form class="needs-validation" novalidate method="POST">
          <div class="form-group">
            <input type="email" class="form-control" id="email-login" v-model="email" required />
            <label for="email-login" id="label-for-email">Email</label>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
          <div class="form-group" style="margin-top: 25px;">
            <input type="password" class="form-control" id="pwd-login" v-model="password" required />
            <label for="pwd-login" id="label-for-password">Password</label>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
          <div class="form-group-submit" style="text-align: center;">
            <button
              type="submit"
              class="evail-submit-button btn"
              style="margin-top: 10px;"
              @click="loginSubmit"
            >Login</button>
          </div>
        </form>
      </div>
      <div class="modal-footer" style="display: block;padding: .75rem 2rem;">
        <div style="float: left;cursor: pointer;">
          <a href="#">Forgot password?</a>
        </div>
        <div
          style="float: right;cursor: pointer;"
          data-dismiss="modal"
          data-toggle="modal"
          data-target="#signupModal"
        >Create new account</div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: function() {
    return {
      email: "",
      password: ""
    };
  },
  methods: {
    loginSubmit(event) {
      event.preventDefault();
      console.log("sigin");
    }
  }
};
</script>

<style scoped>
.was-validated .form-control:invalid:focus {
  box-shadow: none;
}

.was-validated .form-control:valid:focus {
  box-shadow: none;
}

#label-for-email,
#label-for-password {
  position: absolute;
  top: 6px;
  left: 0;
  width: 100%;
  color: #919191;
  transition: 0.3s all;
  cursor: text;
}
</style>