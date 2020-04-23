exports.variable = {
  nav: [{
      path: "/",
      name: "Welcome",
      img_url: "#",
      Component: "landing-component",
      import: "./components/landing",
      componentFilePath: "./components/landing.vue",
      meta: {
        requiresGuest: true
      }
    },
    {
      path: "/profile",
      name: "Profile",
      fontawesome_class: "",
      Component: "profile-component",
      import: "./components/account/profile_main",
      componentFilePath: "./components/account/profile_main.vue",
      meta: {
        requiresAuth: true
      }
    },
    {
      path: "/settings",
      name: "Settings",
      fontawesome_class: "",
      Component: "settings-component",
      import: "./components/account/settings_main",
      componentFilePath: "./components/account/settings_main.vue",
      meta: {
        requiresAuth: true
      }
    }
  ],
  sidebar: [{
      path: "/compose",
      name: "Compose",
      fontawesome_class: "fas fa-pencil-alt",
      Component: "compose-component",
      import: "./components/compose/compose_main",
      componentFilePath: "./components/compose/compose_main.vue",
      meta: {
        requiresAuth: true
      }
    },
    {
      path: "/inbox",
      name: "Inbox",
      fontawesome_class: "fas fa-envelope",
      Component: "inbox-component",
      import: "./components/inbox/inbox_main",
      componentFilePath: "./components/inbox/inbox_main.vue",
      meta: {
        requiresAuth: true
      }
    },
    {
      path: "/sent",
      name: "Sent",
      fontawesome_class: "fas fa-paper-plane",
      Component: "outbox-component",
      import: "./components/outbox/outbox_main",
      componentFilePath: "./components/outbox/outbox_main.vue",
      meta: {
        requiresAuth: true
      }
    },
    {
      path: "/veilbox",
      name: "Veilbox",
      fontawesome_class: "fas fa-mask",
      Component: "veilbox-component",
      import: "./components/veilbox/veilbox_main",
      componentFilePath: "./components/veilbox/veilbox_main.vue",
      meta: {
        requiresAuth: true
      }
    },
    {
      path: "/bin",
      name: "Bin",
      fontawesome_class: "fas fa-trash-alt",
      Component: "binbox-component",
      import: "./components/binbox/binbox_main",
      componentFilePath: "./components/binbox/binbox_main.vue",
      meta: {
        requiresAuth: true
      }
    }
  ],
};