document.getElementById('datepicker').addEventListener('click', function() {});

$('#datepicker').persianDatepicker({
    initialValueType: 'persian',
    format: 'YYYY/MM/DD',
    maxDate: new persianDate().add('month', 3).valueOf(),
    minDate: new persianDate(),
    onSelect: function(unix) {
        const pd = new persianDate(unix);
        const selectedDate = `${pd.year()}/${pd.month()}/${pd.date()}`;
        const timeSlotContainer = document.getElementById('time-slots-container');

        if (selectedDate) {
            timeSlotContainer.classList.remove('hidden');
            
            fetch(`/dashboard/available-times?date=${selectedDate}`, {
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                timeSlotContainer.innerHTML = '';
                
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
                
                const header = document.createElement('h3');
                header.className = 'text-lg font-semibold text-gray-800 mb-4 pr-4';
                header.textContent = 'ساعت های قابل انتخاب';
                timeSlotContainer.appendChild(header);
                
                const wrapper = document.createElement('div');
                wrapper.className = 'space-y-4 px-4';
                
                const availableTimes = data.available;
                const bookedTimes = data.booked || [];
                
                const times = [];
                for(let hour = 8; hour <= 20; hour++) {
                    times.push(`${hour.toString().padStart(2, '0')}:00`);
                    times.push(`${hour.toString().padStart(2, '0')}:30`);
                }
                
                for(let i = 0; i < times.length; i += 6) {
                    const rowDiv = document.createElement('div');
                    rowDiv.className = 'flex flex-row justify-between w-full gap-4';
                    
                    const timeGroup = times.slice(i, i + 6);
                    
                    timeGroup.forEach(time => {
                        const isAvailable = availableTimes.includes(time);
                        const isBooked = bookedTimes.includes(time);
                        
                        const div = document.createElement('div');
                        div.className = `flex-1 time-slot ${!isAvailable || isBooked ? 'disabled' : ''}`;
                        
                        const input = document.createElement('input');
                        input.type = 'radio';
                        input.name = 'time_slot';
                        input.id = `time-${time}`;
                        input.value = time;
                        input.className = 'hidden';
                        input.disabled = !isAvailable || isBooked;
                        
                        const label = document.createElement('label');
                        label.htmlFor = `time-${time}`;
                        label.className = `block w-full text-center px-3 py-2 rounded-lg border-2 transition-all duration-200 ${
                            isAvailable && !isBooked
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
                
                timeSlotContainer.appendChild(wrapper);
            });
        }
    }
});
