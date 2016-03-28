/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function js_task1() {
    var v1 = (new Date() - new Date("06/23/1996").setUTCHours(0, 0, 0));
    v1 /= 604800000;
    return Math.floor(v1);
}
function js_task2() {
    var nowTime = new Date();
    var time = new Date();
    time.setDate(1);
    time.setMonth(0);
    if ((nowTime - time) <= 0)
        time.setFullYear(nowTime.getFullYear() - 1);
    alert((nowTime - time) / 86400000);
}

function js_task3() {
    var date = new Date();
    console.log(date.getHours() + ":" + date.getMinutes());
}
function dayMonth(month) {
    var here = new Date();
    here.setMonth(month);
    here.setDate(32);
    return (32 - here.getDate());
}
function js_task4() {
    str = "";
    var temp = new Date();
    var options = {
        month: 'long'
    };
    for (i = 0; i < 12; i++) {
        if (dayMonth(i) < 31) {
            temp.setMonth(i);
            str += temp.toLocaleString("ru", options) + "/";
        }
    }
    alert(str);
}