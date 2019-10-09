(function ($) {
  'use strict';
  $(function () {
    custom();
    datatable();
    fillUpdateFlightModal();
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