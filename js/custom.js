(function ($) {
  'use strict';
  $(function () {
    custom();
    datatable();
    buttonListener();
    // User API
    createUser();
    readUser();
    loginUser();
    // Aircraft API
    createAircraft();
    readAircraft();
    // Flight API
    createFlight();
    readFlight();
    // Time API
    fillTimeManagement();
  });
})(jQuery);

function custom() {
  // var start = moment().subtract(29, 'days');
  var start = moment();
  var end = moment();

  function cb(start, end) {
      $('#income-expense-summary-chart-daterange input').val(start.format('YYYY/MM/DD HH:mm:ss') + ' - ' + end.format('DD/MM/YYY HH:mm:ss'));
      $('#income-expense-summary-chart-daterange-modal input').val(start.format('YYYY/MM/DD HH:mm:ss') + ' - ' + end.format('YYYY/MM/DD HH:mm:ss'));
      $('#income-expense-summary-chart-daterange-update-modal input').val(start.format('YYYY/MM/DD HH:mm:ss') + ' - ' + end.format('YYYY/MM/DD HH:mm:ss'));
  }

  $('#income-expense-summary-chart-daterange').daterangepicker({
    timePicker: true,
    locale: {
      format: 'YYYY/MM/DD HH:mm:ss'
    },
  }, cb);

  $('#income-expense-summary-chart-daterange-modal').daterangepicker({
    parentEl: "#exampleModalAddFlight .modal-body",
    timePicker: true,
    locale: {
      format: 'YYYY/MM/DD HH:mm:ss'
    },
  }, cb);

  $('#income-expense-summary-chart-daterange-update-modal').daterangepicker({
    parentEl: "#exampleModalUpdateFlight .modal-body",
    timePicker: true,
    locale: {
      format: 'YYYY/MM/DD HH:mm:ss'
    },
  }, cb);

  cb(start, end);
}

function datatable() {
  $(document).ready(function() {
    $('#dataTable').DataTable();
  });
}

function createUser() {
  $('.btn-add-user').click(function(e) {
    var full_name = $('#full-name').val();
    var contact_number = $('#contact-number').val();
    var address = $('#address').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var status = $('#status').val();
        
    $.ajax({
        url: '../api/user/create.php',
        type: 'POST',
        contentType: "application/json",
        dataType: "json",
        data: JSON.stringify({ full_name: full_name, contact_number: contact_number, address: address, email: email, password: password, status: status }),
        success: function (data) {
          $('#exampleModalAddUser').modal('toggle');
          $('#exampleModalAddUser').find('form').trigger('reset');
          $('#dataTableUser').DataTable().ajax.reload(); 
        },
        error: function (jqXHR, textStatus, errorThrown) { alert('Something went wrong.'); }
    });
  })
}

var user_id_glob;
function readUser() {
  var dataTableUser = $('#dataTableUser').DataTable({
    "columnDefs": [
      {
        "targets": 6,
        "sortable": false
      },
      {
        "targets": [0],
        "visible": false,
        "searchable": false
      }
    ],
    "ajax": {
      url: '../api/user/read.php',
      dataSrc: ""
    },
    columns: [
      { "data": "id" },
      { "data": "full_name" },
      { "data": "contact_number" },
      { "data": "address" },
      { "data": "email" },
      { "data": "status" },
      {
        data: null,
        defaultContent: "<button type='button' class='btn btn-primary btn-rounded btn-sm dt-edit btn-update-user' style='margin-right:5px;'><span class='icon-pencil' aria-hidden='true'></span></button><button type='button' class='btn btn-danger btn-rounded btn-sm btn-delete-user'><span class='icon-trash' aria-hidden='true'></span></button>"
      }
    ]
  });

  $("#dataTableUser").on("click", ".btn-update-user", function(e) {
    user_id_glob = dataTableUser.row($(this).parents('tr')).data()["id"];
    $.ajax({
      url: '../api/user/read_single.php',
      type: 'POST',
      contentType: "application/json",
      dataType: "json",
      data: JSON.stringify({ id: user_id_glob }),
      success: function (data) {
        $('#full-name-update').val(data[0].full_name);
        $('#contact-number-update').val(data[0].contact_number);
        $('#address-update').val(data[0].address);
        $('#email-update').val(data[0].email);
        $('#status-update').val(data[0].status);
        $('#exampleModalUpdateUser').modal('show');
      },
      error: function (jqXHR, textStatus, errorThrown) { alert('Something went wrong.'); }
    });
  });

  $("#dataTableUser").on("click", ".btn-delete-user", function(e) {
    user_id_glob = dataTableUser.row($(this).parents('tr')).data()["id"];
    var full_name = dataTableUser.row($(this).parents('tr')).data()["full_name"];
    $('#exampleModalDeleteUser').find('.modal-body-delete').append('Are you sure you want to delete user <strong>' + full_name + '</strong>?');
    $('#exampleModalDeleteUser').modal('show');
  });

  $('#exampleModalDeleteUser').on('hidden.bs.modal', function () {
    $('#exampleModalDeleteUser').find('.modal-body-delete').text('');
  })
}

function createAircraft() {
  $('.btn-add-aircraft').click(function(e) {
    var aircraft_code = $('#aircraft-code').val();
    var aircraft_name = $('#aircraft-name').val();
    var reg_no = $('#reg-no').val();
    var model = $('#model').val();
    var pilot = $('#pilot').val();
        
    $.ajax({
        url: '../api/aircraft/create.php',
        type: 'POST',
        contentType: "application/json",
        dataType: "json",
        data: JSON.stringify({ code: aircraft_code, name: aircraft_name, reg_no: reg_no, model: model, pilot: pilot }),
        success: function (data) {
          $('#exampleModalAddAircraft').modal('toggle');
          $('#exampleModalAddAircraft').find('form').trigger('reset');
          $('#dataTableAircraft').DataTable().ajax.reload(); 
        },
        error: function (jqXHR, textStatus, errorThrown) { alert('Something went wrong.'); }
    });
    
    $.ajax({
        url: '../api/time/create.php',
        type: 'POST',
        contentType: "application/json",
        dataType: "json",
        data: JSON.stringify({ aircraft: aircraft_name, aircraft_regno: reg_no, status: 0 }),
        success: function (data) {
          return true;
        }
    });
  })
}

var aircraft_id_glob;
function readAircraft() {
  var dataTableAircraft = $('#dataTableAircraft').DataTable({
    dom: 'lBfrtip',
    buttons: [
        {
          extend: 'excel',
          exportOptions: {
              columns: [ 1, 2, 3, 4 ]
          }
        }
    ],
    "columnDefs": [
      {
        "targets": 3,
        "sortable": false
      },
      {
        "targets": [0],
        "visible": false,
        "searchable": false
      }
    ],
    "ajax": {
      url: '../api/aircraft/read.php',
      dataSrc: ""
    },
    columns: [
      { "data": "id" },
      { "data": "code" },
      { "data": "name" },
      { "data": "reg_no" },
      { "data": "model" },
      { "data": "pilot" },
      {
        data: null,
        defaultContent: "<button type='button' class='btn btn-primary btn-rounded btn-sm dt-edit btn-update-aircraft' style='margin-right:5px;'><span class='icon-pencil' aria-hidden='true'></span></button><button type='button' class='btn btn-danger btn-rounded btn-sm btn-delete-aircraft'><span class='icon-trash' aria-hidden='true'></span></button>"
      }
    ]
  });

  $("#dataTableAircraft").on("click", ".btn-update-aircraft", function(e) {
    aircraft_id_glob = dataTableAircraft.row($(this).parents('tr')).data()["id"];
    $.ajax({
      url: '../api/aircraft/read_single.php',
      type: 'POST',
      contentType: "application/json",
      dataType: "json",
      data: JSON.stringify({ id: aircraft_id_glob }),
      success: function (data) {
        $('#aircraft-name-update').val(data[0].name);
        $('#aircraft-code-update').val(data[0].code);
        $('#reg-no-update').val(data[0].reg_no);
        $('#model-update').val(data[0].model);
        $('#pilot_update').val(data[0].pilot);
        $('#exampleModalUpdateAircraft').modal('show');
      },
      error: function (jqXHR, textStatus, errorThrown) { alert('Something went wrong.'); }
    });
  });

  $("#dataTableAircraft").on("click", ".btn-delete-aircraft", function(e) {
    aircraft_id_glob = dataTableAircraft.row($(this).parents('tr')).data()["id"];
    var full_name = dataTableAircraft.row($(this).parents('tr')).data()["reg_no"];
    $('#exampleModalDeleteAircraft').find('.modal-body-delete').append('Are you sure you want to delete aircraft <strong>' + full_name + '</strong>?');
    $('#exampleModalDeleteAircraft').modal('show');
  });

  $('#exampleModalDeleteAircraft').on('hidden.bs.modal', function () {
    $('#exampleModalDeleteAircraft').find('.modal-body-delete').text('');
  })
}

function createFlight() {
  $('.btn-add-flight').click(function(e) {
    var airline_name = $('#airline_name').val();
    var classification = $('#classification').val();
    var take_off_landing = $('#take_off_landing').val();
    var fields = take_off_landing.split(' - ');
    var take_off = fields[0].replace(/\//g, '-');
    var landing = fields[1].replace(/\//g, '-');
    var parking = $('#parking').val();
    var nature = $('#nature').val();
    var flight_no = $('#flight_no').val();
    var origin = $('#origin').val();
    var destination = $('#destination').val();
    var type = $('#type').val();
    var reg_no = $('#reg_no').val();
    var owner = $('#owner').val();
    var arrival = $('#arrival').val();
    var non_revenue = $('#non_revenue').val();
    var dead_head = $('#dead_head').val();
    var transit = $('#transit').val();
    var gc_unloaded = $('#gc_unloaded').val();
    var gc_loaded = $('#gc_loaded').val();
    var am_unloaded = $('#am_unloaded').val();
    var am_loaded = $('#am_loaded').val();
    var license_no = $('#license_no').val();
        
    $.ajax({
        url: '../api/flight/create.php',
        type: 'POST',
        contentType: "application/json",
        dataType: "json",
        data: JSON.stringify({ airline_name: airline_name, classification: classification, take_off: take_off, landing: landing, parking: parking, nature: nature,
          flight_no: flight_no, origin: origin, destination: destination, type: type, reg_no: reg_no, owner: owner, arrival: arrival, non_revenue: non_revenue, dead_head: dead_head, transit: transit,
          gc_unloaded: gc_unloaded, gc_loaded: gc_loaded, am_unloaded: am_unloaded, am_loaded: am_loaded, license_no: license_no }),
        success: function (data) {
          $('#exampleModalAddFlight').modal('toggle');
          $('#exampleModalAddFlight').find('form').trigger('reset');
          $('#dataTableFlight').DataTable().ajax.reload(); 
        },
        error: function (jqXHR, textStatus, errorThrown) { alert('Something went wrong.'); }
    });
  })
}

var flight_id_glob;
function readFlight() {
  var dataTableFlight;
  if($('#user_type').text().trim() == 'Administrator'){
    dataTableFlight = $('#dataTableFlight').DataTable({
      dom: 'lBfrtip',
      buttons: [
          {
            extend: 'excel',
            exportOptions: {
                columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22 ]
            }
          }
      ],
      "columnDefs": [
        {
          "targets": 7,
          "sortable": false
        },
        {
          "targets": [0, 20, 22],
          "visible": false,
          "searchable": false
        }
      ],
      "ajax": {
        url: '../api/flight/read.php',
        dataSrc: ""
      },
      columns: [
        { "data": "id" },
        { "data": "date_created" },
        { "data": "take_off" },
        { "data": "landing" },
        { "data": "parking" },
        { "data": "nature" },
        { "data": "flight_no" },
        { "data": "origin" },
        { "data": "destination" },
        { "data": "type" },
        { "data": "reg_no" },
        { "data": "owner" },
        { "data": "arrival" },
        { "data": "non_revenue" },
        { "data": "dead_head" },
        { "data": "transit" },
        { "data": "gc_unloaded" },
        { "data": "gc_loaded" },
        { "data": "am_unloaded" },
        { "data": "am_loaded" },
        {
          data: null,
          defaultContent: ""
        },
        { "data": "license_no" },
        {
          data: null,
          defaultContent: ""
        },
        {
          data: null,
          defaultContent: "<button type='button' class='btn btn-primary btn-rounded btn-sm dt-edit btn-update-flight' style='margin-right:5px;'><span class='icon-pencil' aria-hidden='true'></span></button><button type='button' class='btn btn-danger btn-rounded btn-sm btn-delete-flight'><span class='icon-trash' aria-hidden='true'></span></button>"
        }
      ]
    });
  } else {
    dataTableFlight = $('#dataTableFlight').DataTable({
      "columnDefs": [
        {
          "targets": 0,
          "visible": false,
          "searchable": false
        }
      ],
      "ajax": {
        url: '../api/flight/read.php',
        dataSrc: ""
      },
      columns: [
        { "data": "id" },
        { "data": "date_created" },
        { "data": "take_off" },
        { "data": "landing" },
        { "data": "parking" },
        { "data": "nature" },
        { "data": "flight_no" },
        { "data": "origin" },
        { "data": "destination" },
        { "data": "type" },
        { "data": "reg_no" },
        { "data": "owner" },
        { "data": "arrival" },
        { "data": "non_revenue" },
        { "data": "dead_head" },
        { "data": "transit" },
        { "data": "gc_unloaded" },
        { "data": "gc_loaded" },
        { "data": "am_unloaded" },
        { "data": "am_loaded" }
      ]
    });
  }

  $("#dataTableFlight").on("click", ".btn-update-flight", function(e) {
    flight_id_glob = dataTableFlight.row($(this).parents('tr')).data()["id"];
    $.ajax({
      url: '../api/flight/read_single.php',
      type: 'POST',
      contentType: "application/json",
      dataType: "json",
      data: JSON.stringify({ id: flight_id_glob }),
      success: function (data) {
        $('#airline_name_update').val(data[0].airline_name);
        $('#classification_update').val(data[0].classification);
        $('#take_off_landing_update').val(data[0].take_off.replace(/-/g, '/') + ' - ' + data[0].landing.replace(/-/g, '/'));
        $('#parking_update').val(data[0].parking);
        $('#nature_update').val(data[0].nature);
        $('#flight_no_update').val(data[0].flight_no);
        $('#origin_update').val(data[0].origin);
        $('#destination_update').val(data[0].destination);
        $('#type_update').val(data[0].type);
        $('#reg_no_update').val(data[0].reg_no);
        $('#owner_update').val(data[0].owner);
        $('#arrival_update').val(data[0].arrival);
        $('#non_revenue_update').val(data[0].non_revenue);
        $('#dead_head_update').val(data[0].dead_head);
        $('#transit_update').val(data[0].transit);
        $('#gc_unloaded_update').val(data[0].gc_unloaded);
        $('#gc_loaded_update').val(data[0].gc_loaded);
        $('#am_unloaded_update').val(data[0].am_unloaded);
        $('#am_loaded_update').val(data[0].am_loaded);
        $('#license_no_update').val(data[0].license_no);
        $('#exampleModalUpdateFlight').modal('show');
      },
      error: function (jqXHR, textStatus, errorThrown) { alert('Something went wrong.'); }
    });
  });

  $("#dataTableFlight").on("click", ".btn-delete-flight", function(e) {
    flight_id_glob = dataTableFlight.row($(this).parents('tr')).data()["id"];
    $('#exampleModalDeleteFlight').modal('show');
  });
}

function buttonListener() {
  // User Modal
  $('.btn-update-user-modal').click(function(e) {
    var full_name = $('#full-name-update').val();
    var contact_number = $('#contact-number-update').val();
    var address = $('#address-update').val();
    var email = $('#email-update').val();
    var password = $('#password-update').val();
    var status = $('#status-update').val();
        
    $.ajax({
        url: '../api/user/update.php',
        type: 'POST',
        contentType: "application/json",
        dataType: "json",
        data: JSON.stringify({ id: user_id_glob, full_name: full_name, contact_number: contact_number, address: address, email: email, password: password, status: status }),
        success: function (data) {
          $('#exampleModalUpdateUser').modal('toggle');
          $('#exampleModalUpdateUser').find('form').trigger('reset');
          $('#dataTableUser').DataTable().ajax.reload(); 
        },
        error: function (jqXHR, textStatus, errorThrown) { alert('Something went wrong.'); }
    });
  })

  $('.btn-delete-user-modal').click(function(e) {
    $.ajax({
      url: '../api/user/delete.php',
      type: 'POST',
      contentType: "application/json",
      dataType: "json",
      data: JSON.stringify({ id: user_id_glob }),
      success: function (data) {
        $('#exampleModalDeleteUser').modal('hide');
        $('#dataTableUser').DataTable().ajax.reload(); 
      },
      error: function (jqXHR, textStatus, errorThrown) { alert('Something went wrong.'); }
    });
  })
  
  // Aircraft Modal
  $('.btn-update-aircraft-modal').click(function(e) {
    var aircraft_code = $('#aircraft-code-update').val();
    var aircraft_name = $('#aircraft-name-update').val();
    var reg_no = $('#reg-no-update').val();
    var model = $('#model-update').val();
    var pilot = $('#pilot_update').val();
        
    $.ajax({
        url: '../api/aircraft/update.php',
        type: 'POST',
        contentType: "application/json",
        dataType: "json",
        data: JSON.stringify({ id: aircraft_id_glob, code: aircraft_code, name: aircraft_name, reg_no: reg_no, model: model, pilot: pilot }),
        success: function (data) {
          $('#exampleModalUpdateAircraft').modal('toggle');
          $('#exampleModalUpdateAircraft').find('form').trigger('reset');
          $('#dataTableAircraft').DataTable().ajax.reload(); 
        },
        error: function (jqXHR, textStatus, errorThrown) { alert('Something went wrong.'); }
    });
  })

  $('.btn-delete-aircraft-modal').click(function(e) {
      $.ajax({
      url: '../api/aircraft/delete.php',
      type: 'POST',
      contentType: "application/json",
      dataType: "json",
      data: JSON.stringify({ id: aircraft_id_glob }),
      success: function (data) {
          $('#exampleModalDeleteAircraft').modal('hide');
          $('#dataTableAircraft').DataTable().ajax.reload(); 
      },
      error: function (jqXHR, textStatus, errorThrown) { alert('Something went wrong.'); }
      });
  })

  // Flight Modal
  $('.btn-update-flight-modal').click(function(e) {
    var airline_name = $('#airline_name_update').val();
    var classification = $('#classification_update').val();
    var take_off_landing = $('#take_off_landing_update').val();
    var fields = take_off_landing.split(' - ');
    var take_off = fields[0].replace(/\//g, '-');
    var landing = fields[1].replace(/\//g, '-');
    var parking = $('#parking_update').val();
    var nature = $('#nature_update').val();
    var flight_no = $('#flight_no_update').val();
    var origin = $('#origin_update').val();
    var destination = $('#destination_update').val();
    var type = $('#type_update').val();
    var reg_no = $('#reg_no_update').val();
    var owner = $('#owner_update').val();
    var arrival = $('#arrival_update').val();
    var non_revenue = $('#non_revenue_update').val();
    var dead_head = $('#dead_head_update').val();
    var transit = $('#transit_update').val();
    var gc_unloaded = $('#gc_unloaded_update').val();
    var gc_loaded = $('#gc_loaded_update').val();
    var am_unloaded = $('#am_unloaded_update').val();
    var am_loaded = $('#am_loaded_update').val();
    var license_no = $('#license_no_update').val();
        
    $.ajax({
        url: '../api/flight/update.php',
        type: 'POST',
        contentType: "application/json",
        dataType: "json",
        data: JSON.stringify({ id: flight_id_glob, airline_name: airline_name, classification: classification, take_off: take_off, landing: landing, parking: parking, nature: nature,
          flight_no: flight_no, origin: origin, destination: destination, type: type, reg_no: reg_no, owner: owner, arrival: arrival, non_revenue: non_revenue, dead_head: dead_head, transit: transit,
          gc_unloaded: gc_unloaded, gc_loaded: gc_loaded, am_unloaded: am_unloaded, am_loaded: am_loaded, license_no: license_no }),
        success: function (data) {
          $('#exampleModalUpdateFlight').modal('toggle');
          $('#exampleModalUpdateFlight').find('form').trigger('reset');
          $('#dataTableFlight').DataTable().ajax.reload(); 
        },
        error: function (jqXHR, textStatus, errorThrown) { alert('Something went wrong.'); }
    });
  })

  $('.btn-delete-flight-modal').click(function(e) {
      $.ajax({
      url: '../api/flight/delete.php',
      type: 'POST',
      contentType: "application/json",
      dataType: "json",
      data: JSON.stringify({ id: flight_id_glob }),
      success: function (data) {
          $('#exampleModalDeleteFlight').modal('hide');
          $('#dataTableFlight').DataTable().ajax.reload(); 
      },
      error: function (jqXHR, textStatus, errorThrown) { alert('Something went wrong.'); }
      });
  })

  // Time Management
  $(document).on('click', ".btn-time-takeoff", function() {
    var currentdate = new Date(); 
    var datetime_now = currentdate.getFullYear() + "-"
                  + (currentdate.getMonth()+1)  + "-" 
                  + currentdate.getDate() + " "  
                  + currentdate.getHours() + ":"  
                  + currentdate.getMinutes() + ":" 
                  + currentdate.getSeconds();
    var aircraft = $(this).parent().find("#time_id").val()
    var aircraft_regno = $(this).parent().find("#reg_no").val()
    $.ajax({
      url: '../api/time/update.php',
      type: 'POST',
      contentType: "application/json",
      dataType: "json",
      data: JSON.stringify({ aircraft: aircraft, aircraft_regno: aircraft_regno, take_off: datetime_now, landing: datetime_now, status: 1 }),
      success: function (data) { location.href = "http://localhost/CAAP%20Lingayen%20Airport/pages/time_management.php" },
      error: function (jqXHR, textStatus, errorThrown) { alert('Something went wrong.'); }
    });
  });
  
  $(document).on('click', ".btn-time-landing", function() {
    var take_off_datetime = $(this).closest(".time_data").find( '[id^="take_off_datetime"]' ).text();
    var currentdate = new Date(); 
    var datetime_now = currentdate.getFullYear() + "-"
                  + (currentdate.getMonth()+1)  + "-" 
                  + currentdate.getDate() + " "  
                  + currentdate.getHours() + ":"  
                  + currentdate.getMinutes() + ":" 
                  + currentdate.getSeconds();
    var aircraft = $(this).parent().find("#time_id").val()
    var aircraft_regno = $(this).parent().find("#reg_no").val()
    $.ajax({
      url: '../api/time/update.php',
      type: 'POST',
      contentType: "application/json",
      dataType: "json",
      data: JSON.stringify({ aircraft: aircraft, aircraft_regno: aircraft_regno, take_off: take_off_datetime, landing: datetime_now, status: 2 }),
      success: function (data) {
        $.ajax({
          url: '../api/flight/create.php',
          type: 'POST',
          contentType: "application/json",
          dataType: "json",
          data: JSON.stringify({ airline_name: aircraft, classification: '', take_off: take_off_datetime, landing: datetime_now, parking: '', nature: '',
            flight_no: '', origin: '', destination: '', type: '', reg_no: aircraft_regno, owner: aircraft, arrival: '', non_revenue: '', dead_head: '', transit: '',
            gc_unloaded: '', gc_loaded: '', am_unloaded: '', am_loaded: '', license_no: '' }),
          success: function (data) {
            location.href = "http://localhost/CAAP%20Lingayen%20Airport/pages/time_management.php";
          },
          error: function (jqXHR, textStatus, errorThrown) { alert('Something went wrong.'); }
        });
      },
      error: function (jqXHR, textStatus, errorThrown) { alert('Something went wrong.'); }
    });
  });
}

function loginUser() {
  $('.btn-login').click(function(e) {
    var email = $('#exampleInputEmailLogin').val();
    var password = $('#exampleInputPasswordLogin').val();
    
    if(email.trim().length < 1 || password.trim().length < 1){
      alert('Please enter a valid format.');
    } else{
      $.ajax({
          url: '../api/user/login.php',
          type: 'POST',
          contentType: "application/json",
          dataType: "json",
          data: JSON.stringify({ email: email, password: password }),
          error: function (request, status, error) {
              alert("Password won't match to email.");
          }
      }).done(function(data){
          var status = JSON.stringify(data.status)
          var type = JSON.stringify(data.type)
          
          if(status == '"success"'){
            location.href = "http://localhost/CAAP%20Lingayen%20Airport/pages/flight_plans.php"
          } else if(status == '"inactive"') {
            alert("Your account is inactive. Contact system administrator for more information.");
          } else {
            alert("Password won't match to email.");
          }
      });
    }
  })
}

var aircraft_get;
function fillTimeManagement() {
  $('#sort_aircraft_regno').empty()
  var dropDown = document.getElementById("sort_aircraft_regno");
  $.ajax({
    type: "GET",
    url: '../api/time/read.php',
    success: function(data) {
      var s;
      var strArray = []
      for (var i = 0; i < data.length; i++) {
        if(i == 0){
          sortAircraftRegno(data[i].aircraft);
          aircraft_get = data[i].aircraft;
          
          setInterval(function() {
            sortAircraftRegno(aircraft_get);
          }, 10000);
        }
        var value = '<option value="' + data[i].aircraft + '">' + data[i].aircraft + '</option>';
        if (strArray.includes(value) === false) strArray.push(value);
      }
      $("#sort_aircraft_regno").html(strArray);
    }
  });

  $("#sort_aircraft_regno").change(function () {
    sortAircraftRegno($("#sort_aircraft_regno option:selected" ).text());
    aircraft_get = $("#sort_aircraft_regno option:selected" ).text()
  });  
}

function sortAircraftRegno(aircraft) {
  $.ajax({
    url: '../api/time/read_single.php',
    type: 'POST',
    contentType: "application/json",
    dataType: "json",
    data: JSON.stringify({ aircraft: aircraft }),
    success: function(data) {
      var s;
      var strArray = []
      var time_difference;
      for (var i = 0; i < data.length; i++) {
        var button_disable_takeoff;
        var button_disable_landing;
        var display;
        if(data[i].status == 1){
          button_disable_takeoff = 'disabled';
          button_disable_landing = '';
          display = data[i].take_off;

          var startDate = new Date(data[i].take_off.replace(/-/g, '/'));
          var endDate = new Date(Date.now());
          var timeDiff = Math.abs(startDate - endDate);

          var hh = Math.floor(timeDiff / 1000 / 60 / 60);
          if(hh < 10) {
              hh = '0' + hh;
          }
          timeDiff -= hh * 1000 * 60 * 60;
          var mm = Math.floor(timeDiff / 1000 / 60);
          if(mm < 10) {
              mm = '0' + mm;
          }
          timeDiff -= mm * 1000 * 60;
          var ss = Math.floor(timeDiff / 1000);
          if(ss < 10) {
              ss = '0' + ss;
          }

          time_difference = hh + ":" + mm + ":" + ss;
        } else {
          display = '-'
          button_disable_takeoff = '';
          button_disable_landing = 'disabled';
          time_difference = '-';
        }
        var value = '<div class="col-md-6 time_data"><div class="card shadow mb-4"><div class="card-header py-3 d-flex justify-content-between" style="align-items: center"><h4 class="m-0 font-weight" style="color: #38ce3c">' + data[i].aircraft_regno + '</h4></div> <div class="card-body" style="min-height: 151px;"> <div class="row" style="text-align: center"> <div class="col-md-4"> <button type="button" class="btn btn-primary btn-rounded btn-sm btn-time-takeoff"'+ button_disable_takeoff +'>TAKE-OFF<input type="hidden" id="time_id" name="time_id" class="time_id" value="' + data[i].aircraft + '"><input type="hidden" id="reg_no" name="reg_no" class="reg_no" value="' + data[i].aircraft_regno + '"></button> <p id="take_off_datetime" style="margin-top: 15px; margin-bottom: 0">' + display  + '</p> </div> <div class="col-md-4"> <p style="margin: 25px 0; border: 1px dotted black;">' + time_difference + '</p> </div> <div class="col-md-4"> <button type="button" class="btn btn-primary btn-rounded btn-sm btn-time-landing"' + button_disable_landing + '>LANDING<input type="hidden" id="time_id" name="time_id" class="time_id" value="' + data[i].aircraft + '"><input type="hidden" id="reg_no" name="reg_no" class="reg_no" value="' + data[i].aircraft_regno + '"></button> <p style="margin-top: 15px; margin-bottom: 0">-</p> </div> </div> </div> </div> </div>';
        strArray.push(value);
      }
      $("#fill_time").html(strArray);
    }
  });
}