(window.webpackJsonp=window.webpackJsonp||[]).push([[15,10],{20:function(t,n,e){"use strict";e.d(n,"b",(function(){return r})),e.d(n,"c",(function(){return c})),e.d(n,"a",(function(){return o}));e(300),e(25);var r=function(time){var t=(window.currentTime||new Date)-new Date(time);return parseInt(parseInt(t/1e3,0)/60,0)<60?"".concat(Math.ceil(t/1e3/60)>0?Math.ceil(t/1e3/60):1,"分钟前"):parseInt(parseInt(parseInt(t/1e3,0)/60,0)/60,0)<16?"".concat(Math.ceil(t/1e3/60/60)>0?Math.ceil(t/1e3/60/60):1,"小时前"):time.replace(/T/," ").replace(/Z/,"").substring(0,16)},c=function(t){var n=t-Math.round(new Date/1e3);return parseInt(n/86400,0)},o=function(t){var n=Math.round(new Date(t)/1e3),e=Math.round(new Date/1e3)-n,r=parseInt(e/86400,0);return r>365?parseInt(e/86400/365,0)+"年":r+"天"}},55:function(t,n,e){e(9);var r=e(110);t.exports={mixins:[r],computed:{forums:function(){return this.$store.state.site.info.attributes||{}}},methods:{checkCaptcha:function(t){var n=this;return new Promise((function(e,r){if(n.forums&&n.forums.qcloud&&n.forums.qcloud.qcloud_captcha)return new TencentCaptcha(n.forums.qcloud.qcloud_captcha_app_id,(function(n){0===n.ret?(t.captcha_rand_str=n.randstr,t.captcha_ticket=n.ticket,e(t)):r(n)})).show();e(t)}))}}}}}]);