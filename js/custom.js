(function ($) {
  'use strict';
  $(function () {
    custom();
    datatable();
    buttonListener();
    // User API
    createUser();
    readUser();
    // Aircraft API
    createAircraft();
    readAircraft();
    // Flight API
    createFlight();
    readFlight();
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
        
    $.ajax({
        url: '../api/aircraft/create.php',
        type: 'POST',
        contentType: "application/json",
        dataType: "json",
        data: JSON.stringify({ code: aircraft_code, name: aircraft_name, reg_no: reg_no, model: model }),
        success: function (data) {
          $('#exampleModalAddAircraft').modal('toggle');
          $('#exampleModalAddAircraft').find('form').trigger('reset');
          $('#dataTableAircraft').DataTable().ajax.reload(); 
        },
        error: function (jqXHR, textStatus, errorThrown) { alert('Something went wrong.'); }
    });
  })
}

var aircraft_id_glob;
function readAircraft() {
  var dataTableAircraft = $('#dataTableAircraft').DataTable({
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
  var dataTableFlight = $('#dataTableFlight').DataTable({
    "columnDefs": [
      {
        "targets": 7,
        "sortable": false
      },
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
      { "data": "am_loaded" },
      {
        data: null,
        defaultContent: "<button type='button' class='btn btn-primary btn-rounded btn-sm dt-edit btn-update-flight' style='margin-right:5px;'><span class='icon-pencil' aria-hidden='true'></span></button><button type='button' class='btn btn-danger btn-rounded btn-sm btn-delete-flight'><span class='icon-trash' aria-hidden='true'></span></button>"
      }
    ]
  });

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
        
    $.ajax({
        url: '../api/aircraft/update.php',
        type: 'POST',
        contentType: "application/json",
        dataType: "json",
        data: JSON.stringify({ id: aircraft_id_glob, code: aircraft_code, name: aircraft_name, reg_no: reg_no, model: model }),
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
}