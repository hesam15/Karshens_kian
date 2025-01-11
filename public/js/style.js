document.addEventListener('DOMContentLoaded', function() {
    initializeUI();
    initializeDataHandlers();
    initializeInteractions();
    initializeTimeSlots();
});

function initializeTimeSlots() {
    const datepicker = document.getElementById('datepicker');
    const timeSlotsContainer = document.getElementById('time-slots-container');
    const timeSlotSelect = document.getElementById('time_slot');

    if (datepicker && datepicker.value) {
        timeSlotsContainer.classList.remove('hidden');
        loadTimeSlots(datepicker.value);
    }

    function loadTimeSlots(date) {
        timeSlotSelect.innerHTML = '';
        
        const defaultOption = document.createElement('option');
        defaultOption.value = '';
        defaultOption.textContent = 'انتخاب کنید';
        timeSlotSelect.appendChild(defaultOption);

        for (let hour = 8; hour <= 20; hour++) {
            const option = document.createElement('option');
            option.value = `${hour}:00`;
            option.textContent = `${hour}:00`;
            timeSlotSelect.appendChild(option);
        }
    }
}

function initializeUI() {
    initializeSidebar();
    initializeDropdowns();
    initializeBreadcrumbBehavior();
}

function initializeDataHandlers() {
    initializeDeleteFunctionality();
}

function initializeInteractions() {
    initializeOptionsForm();
    initializeAlerts();
    initializeModals();
}

function initializeSidebar() {
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');

    if (sidebarToggle && sidebar && overlay) {
        function toggleSidebar() {
            sidebar.classList.toggle('translate-x-full');
            overlay.classList.toggle('hidden');
            document.body.classList.toggle('overflow-hidden');
        }

        sidebarToggle.addEventListener('click', toggleSidebar);
        overlay.addEventListener('click', toggleSidebar);
    }
}

function initializeModals() {
    window.openModal = function(modalId) {
        const modal = document.getElementById(modalId);
        if (!modal) {
            console.log('Modal not found:', modalId);
            return;
        }
        
        modal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
        
        const handleOutsideClick = (e) => {
            if (e.target === modal) {
                closeModal(modalId);
            }
        };
        
        modal.addEventListener('click', handleOutsideClick);
    };

    window.closeModal = function(modalId) {
        const modal = document.getElementById(modalId);
        if (!modal) return;
        
        modal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    };

    // Handle edit buttons
    const editButtons = document.querySelectorAll('button[onclick*="editCarModal"]');
    editButtons.forEach(button => {
        button.onclick = (e) => {
            e.preventDefault();
            const modalId = button.getAttribute('onclick').match(/['"]([^'"]+)['"]/)[1];
            openModal(modalId);
        };
    });

    // Handle close buttons
    const closeButtons = document.querySelectorAll('[onclick*="closeModal"]');
    closeButtons.forEach(button => {
        button.onclick = (e) => {
            e.preventDefault();
            const modalId = button.getAttribute('onclick').match(/['"]([^'"]+)['"]/)[1];
            closeModal(modalId);
        };
    });

    initializeDeleteFunctionality();
}

function initializeDeleteFunctionality() {
    const deleteButtons = document.querySelectorAll('.delete-btn');
    const deleteModal = document.getElementById('deleteModal');
    
    if (!deleteButtons.length || !deleteModal) return;
    
    deleteButtons.forEach(button => {
        button.onclick = function(e) {
            e.preventDefault();
            const route = this.dataset.route;
            const type = this.dataset.type;
            
            if (route) {
                const form = deleteModal.querySelector('#deleteForm');
                const title = deleteModal.querySelector('h3');
                const message = deleteModal.querySelector('p');
                
                form.action = route;
                
                const types = {
                    customer: 'مشتری',
                    car: 'خودرو',
                    booking: 'رزرو',
                    report: 'گزارش',
                    option: 'آپشن'
                };
                
                const itemType = types[type] || 'آیتم';
                title.textContent = `تایید حذف ${itemType}`;
                message.textContent = `آیا از حذف این ${itemType} اطمینان دارید؟`;
                
                openModal('deleteModal');
            }
        };
    });
}

function initializeDropdowns() {
    ['services', 'roles', 'users', 'customers'].forEach(menu => {
        const button = document.getElementById(`${menu}Button`);
        const menuElement = document.getElementById(`${menu}Menu`);
        const icon = document.getElementById(`${menu}Icon`);
        if (button && menuElement && icon) {
            button.addEventListener('click', () => {
                const isExpanded = menuElement.style.maxHeight !== '0px';
                menuElement.style.maxHeight = isExpanded ? '0px' : '160px';
                icon.style.transform = isExpanded ? 'rotate(0deg)' : 'rotate(180deg)';
            });
        }
    });
}

function initializeAlerts() {
    const alerts = document.querySelectorAll('.alert-dismissible');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.classList.add('opacity-0');
            setTimeout(() => alert.remove(), 300);
        }, 3000);
    });
}

function initializeBreadcrumbBehavior() {
    const breadcrumbContainer = document.querySelector('.breadcrumb-container');
    let scrollTimer;

    window.addEventListener('scroll', () => {
        if (breadcrumbContainer) {
            breadcrumbContainer.style.transform = 'translateY(-100%)';
            clearTimeout(scrollTimer);
            scrollTimer = setTimeout(() => {
                breadcrumbContainer.style.transform = 'translateY(0)';
            }, 500);
        }
    });
}

function initializeOptionsForm() {
    const addButton = document.getElementById('option_add');
    const removeButton = document.getElementById('option_remove');

    if (addButton && removeButton) {
        addButton.addEventListener('click', addOptionField);
        removeButton.addEventListener('click', removeOptionField);
        updateButtonStates();
    }
}

function addOptionField() {
    const container = document.getElementById('options_container');
    const newField = `
        <div class="option-field grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">خدمات(برای مثال درب موتور)</label>
                <input type="text" name="sub_options[]" placeholder="نام آپشن"
                    class="w-full px-4 py-2.5 rounded-lg border-2 border-gray-200 focus:border-blue-500 focus:ring-blue-500 transition-colors duration-200">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">مقادیر</label>
                <input type="text" name="sub_values[]" placeholder="مقادیر رو با ، جدا کنید"
                    class="w-full px-4 py-2.5 rounded-lg border-2 border-gray-200 focus:border-blue-500 focus:ring-blue-500 transition-colors duration-200">
            </div>
        </div>`;
    container.insertAdjacentHTML('beforeend', newField);
    updateButtonStates();
}

function removeOptionField() {
    const container = document.getElementById('options_container');
    const fields = container.getElementsByClassName('option-field');
    if (fields.length > 1) {
        fields[fields.length - 1].remove();
    } else if (fields.length === 1) {
        Array.from(fields[0].getElementsByTagName('input')).forEach(input => input.value = '');
    }
    updateButtonStates();
}

function updateButtonStates() {
    const fields = document.getElementById('options_container').getElementsByClassName('option-field');
    const addButton = document.getElementById('option_add');
    const removeButton = document.getElementById('option_remove');

    addButton.disabled = fields.length >= 10;
    addButton.classList.toggle('opacity-50', fields.length >= 10);
    removeButton.disabled = fields.length <= 1;
    removeButton.classList.toggle('opacity-50', fields.length <= 1);
}