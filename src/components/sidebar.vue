<template>
  <div>
    <ul class="sidebar navbar-nav">
      <li class="nav-item" style="text-align:right;padding-right:10px;">
        <button
          class="btn btn-link btn-sm order-1 order-sm-0"
          id="sidebarToggle"
          @click="toggleDisplay"
        >
          <i class="fas fa-arrow-left" id="left-arrow-id"></i>
          <i class="fas fa-arrow-right toggle-display" id="right-arrow-id"></i>
        </button>
      </li>
      <li class="nav-item">
        <router-link to="/compose" class="nav-link">
          <i class="fas fa-pencil-alt"></i>
          <span>Compose</span>
        </router-link>
        <router-link to="/inbox" class="nav-link">
          <i class="fas fa-envelope"></i>
          <span>Inbox</span>
        </router-link>
        <router-link to="/sent" class="nav-link">
          <i class="fas fa-paper-plane"></i>
          <span>Sent</span>
        </router-link>
        <router-link to="/veilbox" class="nav-link">
          <i class="fas fa-mask"></i>
          <span>Veilbox</span>
        </router-link>
        <router-link to="/bin" class="nav-link">
          <i class="fas fa-trash-alt"></i>
          <span>Bin</span>
        </router-link>
      </li>
      <li class="nav-item dropdown">
        <a
          class="nav-link dropdown-toggle"
          href="#"
          id="pagesDropdown"
          role="button"
          data-toggle="dropdown"
          aria-haspopup="true"
          aria-expanded="false"
        >
          <i class="far fa-address-card"></i>
          <span>Account</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <router-link class="dropdown-item" to="/profile">Profile</router-link>
          <router-link class="dropdown-item" to="/settings">Account Settings</router-link>
          <router-link class="dropdown-item" to="/forget_password">Forgot Password</router-link>
        </div>
      </li>
    </ul>
  </div>
</template>
<script>
export default {
  data: function() {
    return {};
  },
  methods: {
    toggleDisplay() {
      var element = document.getElementById("left-arrow-id");
      element.classList.toggle("toggle-display");
      element = document.getElementById("right-arrow-id");
      element.classList.toggle("toggle-display");
    }
  }
};
</script>
<style scoped>
.toggle-display {
  display: none;
}

span {
  margin-left: 5px;
}

#sidebarToggle {
  font-size: 20px;
  color: #c7c8c9;
}

.sidebar {
  width: 70px !important;
  background-color: #212529;
  min-height: calc(100vh - 56px);
}

.sidebar .nav-item:last-child {
  margin-bottom: 1rem;
}

.sidebar .nav-item .nav-link {
  text-align: center;
  padding: 0.75rem 0.1rem;
  width: 65px;
}

.sidebar .nav-item .nav-link span {
  font-size: 0.65rem;
  display: block;
}

.sidebar .nav-item .dropdown-menu {
  position: absolute !important;
  -webkit-transform: none !important;
  transform: none !important;
  left: calc(90px + 0.5rem) !important;
  margin: 0;
}

.sidebar .nav-item .dropdown-menu.dropup {
  bottom: 0;
  top: auto !important;
}

.sidebar .nav-item.dropdown .dropdown-toggle::after {
  display: inline-block;
}

.sidebar .nav-item .nav-link {
  color: rgba(255, 255, 255, 0.5);
}

.sidebar .nav-item .nav-link:active,
.sidebar .nav-item .nav-link:focus,
.sidebar .nav-item .nav-link:hover {
  color: rgba(255, 255, 255, 0.75);
}

.sidebar.toggled {
  width: 0 !important;
  overflow: hidden;
}

@media (min-width: 768px) {
  .sidebar {
    width: 225px !important;
  }

  .sidebar .nav-item .nav-link {
    display: block;
    width: 100%;
    text-align: left;
    padding: 1rem;
    width: 225px;
  }

  .sidebar .nav-item .nav-link span {
    font-size: 1rem;
    display: inline;
  }

  .sidebar .nav-item .dropdown-menu {
    position: static !important;
    margin: 0 1rem;
    top: 0;
  }

  .sidebar .nav-item.dropdown .dropdown-toggle::after {
    display: inline-block;
  }

  .sidebar.toggled {
    overflow: visible;
    width: 90px !important;
  }

  .sidebar.toggled .nav-item:last-child {
    margin-bottom: 1rem;
  }

  .sidebar.toggled .nav-item .nav-link {
    text-align: center;
    padding: 0.75rem 1rem;
    width: 90px;
  }

  .sidebar.toggled .nav-item .nav-link span {
    font-size: 0.65rem;
    display: block;
  }

  .sidebar.toggled .nav-item .dropdown-menu {
    position: absolute !important;
    -webkit-transform: none !important;
    transform: none !important;
    left: calc(90px + 0.5rem) !important;
    margin: 0;
  }

  .sidebar.toggled .nav-item .dropdown-menu.dropup {
    bottom: 0;
    top: auto !important;
  }

  .sidebar.toggled .nav-item.dropdown .dropdown-toggle::after {
    display: none;
  }
}

body.sidebar-toggled footer.sticky-footer {
  width: 100%;
}

@media (min-width: 768px) {
  body.sidebar-toggled footer.sticky-footer {
    width: calc(100% - 90px);
  }
}
</style>