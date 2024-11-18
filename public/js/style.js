$(document).ready(function() {
    let currentDate = new persianDate();
    let currentMinute = currentDate.minute();
    
    if (currentMinute > 0 && currentMinute < 30) {
        currentDate.minute(30);
    } else if (currentMinute >= 30) {
        currentDate.minute(0);
        currentDate.add('hour', 1);
    }
    $("#date-picker").persianDatepicker({
        format: 'YYYY/MM/DD HH:mm',
        initialValue: currentDate.format('YYYY/MM/DD HH:mm'),
        readonly: true,
        onSelect: function(unixDate) {
            let today = new persianDate().startOf('day').valueOf();
            let selected = new persianDate(unixDate).startOf('day').valueOf();
            let endOfNextTwoMonths = new persianDate().add('M', 3).startOf('month').subtract('d', 1).valueOf();
            
            if (selected < today) {
                alert('تاریخ انتخابی نمی‌تواند قبل از امروز باشد');
                this.setDate(new persianDate().valueOf());
                return false;
            }
            if (selected > endOfNextTwoMonths) {
                alert('تاریخ انتخابی نمی‌تواند بیشتر از دو ماه آینده باشد');
                this.setDate(new persianDate().valueOf());
                return false;            
            }
        },
        minDate: new persianDate().startOf('day').valueOf(),
        maxDate: new persianDate().add('M', 3).startOf('month').subtract('d', 1).valueOf(),
        timePicker: {
            enabled: true,
            meridian: false,
            showSeconds: false,
            second: {
                enabled: false
            },
            minute: {
                enabled: true,
                step: 30,
                stepSize: 30,
            },
        },
        autoClose: true,
        toolbox: {
            calendarSwitch: {
                enabled: false
            }
        },
    });    
});

const accordionButtons = document.querySelectorAll('.accordion-button');
console.log(accordionButtons);

accordionButtons.forEach(button => {
    button.addEventListener('click', function() {
        console.log("Hello")
        const targetId = this.getAttribute('data-bs-target');
        console.log(targetId);
        const target = document.querySelector(targetId);
                
        if (target.classList.contains('show')) {
            console.log(button);

            // Handle content
            target.classList.remove('show');
            
            // Handle button
            this.classList.add('collapsed');
            this.setAttribute('aria-expanded', 'false');
        }
    });
});