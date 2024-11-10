
$(document).ready(function() {
    $("#date-picker").persianDatepicker({
        format: 'YYYY/MM/DD HH:mm',
        initialValue: false,
        onlyTimePicker: false,
        readonly: true,
        minDate: new persianDate().unix(),
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
        initialValue: false,
        autoClose: true,
        toolbox: {
            calendarSwitch: {
                enabled: false
            }
        },
    });
    let minute = document.querySelector(".minute-input");
    const timeButtons = $('[data-time-key="minute"].down-btn, [data-time-key="minute"].up-btn').toArray();
    timeButtons.forEach(button => {
        button.addEventListener("click", function() {
            setTimeout(() => {
                // تبدیل اعداد فارسی به انگلیسی
                let faToEnValue = minute.value.replace(/[۰-۹]/g, d => '۰۱۲۳۴۵۶۷۸۹'.indexOf(d));
                let minuteValue = parseInt(faToEnValue);
                
                if (minuteValue > 0 && minuteValue < 30) {
                    minute.value = "۰۰";
                } else if (minuteValue > 30) {
                    minute.value = "۳۰";
                }
            }, 10);
        });
    });
});


let fix = document.querySelector("#fixExpenses");
let fixNav = document.querySelector("#fixNavItems");

let incomes = document.querySelector("#incomes")
let incomesNav = document.querySelector("#incomesShow");

let debts = document.querySelector("#debts")
let debtsNav = document.querySelector("#debtsShow");

let expenses = document.querySelector("#expenses")
let expensesNav = document.querySelector("#expensesNavItems");

function menuShow(item){
    if(item.classList.contains("show")){
        item.classList.remove("show")
    }
    else{
        item.classList.add("show");
    }
}

fix.addEventListener("click" , () => menuShow(fixNav));
incomes.addEventListener("click" , () => menuShow(incomesNav));
debts.addEventListener("click" , () => menuShow(debtsNav));


// let budget = document.querySelector(".budget");
// for(let i=0 ; i<101; i++){
//     console.log("this".i."is ".(i % 3))
// }

// budget.addEventListener("input", function(){
//     sum +=1
//     if (sum % 3 == 0){
//         budget.value += ".";
//         sum = 0;
//     }
// })