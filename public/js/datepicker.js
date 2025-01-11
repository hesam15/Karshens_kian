// Initial time slots check on page load
document.addEventListener('DOMContentLoaded', function() {
    const datepicker = document.getElementById('datepicker');
    const hiddenInput = document.querySelector('input[name="time_slot"]');
    const currentTimeSlot = hiddenInput ? hiddenInput.value : null;

    if (datepicker && datepicker.value) {
        loadTimeSlots(datepicker.value, currentTimeSlot);
    }
});

// Datepicker initialization and event handling
$('#datepicker').persianDatepicker({
    initialValueType: 'persian',
    format: 'YYYY/MM/DD',
    maxDate: new persianDate().add('month', 3).valueOf(),
    minDate: new persianDate(),
    onSelect: function(unix) {
        const pd = new persianDate(unix);
        const selectedDate = `${pd.year()}/${pd.month()}/${pd.date()}`;
        const currentTimeSlot = document.querySelector('input[name="time_slot"]').value;
        loadTimeSlots(selectedDate, currentTimeSlot);
    }
});

function loadTimeSlots(selectedDate, currentTimeSlot) {
    const timeSlotContainer = document.getElementById('time-slots-container');

    if (selectedDate) {
        timeSlotContainer.classList.remove('hidden');
        $.ajax({
            url: `/dashboard/available-times`,
            method: 'GET',
            data: { 
                date: selectedDate,
                current_slot: currentTimeSlot 
            },
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            success: function(data) {
                renderTimeSlots(data, timeSlotContainer, currentTimeSlot);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching available times:', error);
                console.log(response(xhr));
                timeSlotContainer.innerHTML = '<p class="text-red-500">خطا در دریافت ساعت‌های موجود</p>';
            }
        });
    }
}

function renderTimeSlots(data, container, currentTimeSlot) {
    container.innerHTML = '';

    // Add styles
    const style = document.createElement('style');
    style.textContent = `
        .time-slot input:checked + label {
            border-color: rgb(34 197 94) !important;
            color: rgb(34 197 94) !important;
        }
        .time-slot:not(.disabled) label:hover {
            border-color: rgb(34 197 94);
            color: rgb(34 197 94);
            transform: translateY(-1px);
        }
    `;
    document.head.appendChild(style);

    // Add header
    const header = document.createElement('h3');
    header.className = 'text-lg font-semibold text-gray-800 mb-4 pr-4';
    header.textContent = 'ساعت های قابل انتخاب';
    container.appendChild(header);

    // Create wrapper
    const wrapper = document.createElement('div');
    wrapper.className = 'space-y-4 px-4';

    // Sort and combine times
    const availableTimes = data.available;
    const bookedTimes = data.booked || [];
    const times = [...availableTimes, ...bookedTimes].sort((a, b) => {
        const [hoursA, minutesA] = a.split(':').map(Number);
        const [hoursB, minutesB] = b.split(':').map(Number);
        return hoursA !== hoursB ? hoursA - hoursB : minutesA - minutesB;
    });

    // Create time slots grid
    for(let i = 0; i < times.length; i += 6) {
        const rowDiv = document.createElement('div');
        rowDiv.className = 'flex flex-row justify-between w-full gap-4';
        
        times.slice(i, i + 6).forEach(time => {
            const isBooked = bookedTimes.includes(time);
            const div = document.createElement('div');
            div.className = `flex-1 time-slot ${isBooked ? 'disabled' : ''}`;

            const input = document.createElement('input');
            input.type = 'radio';
            input.name = 'time_slot';
            input.id = `time-${time}`;
            input.value = time;
            input.className = 'hidden';
            input.disabled = isBooked;

            // Add change event listener
            input.addEventListener('change', function() {
                const hiddenInput = document.querySelector('input[name="time_slot"]');
                if (hiddenInput) {
                    hiddenInput.value = this.value;
                }
            });

            // Check if this is the current time slot
            if (time === currentTimeSlot) {
                input.checked = true;
            }

            const label = document.createElement('label');
            label.htmlFor = `time-${time}`;
            label.className = `block w-full text-center px-3 py-2 rounded-lg border-2 transition-all duration-200 ${
                !isBooked
                    ? 'border-gray-200 text-gray-700 cursor-pointer'
                    : 'bg-gray-100 text-gray-400 cursor-not-allowed'
            }`;
            label.textContent = time;

            div.appendChild(input);
            div.appendChild(label);
            rowDiv.appendChild(div);
        });
        
        wrapper.appendChild(rowDiv);
    }
    
    container.appendChild(wrapper);
}