(function(e){function t(t){for(var a,o,i=t[0],c=t[1],u=t[2],l=0,d=[];l<i.length;l++)o=i[l],Object.prototype.hasOwnProperty.call(r,o)&&r[o]&&d.push(r[o][0]),r[o]=0;for(a in c)Object.prototype.hasOwnProperty.call(c,a)&&(e[a]=c[a]);m&&m(t);while(d.length)d.shift()();return s.push.apply(s,u||[]),n()}function n(){for(var e,t=0;t<s.length;t++){for(var n=s[t],a=!0,o=1;o<n.length;o++){var i=n[o];0!==r[i]&&(a=!1)}a&&(s.splice(t--,1),e=c(c.s=n[0]))}return e}var a={},o={app:0},r={app:0},s=[];function i(e){return c.p+"js/"+({}[e]||e)+"."+{"chunk-1ecfa2be":"364eab36","chunk-2d0e9578":"1e3b7191","chunk-2d217335":"bc926b91","chunk-2d22d094":"fb4ecc13","chunk-67c94f70":"f3299bba","chunk-1f451b20":"794056f7","chunk-2d0aad78":"464115ad","chunk-2d0d6350":"3749aa96","chunk-3d8a8c6e":"ca41eafc","chunk-447d4303":"fc4655ae","chunk-4f54b757":"75cc0cc5","chunk-7603fba0":"58f63820"}[e]+".js"}function c(t){if(a[t])return a[t].exports;var n=a[t]={i:t,l:!1,exports:{}};return e[t].call(n.exports,n,n.exports,c),n.l=!0,n.exports}c.e=function(e){var t=[],n={"chunk-67c94f70":1,"chunk-1f451b20":1,"chunk-3d8a8c6e":1,"chunk-447d4303":1,"chunk-4f54b757":1,"chunk-7603fba0":1};o[e]?t.push(o[e]):0!==o[e]&&n[e]&&t.push(o[e]=new Promise((function(t,n){for(var a="css/"+({}[e]||e)+"."+{"chunk-1ecfa2be":"31d6cfe0","chunk-2d0e9578":"31d6cfe0","chunk-2d217335":"31d6cfe0","chunk-2d22d094":"31d6cfe0","chunk-67c94f70":"d3e666c8","chunk-1f451b20":"4e314bdf","chunk-2d0aad78":"31d6cfe0","chunk-2d0d6350":"31d6cfe0","chunk-3d8a8c6e":"f8ed0779","chunk-447d4303":"cc145231","chunk-4f54b757":"95623069","chunk-7603fba0":"17147070"}[e]+".css",r=c.p+a,s=document.getElementsByTagName("link"),i=0;i<s.length;i++){var u=s[i],l=u.getAttribute("data-href")||u.getAttribute("href");if("stylesheet"===u.rel&&(l===a||l===r))return t()}var d=document.getElementsByTagName("style");for(i=0;i<d.length;i++){u=d[i],l=u.getAttribute("data-href");if(l===a||l===r)return t()}var m=document.createElement("link");m.rel="stylesheet",m.type="text/css",m.onload=t,m.onerror=function(t){var a=t&&t.target&&t.target.src||r,s=new Error("Loading CSS chunk "+e+" failed.\n("+a+")");s.code="CSS_CHUNK_LOAD_FAILED",s.request=a,delete o[e],m.parentNode.removeChild(m),n(s)},m.href=r;var p=document.getElementsByTagName("head")[0];p.appendChild(m)})).then((function(){o[e]=0})));var a=r[e];if(0!==a)if(a)t.push(a[2]);else{var s=new Promise((function(t,n){a=r[e]=[t,n]}));t.push(a[2]=s);var u,l=document.createElement("script");l.charset="utf-8",l.timeout=120,c.nc&&l.setAttribute("nonce",c.nc),l.src=i(e);var d=new Error;u=function(t){l.onerror=l.onload=null,clearTimeout(m);var n=r[e];if(0!==n){if(n){var a=t&&("load"===t.type?"missing":t.type),o=t&&t.target&&t.target.src;d.message="Loading chunk "+e+" failed.\n("+a+": "+o+")",d.name="ChunkLoadError",d.type=a,d.request=o,n[1](d)}r[e]=void 0}};var m=setTimeout((function(){u({type:"timeout",target:l})}),12e4);l.onerror=l.onload=u,document.head.appendChild(l)}return Promise.all(t)},c.m=e,c.c=a,c.d=function(e,t,n){c.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},c.r=function(e){"undefined"!==typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},c.t=function(e,t){if(1&t&&(e=c(e)),8&t)return e;if(4&t&&"object"===typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(c.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var a in e)c.d(n,a,function(t){return e[t]}.bind(null,a));return n},c.n=function(e){var t=e&&e.__esModule?function(){return e["default"]}:function(){return e};return c.d(t,"a",t),t},c.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},c.p="/",c.oe=function(e){throw console.error(e),e};var u=window["webpackJsonp"]=window["webpackJsonp"]||[],l=u.push.bind(u);u.push=t,u=u.slice();for(var d=0;d<u.length;d++)t(u[d]);var m=l;s.push([0,"chunk-vendors"]),n()})({0:function(e,t,n){e.exports=n("56d7")},1261:function(e,t,n){"use strict";n.r(t);var a=n("8aa5"),o=n.n(a),r=(n("e71f"),n("1543")),s=o.a.initializeApp(r["default"]);t["default"]=s.firestore()},1543:function(e,t,n){"use strict";n.r(t),t["default"]={apiKey:"AIzaSyCn_joi3Mjky9IbXBhxl4J8Ngc9G0HBm2o",authDomain:"e-veil.firebaseapp.com",databaseURL:"https://e-veil.firebaseio.com",projectId:"e-veil",storageBucket:"e-veil.appspot.com",messagingSenderId:"1002308855640",appId:"1:1002308855640:web:1e5d0e74edef54f8c9a72d"}},"3dfd":function(e,t,n){"use strict";n.r(t);var a=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",{attrs:{id:"app"}},[n("keep-alive",[n("router-view")],1)],1)},o=[],r={name:"App",components:{}},s=r,i=n("2877"),c=Object(i["a"])(s,a,o,!1,null,null,null);t["default"]=c.exports},5665:function(e,t){t.variable={nav:[{path:"/",name:"Welcome",img_url:"#",Component:"landing-component",import:"./components/landing",componentFilePath:"./components/landing.vue",meta:{requiresGuest:!0}},{path:"/profile",name:"Profile",fontawesome_class:"",Component:"profile-component",import:"./components/account/profile_main",componentFilePath:"./components/account/profile_main.vue",meta:{requiresAuth:!0}},{path:"/settings",name:"Settings",fontawesome_class:"",Component:"settings-component",import:"./components/account/settings_main",componentFilePath:"./components/account/settings_main.vue",meta:{requiresAuth:!0}}],sidebar:[{path:"/compose",name:"Compose",fontawesome_class:"fas fa-pencil-alt",Component:"compose-component",import:"./components/compose/compose_main",componentFilePath:"./components/compose/compose_main.vue",meta:{requiresAuth:!0}},{path:"/inbox",name:"Inbox",fontawesome_class:"fas fa-envelope",Component:"inbox-component",import:"./components/inbox/inbox_main",componentFilePath:"./components/inbox/inbox_main.vue",meta:{requiresAuth:!0}},{path:"/sent",name:"Sent",fontawesome_class:"fas fa-paper-plane",Component:"outbox-component",import:"./components/outbox/outbox_main",componentFilePath:"./components/outbox/outbox_main.vue",meta:{requiresAuth:!0}},{path:"/veilbox",name:"Veilbox",fontawesome_class:"fas fa-mask",Component:"veilbox-component",import:"./components/veilbox/veilbox_main",componentFilePath:"./components/veilbox/veilbox_main.vue",meta:{requiresAuth:!0}},{path:"/bin",name:"Bin",fontawesome_class:"fas fa-trash-alt",Component:"binbox-component",import:"./components/binbox/binbox_main",componentFilePath:"./components/binbox/binbox_main.vue",meta:{requiresAuth:!0}}]}},"56d7":function(e,t,n){"use strict";n.r(t);n("4160"),n("45fc"),n("d3b7"),n("159b"),n("e260"),n("e6cf"),n("cca6"),n("a79d");var a=n("2b0e"),o=n("3dfd"),r=n("8c4f"),s=n("caf9"),i=n("8aa5"),c=n.n(i),u=n("654d");a["a"].use(r["a"]),a["a"].use(s["a"]),n("1261"),a["a"].component("Sidebar",n("684d").default),a["a"].component("Navbar",n("9d8d").default),window.GLOBAL_VALUE=n("5665");var l=[];window.GLOBAL_VALUE.variable.nav.forEach((function(e){var t=function(){return n("d43f")(e.import+"")},a={path:e.path+"",component:t,meta:e.meta};l.push(a)})),window.GLOBAL_VALUE.variable.sidebar.forEach((function(e){var t=function(){return n("d43f")(e.import+"")},a={path:e.path+"",component:t,meta:e.meta};l.push(a)}));var d=function(){return n.e("chunk-2d0d6350").then(n.bind(null,"7221"))},m={path:"/message/:id/:prev/",component:d,meta:{requiresAuth:!0},props:!0};l.push(m),l.push({path:"/*",component:u["default"]});var p,f=new r["a"]({mode:"history",routes:l});f.beforeEach((function(e,t,n){e.matched.some((function(e){return e.meta.requiresAuth}))?c.a.auth().currentUser?n():n({path:"/",query:{redirect:e.fullPath}}):n()})),a["a"].config.productionTip=!1,c.a.auth().onAuthStateChanged((function(){p||(p=new a["a"]({render:function(e){return e(o["default"])},router:f}).$mount("#app"))}))},"63a5":function(e,t,n){"use strict";var a=n("947a"),o=n.n(a);o.a},"654d":function(e,t,n){"use strict";n.r(t);var a=function(){var e=this,t=e.$createElement;e._self._c;return e._m(0)},o=[function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",{staticStyle:{"text-align":"center"}},[n("img",{staticStyle:{width:"80%"},attrs:{src:"/img/404.gif"}})])}],r={},s=r,i=n("2877"),c=Object(i["a"])(s,a,o,!1,null,null,null);t["default"]=c.exports},"684d":function(e,t,n){"use strict";n.r(t);var a=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",[n("ul",{staticClass:"sidebar navbar-nav"},[n("li",{staticClass:"nav-item",staticStyle:{"text-align":"right","padding-right":"10px"}},[n("button",{staticClass:"btn btn-link btn-sm order-1 order-sm-0",attrs:{id:"sidebarToggle"},on:{click:e.toggleDisplay}},[n("i",{staticClass:"fas fa-arrow-left",attrs:{id:"left-arrow-id"}}),n("i",{staticClass:"fas fa-arrow-right toggle-display",attrs:{id:"right-arrow-id"}})])]),e._l(e.nav_link,(function(t,a){return n("li",{key:a,staticClass:"nav-item"},["Account"!=t.name?n("router-link",{staticClass:"nav-link",attrs:{to:t.path}},[n("i",{class:t.fontawesome_class}),n("span",[e._v(e._s(t.name))])]):e._e()],1)})),n("li",{staticClass:"nav-item dropdown"},[e._m(0),n("div",{staticClass:"dropdown-menu",attrs:{"aria-labelledby":"pagesDropdown"}},[n("router-link",{staticClass:"dropdown-item",attrs:{to:"/profile"}},[e._v("Profile")]),n("router-link",{staticClass:"dropdown-item",attrs:{to:"/settings"}},[e._v("Account Settings")]),n("router-link",{staticClass:"dropdown-item",attrs:{to:"/forget_password"}},[e._v("Forgot Password")])],1)])],2)])},o=[function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("a",{staticClass:"nav-link dropdown-toggle",attrs:{href:"#",id:"pagesDropdown",role:"button","data-toggle":"dropdown","aria-haspopup":"true","aria-expanded":"false"}},[n("i",{staticClass:"far fa-address-card"}),n("span",[e._v("Account")])])}],r={data:function(){return{nav_link:window.GLOBAL_VALUE.variable.sidebar}},methods:{toggleDisplay:function(){var e=document.getElementById("left-arrow-id");e.classList.toggle("toggle-display"),e=document.getElementById("right-arrow-id"),e.classList.toggle("toggle-display")}}},s=r,i=(n("63a5"),n("2877")),c=Object(i["a"])(s,a,o,!1,null,"49879b28",null);t["default"]=c.exports},"90b2":function(e,t,n){"use strict";var a=n("f95a"),o=n.n(a);o.a},"947a":function(e,t,n){},"9d8d":function(e,t,n){"use strict";n.r(t);var a=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",[n("nav",{staticClass:"navbar navbar-expand navbar-dark bg-dark static-top"},[n("router-link",{staticClass:"navbar-brand mr-1",staticStyle:{"letter-spacing":"2px"},attrs:{to:"/"}},[n("i",{staticClass:"fas fa-user-secret",staticStyle:{"margin-right":"6px"}}),e._v("E-Veil ")]),e._m(0),n("ul",{staticClass:"navbar-nav ml-auto ml-md-0"},[n("li",{staticClass:"nav-item dropdown no-arrow"},[e._m(1),n("div",{staticClass:"dropdown-menu dropdown-menu-right",attrs:{"aria-labelledby":"userDropdown"}},[n("router-link",{staticClass:"dropdown-item",attrs:{to:"/profile"}},[e._v("Profile")]),n("div",{staticClass:"dropdown-divider"}),n("a",{staticClass:"dropdown-item",attrs:{href:"#","data-toggle":"modal","data-target":"#logoutModal"}},[e._v("Logout")])],1)])])],1),n("div",{staticClass:"modal fade",attrs:{id:"logoutModal",tabindex:"-1",role:"dialog","aria-labelledby":"exampleModalLabel","aria-hidden":"true"}},[n("div",{staticClass:"modal-dialog",attrs:{role:"document"}},[n("div",{staticClass:"modal-content"},[e._m(2),n("div",{staticClass:"modal-body"},[e._v('Select "Logout" below if you are ready to end your current session.')]),n("div",{staticClass:"modal-footer"},[n("button",{staticClass:"eveilbtn btn-secondary",attrs:{type:"button","data-dismiss":"modal"}},[e._v("Cancel")]),n("a",{staticClass:"eveilbtn",staticStyle:{"text-decoration":"none"},attrs:{href:"#"},on:{click:e.logout_submit}},[e._v("Logout")])])])])])])},o=[function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("form",{staticClass:"d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"},[n("div",{staticClass:"input-group"},[n("input",{staticClass:"form-control",attrs:{type:"text",placeholder:"Search for...","aria-label":"Search","aria-describedby":"basic-addon2"}}),n("div",{staticClass:"input-group-append"},[n("button",{staticClass:"btn btn-primary",attrs:{type:"button"}},[n("i",{staticClass:"fas fa-search"})])])])])},function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("a",{staticClass:"nav-link dropdown-toggle",attrs:{href:"#",id:"userDropdown",role:"button","data-toggle":"dropdown","aria-haspopup":"true","aria-expanded":"false"}},[n("i",{staticClass:"fas fa-user-circle fa-fw"})])},function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",{staticClass:"modal-header"},[n("h5",{staticClass:"modal-title",attrs:{id:"exampleModalLabel"}},[e._v("Ready to Leave?")]),n("button",{staticClass:"close",attrs:{type:"button","data-dismiss":"modal",id:"logout-modal-close-btn","aria-label":"Close"}},[n("span",{attrs:{"aria-hidden":"true"}},[e._v("×")])])])}],r=n("8aa5"),s=n.n(r),i={methods:{logout_submit:function(){var e=this;s.a.auth().signOut().then((function(){document.getElementById("logout-modal-close-btn").click(),e.$router.push("/")}))}}},c=i,u=(n("90b2"),n("2877")),l=Object(u["a"])(c,a,o,!1,null,"82f3b5a6",null);t["default"]=l.exports},d43f:function(e,t,n){var a={"./App":["3dfd",9],"./App.vue":["3dfd",9],"./components/account/profile_main":["c168",9,"chunk-4f54b757"],"./components/account/profile_main.vue":["c168",9,"chunk-4f54b757"],"./components/account/settings_main":["1377",9,"chunk-2d0aad78"],"./components/account/settings_main.vue":["1377",9,"chunk-2d0aad78"],"./components/binbox/binbox_main":["1f47",9,"chunk-1ecfa2be","chunk-67c94f70"],"./components/binbox/binbox_main.vue":["1f47",9,"chunk-1ecfa2be","chunk-67c94f70"],"./components/compose/compose_main":["f8bb",9,"chunk-447d4303"],"./components/compose/compose_main.vue":["f8bb",9,"chunk-447d4303"],"./components/inbox/inbox_main":["c65a",9,"chunk-1ecfa2be","chunk-2d217335"],"./components/inbox/inbox_main.vue":["c65a",9,"chunk-1ecfa2be","chunk-2d217335"],"./components/landing":["b981",9,"chunk-3d8a8c6e"],"./components/landing.vue":["b981",9,"chunk-3d8a8c6e"],"./components/login":["1954",9,"chunk-1f451b20"],"./components/login.vue":["1954",9,"chunk-1f451b20"],"./components/message/message_main":["7221",9,"chunk-2d0d6350"],"./components/message/message_main.vue":["7221",9,"chunk-2d0d6350"],"./components/navbar":["9d8d",9],"./components/navbar.vue":["9d8d",9],"./components/not_found404":["654d",9],"./components/not_found404.vue":["654d",9],"./components/outbox/outbox_main":["8cb9",9,"chunk-1ecfa2be","chunk-2d0e9578"],"./components/outbox/outbox_main.vue":["8cb9",9,"chunk-1ecfa2be","chunk-2d0e9578"],"./components/sidebar":["684d",9],"./components/sidebar.vue":["684d",9],"./components/signup":["6cd2",9,"chunk-7603fba0"],"./components/signup.vue":["6cd2",9,"chunk-7603fba0"],"./components/veilbox/veilbox_main":["f67e",9,"chunk-1ecfa2be","chunk-2d22d094"],"./components/veilbox/veilbox_main.vue":["f67e",9,"chunk-1ecfa2be","chunk-2d22d094"],"./firebaseConfig":["1543",9],"./firebaseConfig.js":["1543",9],"./firebaseInit":["1261",9],"./firebaseInit.js":["1261",9],"./main":["56d7",9],"./main.js":["56d7",9],"./routes":["5665",7],"./routes.js":["5665",7]};function o(e){if(!n.o(a,e))return Promise.resolve().then((function(){var t=new Error("Cannot find module '"+e+"'");throw t.code="MODULE_NOT_FOUND",t}));var t=a[e],o=t[0];return Promise.all(t.slice(2).map(n.e)).then((function(){return n.t(o,t[1])}))}o.keys=function(){return Object.keys(a)},o.id="d43f",e.exports=o},f95a:function(e,t,n){}});
//# sourceMappingURL=app.70b2822d.js.map