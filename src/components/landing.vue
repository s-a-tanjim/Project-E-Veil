<template>
  <div>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <router-link class="navbar-brand" v-bind:to="'/'" style="letter-spacing:3px;">
          <i class="fas fa-user-secret" style="margin-right:6px;"></i>E-Veil
        </router-link>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarResponsive"
          aria-controls="navbarResponsive"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a
                class="nav-link"
                href="#"
                data-toggle="modal"
                data-target="#loginModal"
                style="letter-spacing:1px;"
              >Login</a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                href="#"
                data-toggle="modal"
                data-target="#signupModal"
                style="letter-spacing:1px;"
              >Sign Up</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#services" style="letter-spacing:1px;">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contact" style="letter-spacing:1px;">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navbar end-->

    <section>
      <div
        class="background-cover"
        style="background-image: url(/img/main_img.jpg);"
        data-aos="fade"
      >
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-12" data-aos="fade-up" data-aos-delay="400">
              <div class="row mb-4">
                <div class="col-md-6">
                  <h1 style="letter-spacing:1px;">Project E-Veil</h1>
                  <p class="mb-5 lead">
                    What does an undercover agent need the most? What if you want to pass a very important
                    information
                    to the authority?
                    E2E Encrypted mail service is the best solution for him.
                    And what if revealing your identity can be a life risk for you? Being anonymous maybe a good choice for you.
                    Our aim is to create a communication platform where you can share information safely by hiding your identity!
                  </p>
                  <button
                    type="button"
                    data-toggle="modal"
                    data-target="#signupModal"
                    class="btn btn-outline-light"
                  >Signup Now</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="services" class="dark-background">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
            <div class="box-container">
              <div class="icon-part">
                <img src="/img/icons/paper-plane.svg" />
              </div>
              <h2>Send Email</h2>
              <p>Send unlimited numbers of email to anyone from anywhere you want!</p>
            </div>
          </div>
          <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
            <div class="box-container">
              <div class="icon-part">
                <img src="/img/icons/data-protection.svg" />
              </div>
              <h2>Secured</h2>
              <p>We are working to make your data more secure! So no need to worry about it!</p>
            </div>
          </div>
          <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
            <div class="box-container">
              <div class="icon-part">
                <img src="/img/icons/privacy.svg" />
              </div>
              <h2>Hide yourself!</h2>
              <p>Hide yourself from the Internet and be safe from it!</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Page Content -->
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 mx-auto">
            <h2>About This Project</h2>
            <p class="lead">
              The aim of the project is to learn more about web development and web security. This was my level 2 term 2 project.
              This project is still under development. If you have any query or anything to say please don't forget to send me
              an email. I also added my other contact link below. 
            </p>
            <p><i>I want to thanks <a href="https://www.facebook.com/nishanul.nishat" target="_blank">Nishat</a> for the cover photo of this page. </i></p>
          </div>
        </div>
      </div>
    </section>

    <!-- Site footer -->
    <footer class="site-footer" id="contact">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>About ME</h6>
            <p class="text-justify">
              Hello This is Tanjim. Student of Computer Science and Engineering
              at Military Institute of Science and Technology
            </p>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Language/Tools Used</h6>
            <ul class="footer-links">
              <li>Vuejs</li>
              <li>HTML</li>
              <li>CSS</li>
              <li>Bootstrap</li>
              <li>Firebase</li>
            </ul>
          </div>
          <div class="col-xs-6 col-md-3">
            <h6>Thanks To</h6>
            <ul class="footer-links">
              <li>
                <a href="https://getbootstrap.com/" target="_blank">Bootstrap</a>
              </li>
              <li>
                <a href="https://fontawesome.com/" target="_blank">Fontawesome</a>
              </li>
              <li>
                <a href="http://flaticon.com/" target="_blank">Flaticon</a>
              </li>
            </ul>
          </div>
        </div>
        <hr />
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">
              Copyright &copy; 2020 All Rights Reserved by
              <a
                href="https://s-a-tanjim.github.io/"
                target="_blank"
              >s-a-tanjim</a>.
            </p>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons">
              <li>
                <a class="github" href="https://github.com/s-a-tanjim" target="_blank">
                  <i class="fab fa-github"></i>
                </a>
              </li>
              <li>
                <a class="facebook" href="https://www.facebook.com/s.a.tanjim" target="_blank">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li>
                <a class="twitter" href="https://twitter.com/s_a_tanjim" target="_blank">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li>
                <a class="linkedin" href="https://bd.linkedin.com/in/satanjim" target="_blank">
                  <i class="fab fa-linkedin"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <!-- Login Modal -->
    <div
      class="modal fade"
      id="loginModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="loginModalTitle"
      aria-hidden="true"
    >
      <Login />
    </div>
    <!-- Login Modal End-->

    <!-- SignUp Modal -->
    <div
      class="modal fade"
      id="signupModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="signupModalTitle"
      aria-hidden="true"
    >
      <Signup />
    </div>
    <!-- SignUp Modal End -->

    <!-- Signup Successful modal -->
    <div
      class="modal fade"
      id="succesfully-created-account"
      tabindex="-1"
      role="dialog"
      aria-labelledby="succesfully-created-accountLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content success-color">
          <div class="modal-header" style="border-bottom:none;">
            <h5
              class="modal-title"
              id="succesfully-created-accountLabel"
            >Account Creation Successful</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div
            class="modal-body"
            style="padding-top:5px;padding-bottom:1.5rem;"
          >Congratulations! You have Successfully created account!</div>
        </div>
      </div>
    </div>
    <!-- Signup Successful modal end -->
  </div>
</template>
<script>
import Login from "./login";
import Signup from "./signup";
export default {
  name: "Welcome",
  data: function() {
    return {};
  },
  components: {
    Login,
    Signup
  }
};
</script>
<style scoped>
.background-cover {
  background-color: #24292e;
  width: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  height: 800px;
  color: whitesmoke;
}

.background-cover h1 {
  margin-top: 34%;
  font-weight: 500px;
}

@media (max-width: 767px) {
  .background-cover p {
    background-color: #24292e6b;
    padding: 10px;
    border-radius: 5px;
  }
}

#about {
  background-color: #24292e;
  color: white;
  padding: 100px 30px;
}
#services {
  padding-top: 60px;
  padding-bottom: 50px;
}
.box-container {
  text-align: center;
  border: 1px solid #24292e;
  border-radius: 5px;
  padding: 30px 20px;
  background-color: whitesmoke;
  color: #24292e;
  margin-top: 10px;
  margin-bottom: 10px;
}
.box-container div,
.box-container p {
  padding: 5px 5px;
}
.icon-part img {
  height: 70px;
}
/* Footer design */
.site-footer {
  background-color: #26272b;
  padding: 45px 0 20px;
  font-size: 15px;
  line-height: 24px;
  color: #737373;
}
.site-footer hr {
  border-top-color: #bbb;
  opacity: 0.5;
}
.site-footer hr.small {
  margin: 20px 0;
}
.site-footer h6 {
  color: #fff;
  font-size: 16px;
  text-transform: uppercase;
  margin-top: 5px;
  letter-spacing: 2px;
}
.site-footer a {
  color: #737373;
}
.site-footer a:hover {
  color: #3366cc;
  text-decoration: none;
}
.footer-links {
  padding-left: 0;
  list-style: none;
}
.footer-links li {
  display: block;
  color: #737373;
}
.footer-links li:active,
.footer-links li:focus,
.footer-links li:hover {
  color: #3366cc;
  text-decoration: none;
}
.footer-links.inline li {
  display: inline-block;
}
.site-footer .social-icons {
  text-align: right;
}
.site-footer .social-icons a {
  width: 40px;
  height: 40px;
  line-height: 40px;
  margin-left: 6px;
  margin-right: 0;
  border-radius: 100%;
  background-color: #33353d;
}
.copyright-text {
  margin: 0;
}
@media (max-width: 991px) {
  .site-footer [class^="col-"] {
    margin-bottom: 30px;
  }
}
@media (max-width: 767px) {
  .site-footer {
    padding-bottom: 0;
  }
  .site-footer .copyright-text,
  .site-footer .social-icons {
    text-align: center;
  }
}
.social-icons {
  padding-left: 0;
  margin-bottom: 0;
  list-style: none;
}
.social-icons li {
  display: inline-block;
  margin-bottom: 4px;
}
.social-icons li.title {
  margin-right: 15px;
  text-transform: uppercase;
  color: #96a2b2;
  font-weight: 700;
  font-size: 13px;
}
.social-icons a {
  background-color: #eceeef;
  color: #818a91;
  font-size: 16px;
  display: inline-block;
  line-height: 44px;
  width: 44px;
  height: 44px;
  text-align: center;
  margin-right: 8px;
  border-radius: 100%;
  -webkit-transition: all 0.2s linear;
  -o-transition: all 0.2s linear;
  transition: all 0.2s linear;
}
.social-icons a:active,
.social-icons a:focus,
.social-icons a:hover {
  color: #fff;
  background-color: #29aafe;
}
.social-icons.size-sm a {
  line-height: 34px;
  height: 34px;
  width: 34px;
  font-size: 14px;
}
.social-icons a.facebook:hover {
  background-color: #3b5998;
}
.social-icons a.twitter:hover {
  background-color: #00aced;
}
.social-icons a.linkedin:hover {
  background-color: #007bb6;
}
.social-icons a.github:hover {
  background-color: #747474;
}
@media (max-width: 767px) {
  .social-icons li.title {
    display: block;
    margin-right: 0;
    font-weight: 600;
  }
}
</style>