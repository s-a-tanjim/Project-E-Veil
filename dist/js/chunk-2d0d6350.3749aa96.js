(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-2d0d6350"],{7221:function(a,t,e){"use strict";e.r(t);var s=function(){var a=this,t=a.$createElement,e=a._self._c||t;return e("div",[e("Navbar",{tag:"component"}),e("div",{staticClass:"wrapper-body"},[e("Sidebar",{tag:"component"}),e("div",{staticClass:"body-container"},[1==a.noDataFlag?e("div",{staticClass:"row"},[a.from?e("div",{staticClass:"col-8"},[e("b",[a._v("From:")]),a._v(" "+a._s(a.from)+" ")]):e("div",{staticClass:"col-8"},[e("b",[a._v("To:")]),a._v(" "+a._s(a.to)+" ")]),e("div",{staticClass:"col-8"},[e("b",[a._v("Subject:")]),a._v(" "+a._s(a.subject)+" ")]),e("div",{staticClass:"col-8"},[e("b",[a._v("Message:")]),e("p",{staticStyle:{border:"1px solid #111","border-radius":"5px",padding:"20px 20px","margin-top":"10px"}},[a._v(a._s(a.message))])]),e("div",{staticClass:"col-8"},[e("b",[a._v("Received at:")]),e("p",[a._v(a._s(a.time+" "+a.date))])])]):a._e(),0==a.noDataFlag?e("div",[a._v("No data available")]):a._e(),null==a.noDataFlag?e("div",[a._v("Loading")]):a._e()])],1)],1)},i=[],o=e("8aa5"),n=e.n(o),l={props:["id","prev"],data:function(){return{message:"",subject:"",from:null,to:null,time:"",date:"",email:"",username:"",noDataFlag:null}},methods:{getData:function(){var a=this;this.email=n.a.auth().currentUser.email,this.username=this.email.substring(0,this.email.length-10);var t="emails/"+this.username;"outbox"==this.prev?t+="/sent/":"inbox"==this.prev?t+="/received/":"veilbox"==this.prev&&(t+="/veilbox/"),t+=this.id;var e=n.a.database().ref(t);e.on("value",(function(t){var e=t.val();null===e||void 0===e?a.noDataFlag=!1:(a.noDataFlag=!0,a.message=e.message,a.subject=e.subject,e.from&&(a.from=e.from),e.to&&(a.to=e.to),a.time=e.time,a.date=e.date)}),(function(a){console.log(a)}))}},created:function(){this.getData()},watch:{id:function(){this.getData()}}},r=l,c=e("2877"),d=Object(c["a"])(r,s,i,!1,null,"2da57b42",null);t["default"]=d.exports}}]);
//# sourceMappingURL=chunk-2d0d6350.3749aa96.js.map