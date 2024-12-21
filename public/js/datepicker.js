$('#datepicker').persianDatepicker({
    initialValueType: 'persian',
    format: 'YYYY/MM/DD HH:mm',
    timePicker: {
        enabled: true,
        minute: {
            step: 30,
        },
        second: {
            enabled: false,
        }
    },
    maxDate: new persianDate().add('month', 3).valueOf(),
    minDate: new persianDate(),
});