var s,
DateWidget = {
  settings: {
    months: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
    day: new Date().getUTCDate(),
    currMonth: new Date().getUTCMonth(),
    currYear: new Date().getUTCFullYear(),
    yearOffset: 100,
    containers: $(".dateDropdown")
  },

  init: function() {
    s = this.settings;
    DW = this;
    s.containers.each(function(){
      DW.removeFallback(this);
      DW.createSelects(this);
      DW.populateSelects(this);
      DW.initializeSelects(this);
      DW.bindUIActions();
    })
  },

  getDaysInMonth: function(month, year) {
    return new Date(year, month, 0).getDate();
  },

  addDays: function(daySelect, numDays){
    $(daySelect).empty();
    $("<option />")
      .text('Día')
      .val(0)
      .appendTo(daySelect);
    for(var i = 0; i < numDays; i++){
      $("<option />")
      .text(i + 1)
      .val(i + 1)
      .appendTo(daySelect);
    }
  },

  addMonths: function(monthSelect){
    $("<option />")
      .text('Mes')
      .val(0)
      .appendTo(monthSelect);
    for(var i = 0; i < 12; i++){
      $("<option />")
      .text(s.months[i])
      .val(i+1)
      .appendTo(monthSelect);
    }
  },

  addYears: function(yearSelect){
    $("<option />")
      .text('Año')
      .val(0)
      .appendTo(yearSelect);
    for(var i = 0; i < s.yearOffset; i++){
      $("<option />")
      .text(s.currYear - i)
      .val(s.currYear - i)
      .appendTo(yearSelect);
    }
  },

  removeFallback: function(container) {
    $(container).empty();
  },

  createSelects: function(container) {
    $('<select id="day" class="day form-control mr-3 mb-2" style="min-height: 35px;">').appendTo(container);
    $('<select id="month" class="month form-control mr-3  mb-2" style="min-height: 35px;">').appendTo(container);
    $('<select id="year" class="year form-control mr-3 mb-2" style="min-height: 35px;">').appendTo(container);
  },

  populateSelects: function(container) {
    DW.addDays($(container).find('.day'), DW.getDaysInMonth(s.currMonth, s.currYear));
    DW.addMonths($(container).find('.month'));
    DW.addYears($(container).find('.year'));
  },

  initializeSelects: function(container) {
    /*$(container).find('.day').val(s.day);
    $(container).find('.currMonth').val(s.month);
    $(container).find('.currYear').val(s.year);*/
    $(container).find('.day').val(0);
    $(container).find('.currMonth').val(0);
    $(container).find('.currYear').val(0);
  },

  bindUIActions: function() {
    $(".month").on("change", function(){
      var daySelect = $(this).prev(), 
      yearSelect = $(this).next(),
      month = s.months.indexOf($(this).val()) + 1,
      days = DW.getDaysInMonth(month, yearSelect.val());
      DW.addDays(daySelect, days);
    });

    $(".year").on("change", function(){
      var daySelect = $(this).prev().prev(), 
      monthSelect = $(this).prev(),
      month = s.months.indexOf(monthSelect.val()) + 1,
      days = DW.getDaysInMonth(month, $(this).val());
      DW.addDays(daySelect, days);
    });
  }
};

DateWidget.init();