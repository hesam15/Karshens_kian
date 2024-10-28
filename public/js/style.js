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