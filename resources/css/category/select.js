import $ from "jquery"; // حتماً اینجا هم ایمپورتش کن تا مطمئن باشی هست

$(document).ready(function () {
    $("#tags").select2({
        placeholder: "تگ‌های مرتبط را انتخاب کنید...",
        dir: "rtl",
        allowClear: true,
        width: "100%", // برای این‌که کل عرض فرم رو پر کنه
    });
});
