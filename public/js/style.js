// //choose all checkboxes
// document.getElementById('selectAll').addEventListener('click', function() {
//     const checkboxes = document.querySelectorAll('input[type="checkbox"]');
//     const allChecked = [...checkboxes].every(checkbox => checkbox.checked);
    
//     checkboxes.forEach(checkbox => checkbox.checked = !allChecked);
//     this.textContent = allChecked ? 'انتخاب همه' : 'لغو انتخاب همه';
// });


// $(document).ready(function() {
//     let currentDate = new persianDate();
//     let currentMinute = currentDate.minute();
    
//     if (currentMinute > 0 && currentMinute < 30) {
//         currentDate.minute(30);
//     } else if (currentMinute >= 30) {
//         currentDate.minute(0);
//         currentDate.add('hour', 1);
//     }
//     $("#date-picker").persianDatepicker({
//         format: 'YYYY/MM/DD HH:mm',
//         initialValue: currentDate.format('YYYY/MM/DD HH:mm'),
//         readonly: true,
//         onSelect: function(unixDate) {
//             let today = new persianDate().startOf('day').valueOf();
//             let selected = new persianDate(unixDate).startOf('day').valueOf();
//             let endOfNextTwoMonths = new persianDate().add('M', 3).startOf('month').subtract('d', 1).valueOf();
            
//             if (selected < today) {
//                 alert('تاریخ انتخابی نمی‌تواند قبل از امروز باشد');
//                 this.setDate(new persianDate().valueOf());
//                 return false;
//             }
//             if (selected > endOfNextTwoMonths) {
//                 alert('تاریخ انتخابی نمی‌تواند بیشتر از دو ماه آینده باشد');
//                 this.setDate(new persianDate().valueOf());
//                 return false;            
//             }
//         },
//         minDate: new persianDate().startOf('day').valueOf(),
//         maxDate: new persianDate().add('M', 3).startOf('month').subtract('d', 1).valueOf(),
//         timePicker: {
//             enabled: true,
//             meridian: false,
//             showSeconds: false,
//             second: {
//                 enabled: false
//             },
//             minute: {
//                 enabled: true,
//                 step: 30,
//                 stepSize: 30,
//             },
//         },
//         autoClose: true,
//         toolbox: {
//             calendarSwitch: {
//                 enabled: false
//             }
//         },
//     });    
// });

// const accordionButtons = document.querySelectorAll('.accordion-button');
// console.log(accordionButtons);

// accordionButtons.forEach(button => {
//     button.addEventListener('click', function() {
//         console.log("Hello")
//         const targetId = this.getAttribute('data-bs-target');
//         console.log(targetId);
//         const target = document.querySelector(targetId);
                
//         if (target.classList.contains('show')) {
//             console.log(button);

//             // Handle content
//             target.classList.remove('show');
            
//             // Handle button
//             this.classList.add('collapsed');
//             this.setAttribute('aria-expanded', 'false');
//         }
//     });
// });


// var option_add = document.getElementById('option_add');
// var option_remove = document.getElementById('option_remove');
// var container = document.getElementById('options_container');
// const MAX_FIELDS = 10;

// // Initial button states
// option_remove.style.display = 'none'; // Initially hide remove button
// option_remove.disabled = container.children.length <= 1;
// option_add.disabled = container.children.length >= MAX_FIELDS;

// option_add.addEventListener('click', function() {
//     if (container.children.length < MAX_FIELDS) {
//         var newField = document.createElement('div');
//         newField.className = 'option-field row';
//         newField.innerHTML = `
//                                     <div class="col">
//                             <label for="sub_option" class="mt-4">خدمات(برای مثال درب موتور)</label>
//                             <input type="text" name="sub_options[]" class="form-control" placeholder="نام آپشن">
//                         </div>
//                         <div class="col">
//                             <label for="sub_option" class="mt-4">مقادیر</label>
//                             <input type="text" name="sub_values[]" class="form-control" placeholder="مقادیر رو با ، جدا کنید">
//                         </div>`;
        
//         container.appendChild(newField);
        
//         // Update button states
//         option_remove.disabled = container.children.length <= 1;
//         option_add.disabled = container.children.length >= MAX_FIELDS;
        
//         // Show remove button when more than one field
//         if (container.children.length > 1) {
//             option_remove.style.display = 'block';
//         }
//     }
// });

// option_remove.addEventListener('click', function() {
//     if (container.children.length > 1) {
//         container.removeChild(container.lastElementChild);
        
//         // Update button states
//         option_remove.disabled = container.children.length <= 1;
//         option_add.disabled = container.children.length >= MAX_FIELDS;
        
//         // Hide remove button when only one field remains
//         if (container.children.length <= 1) {
//             option_remove.style.display = 'none';
//         }
//     }
// });
function toggleSubmenu(id) {
    const submenu = document.getElementById(id);
    const isExpanded = submenu.style.maxHeight !== '0px';
    submenu.style.maxHeight = isExpanded ? '0px' : '160px';
    const icon = submenu.previousElementSibling.querySelector('.material-icons-round');
    icon.style.transform = isExpanded ? 'rotate(0deg)' : 'rotate(180deg)';
}
