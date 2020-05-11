export const routes = [{
    path: "/",
    name: "Welcome",
    component: () => import("./components/landing"),
    meta: {
      requiresGuest: true
    }
  }, {
    path: "/profile",
    name: "Profile",
    component: () => import("./components/account/profile_main"),
    meta: {
      requiresAuth: true
    }
  }, {
    path: "/settings",
    name: "Settings",
    component: () => import("./components/account/settings_main"),
    meta: {
      requiresAuth: true
    }
  },
  {
    path: "/compose",
    name: "Compose",
    component: () => import("./components/compose/compose_main"),
    meta: {
      requiresAuth: true
    }
  },
  {
    path: "/inbox",
    name: "Inbox",
    component: () => import("./components/inbox/inbox_main"),
    meta: {
      requiresAuth: true
    }
  },
  {
    path: "/sent",
    name: "Sent",
    component: () => import("./components/outbox/outbox_main"),
    meta: {
      requiresAuth: true
    }
  },
  {
    path: "/veilbox",
    name: "Veilbox",
    component: () => import("./components/veilbox/veilbox_main"),
    meta: {
      requiresAuth: true
    }
  },
  {
    path: "/bin",
    name: "Bin",
    component: () => import("./components/binbox/binbox_main"),
    meta: {
      requiresAuth: true
    }
  },
  {
    path: "/message/:id/:prev/",
    name: "Message",
    component: () => import('./components/message/message_main'),
    meta: {
      requiresAuth: true
    },
    props: true
  },
  {
    path: '/*',
    component: () => import('./components/not_found404'),
    meta: {
      requiresGuest: true
    }
  }
]