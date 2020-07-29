/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./components/jquery.min');
require('./bootstrap');
require('./components/datatables.min');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});


$(document).ready( function () {
    $('#searchZhanri').DataTable({
        "processing": true,
        "serverSide": true, "stateSave": true,
        "ajax":"/zhanret-list",
        "columns": [
          {"data":"titulli"},
          {"data":"created_at"},
          {"data": "Shto", "bSearchable": false}
        ],
        "language": {
          "lengthMenu": "Shfaq _MENU_ për faqe",
          "zeroRecords": "Nuk u gjet asnjë e dhënë",
          "info": "Duke shfaqur faqen _PAGE_ nga _PAGES_",
          "infoEmpty": "Nuk ka të dhëna",
          "infoFiltered": "(Të filtruar nga _MAX_ total)",
          "processing":     "Duke procesuar...",
          "search":         "",
          "paginate": {
            "first":      "Fillimi",
            "last":       "Fundi",
            "next":       "Para",
            "previous":   "Prapa"}
          }
        });

        $('#searchAutori').DataTable({
            "processing": true,
            "serverSide": true, "stateSave": true,
            "ajax":"/autoret-list",
            "columns": [
              {"data":"name"},
              {"data":"periudha"},
              {"data": "Shto", "bSearchable": false}
            ],
            "language": {
              "lengthMenu": "Shfaq _MENU_ për faqe",
              "zeroRecords": "Nuk u gjet asnjë e dhënë",
              "info": "Duke shfaqur faqen _PAGE_ nga _PAGES_",
              "infoEmpty": "Nuk ka të dhëna",
              "infoFiltered": "(Të filtruar nga _MAX_ total)",
              "processing":     "Duke procesuar...",
              "search":         "",
              "paginate": {
                "first":      "Fillimi",
                "last":       "Fundi",
                "next":       "Para",
                "previous":   "Prapa"}
              }
            });



});
