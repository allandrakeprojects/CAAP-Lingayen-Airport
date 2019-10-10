(function ($) {
  'use strict';
  $(function () {
    custom();
    datatable();
    fillUpdateFlightModal();
    createUser();
    buttonListener();
    readUser();
  });
})(jQuery);

function custom() {
  var start = moment().subtract(29, 'days');
  var end = moment();

  function cb(start, end) {
      $('#income-expense-summary-chart-daterange input').val(start.format('MM/DD hh:mm A') + ' - ' + end.format('MM/DD hh:mm A'));
      $('#income-expense-summary-chart-daterange-modal input').val(start.format('MM/DD hh:mm A') + ' - ' + end.format('MM/DD hh:mm A'));
  }

  $('#income-expense-summary-chart-daterange').daterangepicker({
    timePicker: true,
    locale: {
      format: 'M/DD hh:mm A'
    },
  }, cb);

  $('#income-expense-summary-chart-daterange-modal').daterangepicker({
    parentEl: "#exampleModalAddFlight .modal-body",
    timePicker: true,
    locale: {
      format: 'M/DD hh:mm A'
    },
  }, cb);

  cb(start, end);
}

function datatable() {
  $(document).ready(function() {
    $('#dataTable').DataTable();
  });
}

function fillUpdateFlightModal() {
  $('#exampleModalUpdateFlight').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('New message to ' + recipient)
    // modal.find('.modal-body input').val(recipient)
  })
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

var id_glob;
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
    id_glob = dataTableUser.row($(this).parents('tr')).data()["id"];
    $.ajax({
      url: '../api/user/read_single.php',
      type: 'POST',
      contentType: "application/json",
      dataType: "json",
      data: JSON.stringify({ id: id_glob }),
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
    id_glob = dataTableUser.row($(this).parents('tr')).data()["id"];
    var full_name = dataTableUser.row($(this).parents('tr')).data()["full_name"];
    $('#exampleModalDeleteUser').find('.modal-body-delete').append('Are you sure you want to delete user <strong>' + full_name + '</strong>?');
    $('#exampleModalDeleteUser').modal('show');
  });

  $('#exampleModalDeleteUser').on('hidden.bs.modal', function () {
    $('#exampleModalDeleteUser').find('.modal-body-delete').text('');
  })
}

function buttonListener() {
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
        data: JSON.stringify({ id: id_glob, full_name: full_name, contact_number: contact_number, address: address, email: email, password: password, status: status }),
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
      data: JSON.stringify({ id: id_glob }),
      success: function (data) {
        $('#exampleModalDeleteUser').modal('hide');
        $('#dataTableUser').DataTable().ajax.reload(); 
      },
      error: function (jqXHR, textStatus, errorThrown) { alert('Something went wrong.'); }
    });
  })
}