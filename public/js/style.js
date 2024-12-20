// Select All Checkboxes
document.addEventListener('DOMContentLoaded', () => {
    const selectAllBtn = document.getElementById('selectAll');
    if (selectAllBtn) {
        selectAllBtn.addEventListener('click', function() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"]:not([data-exclude-select-all])');
            const allChecked = Array.from(checkboxes).every(checkbox => checkbox.checked);
            
            checkboxes.forEach(checkbox => {
                checkbox.checked = !allChecked;
            });
            
            this.textContent = !allChecked ? 'لغو انتخاب همه' : 'انتخاب همه';
        });
    }

    // Accordion functionality
    const accordionButtons = document.querySelectorAll('.accordion-button');
    accordionButtons.forEach(button => {
        button.addEventListener('click', function() {
            const targetId = this.getAttribute('data-bs-target');
            const target = document.querySelector(targetId);
            
            if (target) {
                const isExpanded = target.classList.contains('show');
                target.classList.toggle('show');
                this.classList.toggle('collapsed');
                this.setAttribute('aria-expanded', !isExpanded);
            }
        });
    });

    // Options Container Management
    const option_add = document.getElementById('option_add');
    const option_remove = document.getElementById('option_remove');
    const container = document.getElementById('options_container');

    if (option_add && option_remove && container) {
        const MAX_FIELDS = 10;

        // Initial states
        option_remove.classList.add('hidden'); // Using Tailwind's hidden
        option_remove.disabled = container.children.length <= 1;
        option_add.disabled = container.children.length >= MAX_FIELDS;

        option_add.addEventListener('click', function() {
            if (container.children.length < MAX_FIELDS) {
                const newField = document.createElement('div');
                newField.className = 'grid grid-cols-2 gap-4 mb-4'; // Tailwind grid
                newField.innerHTML = `
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">خدمات(برای مثال درب موتور)</label>
                        <input type="text" name="sub_options[]" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               placeholder="نام آپشن">
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">مقادیر</label>
                        <input type="text" name="sub_values[]" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               placeholder="مقادیر رو با ، جدا کنید">
                    </div>`;
                
                container.appendChild(newField);
                
                option_remove.disabled = container.children.length <= 1;
                option_add.disabled = container.children.length >= MAX_FIELDS;
                
                if (container.children.length > 1) {
                    option_remove.classList.remove('hidden');
                }
            }
        });

        option_remove.addEventListener('click', function() {
            if (container.children.length > 1) {
                container.removeChild(container.lastElementChild);
                option_remove.disabled = container.children.length <= 1;
                option_add.disabled = container.children.length >= MAX_FIELDS;
                
                if (container.children.length <= 1) {
                    option_remove.classList.add('hidden');
                }
            }
        });
    }

    // Submenu Toggle
    const dropdowns = [
        {button: 'servicesButton', menu: 'servicesMenu', icon: 'servicesIcon'},
        {button: 'rolesButton', menu: 'rolesMenu', icon: 'rolesIcon'},
        {button: 'usersButton', menu: 'usersMenu', icon: 'usersIcon'}
    ];

    dropdowns.forEach(({button, menu, icon}) => {
        const buttonEl = document.getElementById(button);
        const menuEl = document.getElementById(menu);
        const iconEl = document.getElementById(icon);

        if (buttonEl && menuEl && iconEl) {
            // Set initial rotation based on menu state
            if (menuEl.style.maxHeight !== '0px') {
                iconEl.style.transform = 'rotate(180deg)';
            }

            buttonEl.addEventListener('click', () => {
                const isExpanded = menuEl.style.maxHeight !== '0px';
                menuEl.style.maxHeight = isExpanded ? '0px' : '160px';
                iconEl.style.transform = isExpanded ? 'rotate(0deg)' : 'rotate(180deg)';
            });
        }
    });

    const deleteModal = document.getElementById('deleteModal');
    const deleteButtons = document.querySelectorAll('.delete-btn');
    const closeModal = document.getElementById('closeModal');
    const cancelBtn = document.getElementById('cancelBtn');
    const deleteForm = document.getElementById('deleteForm');


    function showModal(route) {
        deleteForm.action = route;
        deleteModal.classList.remove('hidden');
    }

    function hideModal() {
        deleteModal.classList.add('hidden');
    }

    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const route = this.dataset.route;
            showModal(route);
        });
    });

    closeModal.addEventListener('click', hideModal);
    cancelBtn.addEventListener('click', hideModal);

    deleteModal.addEventListener('click', function(e) {
        if (e.target === deleteModal) {
            hideModal();
        }
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !deleteModal.classList.contains('hidden')) {
            hideModal();
        }
    });
});