document.addEventListener('DOMContentLoaded', function() {
    // Burger Menu & Sidebar
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

    // Delete confirmation handling
    const deleteButtons = document.querySelectorAll('.delete-btn');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const route = this.dataset.route;
            if (confirm('آیا از حذف این مورد اطمینان دارید؟')) {
                fetch(route, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        window.location.reload();
                    }
                });
            }
        });
    });

    // Dropdown toggles for sidebar menus
    ['services', 'roles', 'users'].forEach(menu => {
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

    // Alert auto-dismiss
    const alerts = document.querySelectorAll('.alert-dismissible');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.classList.add('opacity-0');
            setTimeout(() => alert.remove(), 300);
        }, 3000);
    });

    const breadcrumbContainer = document.querySelector('.breadcrumb-container');
    let scrollTimer;
    
    window.addEventListener('scroll', () => {
        if (breadcrumbContainer) {
            breadcrumbContainer.style.transform = 'translateY(-100%)';
            
            // Clear the existing timer
            clearTimeout(scrollTimer);
            
            // Set new timer
            scrollTimer = setTimeout(() => {
                breadcrumbContainer.style.transform = 'translateY(0)';
            }, 500);
        }
    });

    function updateButtonStates() {
        const fields = document.getElementById('options_container').getElementsByClassName('option-field');
        const addButton = document.getElementById('option_add');
        const removeButton = document.getElementById('option_remove');
        
        // Disable add button if 10 items exist
        addButton.disabled = fields.length >= 10;
        addButton.classList.toggle('opacity-50', fields.length >= 10);
        
        // Disable remove button if only 1 item exists
        removeButton.disabled = fields.length <= 1;
        removeButton.classList.toggle('opacity-50', fields.length <= 1);
    }
    
    document.getElementById('option_add').addEventListener('click', function() {
        const container = document.getElementById('options_container');
        const newField = `
            <div class="option-field grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        خدمات(برای مثال درب موتور)
                    </label>
                    <input type="text" name="sub_options[]" placeholder="نام آپشن"
                        class="w-full px-4 py-2.5 rounded-lg border-2 border-gray-200 focus:border-blue-500 focus:ring-blue-500 transition-colors duration-200">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        مقادیر
                    </label>
                    <input type="text" name="sub_values[]" placeholder="مقادیر رو با ، جدا کنید"
                        class="w-full px-4 py-2.5 rounded-lg border-2 border-gray-200 focus:border-blue-500 focus:ring-blue-500 transition-colors duration-200">
                </div>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', newField);
        updateButtonStates();
    });
    
    document.getElementById('option_remove').addEventListener('click', function() {
        const container = document.getElementById('options_container');
        const fields = container.getElementsByClassName('option-field');
        
        if (fields.length > 1) {
            fields[fields.length - 1].remove();
        } else if (fields.length === 1) {
            const inputs = fields[0].getElementsByTagName('input');
            for (let input of inputs) {
                input.value = '';
            }
        }
        updateButtonStates();
    });
    
    // Initial button states
    document.addEventListener('DOMContentLoaded', function() {
        updateButtonStates();
    });    
});


//Modal
function openModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.classList.remove('hidden');
    document.body.classList.add('overflow-hidden');
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.classList.add('hidden');
    document.body.classList.remove('overflow-hidden');
}

document.addEventListener('click', function(event) {
    const modals = document.querySelectorAll('[id^="modal"]');
    modals.forEach(modal => {
        const modalContent = modal.querySelector('.bg-white');
        if (modal.contains(event.target) && !modalContent.contains(event.target)) {
            closeModal(modal.id);
        }
    });
});