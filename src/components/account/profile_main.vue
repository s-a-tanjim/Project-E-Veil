<template>
  <div>
    <!-- Topbar will be here -->
    <component v-bind:is="'Navbar'"></component>
    <div class="wrapper-body">
      <!-- Sidebar -->
      <component v-bind:is="'Sidebar'"></component>
      <div class="body-container">
        <div class="container emp-profile">
          <div class="row">
            <div class="col-md-6">
              <div class="profile-head">
                <h5>{{ user.username }}</h5>
                <h6>
                  <!--email-->
                </h6>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a
                      class="nav-link active"
                      id="home-tab"
                      data-toggle="tab"
                      href="#home"
                      role="tab"
                      aria-controls="home"
                      aria-selected="true"
                    >About</a>
                  </li>
                  <li class="nav-item">
                    <a
                      class="nav-link"
                      id="profile-tab"
                      data-toggle="tab"
                      href="#profile"
                      role="tab"
                      aria-controls="profile"
                      aria-selected="false"
                    >Timeline</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-4" style="margin-left:4%;">
              <div class="profile-img">
                <img v-bind:src="user.pro_pic_url" alt="Profile Picture" />
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-8">
              <div class="tab-content profile-tab" id="myTabContent">
                <div
                  class="tab-pane fade show active"
                  id="home"
                  role="tabpanel"
                  aria-labelledby="home-tab"
                >
                  <div class="row">
                    <div class="col-md-6">
                      <label>Name</label>
                    </div>
                    <div class="col-md-6">
                      <!--first_name last_name-->

                      <div @click="flags.edit_name=true" v-if="!flags.edit_name">
                        <p v-if="user.name!=''">{{ user.name }}</p>
                        <p v-else>N/A</p>
                        <!--p_number-->
                      </div>
                      <div v-else>
                        <p>
                          <input
                            type="text"
                            placeholder="Enter Your Name"
                            v-on:keyup.enter="validateInput(user.name,flags.edit_name,'name_verify')"
                            @focusout="validateInput(user.name,flags.edit_name,'name_verify')"
                            v-model="user.name"
                            autofocus
                          />
                        </p>

                        <p class="alert alert-danger" v-if="name_valid==false">Invalid Input</p>
                        <!--p_number-->
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <label>Email</label>
                    </div>
                    <div class="col-md-6">
                      <p>
                        {{ user.email }}
                        <!--email-->
                      </p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <label>Phone</label>
                    </div>
                    <div class="col-md-6">
                      <div @click="flags.edit_phone=true" v-if="!flags.edit_phone">
                        <p v-if="user.phone!=''">{{ user.phone }}</p>
                        <p v-else>N/A</p>
                        <!--p_number-->
                      </div>
                      <div v-else>
                        <p>
                          <input
                            type="text"
                            placeholder="Enter Phone Number"
                            v-on:keyup.enter="validateInput(user.phone,flags.edit_phone,'phone_number_verify')"
                            @focusout="validateInput(user.phone,flags.edit_phone,'phone_number_verify')"
                            v-model="user.phone"
                            autofocus
                          />
                        </p>

                        <p class="alert alert-danger" v-if="phone_valid==false">Invalid Input</p>
                        <!--p_number-->
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <label>Address</label>
                    </div>
                    <div class="col-md-6">
                      <div @click="flags.edit_address=true" v-if="!flags.edit_address">
                        <p v-if="user.address!=''">{{ user.address }}</p>
                        <p v-else>N/A</p>
                        <!--Addressr-->
                      </div>
                      <div v-else>
                        <p>
                          <input
                            type="text"
                            placeholder="Enter Your Address"
                            v-on:keyup.enter="validateInput(user.address,flags.edit_address,'address_verify')"
                            @focusout="validateInput(user.address,flags.edit_address,'address_verify')"
                            v-model="user.address"
                            autofocus
                          />
                        </p>

                        <p class="alert alert-danger" v-if="address_valid==false">Invalid Input</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div
                  class="tab-pane fade"
                  id="profile"
                  role="tabpanel"
                  aria-labelledby="profile-tab"
                >
                  <div class="row">
                    <div class="col-md-6">
                      <label>Joind</label>
                    </div>
                    <div class="col-md-6">
                      <p>{{ user.joined_date }}</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <label>Sent email</label>
                    </div>
                    <div class="col-md-6">
                      <p>
                        {{ user.sent_mail_count }}
                        <!--sent_mail_count-->
                      </p>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <button
                        class="eveilbtn"
                        data-toggle="modal"
                        data-target="#deleteModal"
                        style="margin-top:20px;"
                      >
                        <i style="margin-right:5px;" class="far fa-trash-alt"></i>Delete Account
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Delete Modal-->
        <div
          class="modal fade"
          id="deleteModal"
          tabindex="-1"
          role="dialog"
          aria-labelledby="deleteModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete E-Veil Account</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Are you sure you want to delete your account?</p>
                <p>
                  <i class="fas fa-exclamation-triangle"></i> All of your data will be deleted permanently!
                </p>
              </div>
              <div class="modal-footer">
                <button class="eveilbtn btn-secondary" type="button" data-dismiss="modal">No</button>
                <a
                  name="logout_submit"
                  class="account-delete-btn"
                  style="text-decoration: none;"
                  href="#"
                >Yes</a>
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
export default {
  data: function() {
    return {
      user: {
        username: "",
        name: "",
        email: "",
        phone: "",
        address: "",
        joined_date: "",
        sent_mail_count: "",
        pro_pic_url: "/img/icons/indexicon.png"
      },
      flags: {
        edit_phone: false,
        edit_name: false,
        edit_address: false
      },
      phone_valid: null,
      name_valid: null,
      address_valid: null
    };
  },
  methods: {
    validateInput(input, flag, data) {
      var alpha = /^[A-Za-z ]+$/;
      var num = /^[0-9]+$/;

      if (data == "phone_number_verify") {
        if (input == "") this.phone_valid = false;
        else if (!num.test(input)) this.phone_valid = false;
        else {
          this.phone_valid = true;
          this.flags.edit_phone = false;
        }
      } else if (data == "name_verify") {
        if (input == "") this.name_valid = false;
        else if (!alpha.test(input)) this.name_valid = false;
        else {
          this.name_valid = true;
          this.flags.edit_name = false;
        }
      } else if (data == "address_verify") {
        if (input == "") this.address_valid = false;
        else {
          this.address_valid = true;
          this.flags.edit_address = false;
        }
      }
    },
    getDataFromFirebase() {
      var refUser = "user/" + this.user.username;
      var userRef = firebase.database().ref(refUser);
      userRef.on(
        "value",
        data => {
          var alldata = data.val();
          if (alldata === null || alldata === undefined) {
            console.log("Error!");
          } else {
            this.user.name = alldata["first_name"] + " " + alldata["last_name"];
            this.user.phone = alldata["phone_number"];
            this.user.address = alldata["address"];
            this.user.joined_date = alldata["creation_date"];
            this.user.sent_mail_count = alldata["sent_email"];
          }
        },
        errUserData => {
          console.log(errUserData);
        }
      );
    },
    updateToFirebase(data, value) {
      var x = new Object();
      x[data] = value;
      var refUser = "user/" + this.user.username;
      var userRef = firebase.database().ref(refUser);
      userRef.update(x).then(() => {
        console.log("Updated!");
      });
    }
  },
  created() {
    this.user.email = firebase.auth().currentUser.email;
    this.user.username = this.user.email.substring(
      0,
      this.user.email.length - 10
    );
    this.getDataFromFirebase();
  },
  watch: {
    address_valid: function() {
      if (this.address_valid) {
        this.updateToFirebase("address", this.user.address);
      }
    },
    phone_valid: function() {
      if (this.phone_valid) {
        this.updateToFirebase("phone_number", this.user.phone);
      }
    },
    name_valid: function() {
      if (this.name_valid) {
        this.updateToFirebase("first_name", this.user.name);
      }
    }
  }
};
</script>

<style scoped>
.emp-profile {
  padding: 3%;
  margin-top: 3%;
  margin-bottom: 3%;
  border-radius: 0.5rem;
  background: #fff;
}

.profile-img {
  text-align: center;
}

.profile-img img {
  width: 70%;
  height: 100%;
}

.profile-img .file {
  position: relative;
  overflow: hidden;
  margin-top: -20%;
  width: 70%;
  border: none;
  border-radius: 0;
  font-size: 15px;
  background: #212529b8;
}

.profile-img .file input {
  position: absolute;
  opacity: 0;
  right: 0;
  top: 0;
}

.profile-head h5 {
  color: #333;
}

.profile-head h6 {
  color: #0062cc;
}

.profile-edit-btn {
  border: none;
  border-radius: 1.5rem;
  width: 70%;
  padding: 2%;
  font-weight: 600;
  color: #6c757d;
  cursor: pointer;
}

.proile-rating {
  font-size: 12px;
  color: #818182;
  margin-top: 5%;
}

.proile-rating span {
  color: #495057;
  font-size: 15px;
  font-weight: 600;
}

.profile-head .nav-tabs {
  margin-bottom: 5%;
}

.profile-head .nav-tabs .nav-link {
  font-weight: 600;
  border: none;
}

.profile-head .nav-tabs .nav-link.active {
  border: none;
  border-bottom: 2px solid #0062cc;
}

.profile-work {
  padding: 14%;
  margin-top: -15%;
}

.profile-work p {
  font-size: 12px;
  color: #818182;
  font-weight: 600;
  margin-top: 10%;
}

.profile-work a {
  text-decoration: none;
  color: #495057;
  font-weight: 600;
  font-size: 14px;
}

.profile-work ul {
  list-style: none;
}

.profile-tab label {
  font-weight: 600;
}

.profile-tab p {
  font-weight: 600;
  color: #0062cc;
}

.account-delete-btn {
  color: #fff;
  border: 1px solid #dc3545;
  background-color: #dc3545;
  padding: 5px 20px;
  -webkit-transition-duration: 0.2s;
  transition-duration: 0.2s;
}

.account-delete-btn:hover {
  color: #dc3545;
  background-color: #fff;
}

.eveilbtn {
  padding: 5px 20px;
}

.alert {
  padding: 0.4rem 1.25rem;
}

.alert-danger {
  color: #721c24 !important;
}
</style>