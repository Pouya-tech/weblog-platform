import $ from "jquery";
window.$ = window.jQuery = $;

import select2 from "select2";
select2(); // اتصال توابع select2 به jQuery لود شده

// استایل Select2 را هم اگر با npm نصب کردی می‌توانید در SCSS یا اینجا ایمپورت کنی:
import "select2/dist/css/select2.min.css";

import "../scss/app.scss";
import "bootstrap";
import "./password-toggle";
