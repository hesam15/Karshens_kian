
$(document).ready(function() {
    $("#date-picker").persianDatepicker({
        format: 'YYYY/MM/DD',
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
                return false;
            }
            if (selected > endOfNextTwoMonths) {
                alert('تاریخ انتخابی نمی‌تواند بیشتر از دو ماه آینده باشد');
                return false;
            }
        }
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