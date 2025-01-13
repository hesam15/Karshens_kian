// Path checking utility
const isRelevantPath = () => {
    return window.location.pathname.includes('register') || 
           window.location.pathname.includes('dashboard/users');
};

// Event Listeners
window.addEventListener('beforeunload', () => {
    if (!isRelevantPath()) resetVerificationForm();
});

document.addEventListener('click', (e) => {
    if (e.target.tagName === 'A') {
        const href = e.target.getAttribute('href');
        if (href && !isRelevantPath()) resetVerificationForm();
    }
});

// Phone verification handler
document.querySelectorAll('.verify-phone-btn').forEach(button => {
    button.addEventListener('click', function() {
        const userId = this.dataset.phoneId;
        const phoneNumber = document.getElementById(`phone-${userId}`).value;
        
        if (!phoneNumber || phoneNumber.length !== 11) {
            alert('لطفا شماره موبایل معتبر وارد کنید');
            return;
        }

        this.disabled = true;
        this.textContent = 'در حال ارسال...';

        const formData = new FormData();
        formData.append('phone', phoneNumber);
        formData.append('_token', document.querySelector('input[name="_token"]').getAttribute('value'));

        fetch('http://127.0.0.1:8000/sendVerify', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            saveStartTime(userId);
            showVerificationForm(userId);
            startTimer(userId);
            alert('کد تایید با موفقیت ارسال شد');
        })
        .catch(error => {
            console.error('Error:', error);
            alert('خطا در ارسال کد');
        })
        .finally(() => {
            this.disabled = false;
            this.textContent = 'ارسال کد تایید';
        });
    });
});

// Verification form UI
function showVerificationForm(userId) {
    const verificationHTML = `
        <div id="verification-form-${userId}" class="mt-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">کد تایید</label>
            <div class="relative">
                <input type="text" name="verification_code" maxlength="4"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 placeholder-gray-400"
                    placeholder="کد تایید را وارد کنید">
                <button type="button" id="verify-code-btn-${userId}"
                    class="absolute left-2 top-1/2 -translate-y-1/2 px-4 py-1.5 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors duration-200 text-sm">
                    تایید کد
                </button>
            </div>
            <span id="timer-${userId}" class="text-sm text-gray-600 mt-2 block"></span>
        </div>`;

    document.getElementById(`phone-${userId}`).parentNode.insertAdjacentHTML('afterend', verificationHTML);
    document.getElementById(`phone-${userId}`).setAttribute('readonly', true);
    document.querySelector(`[data-phone-id="${userId}"]`).setAttribute('disabled', true);
}

// Timer management
function saveStartTime(userId) {
    const startTime = Date.now();
    const endTime = startTime + (300 * 1000); // 5 minutes
    localStorage.setItem('verificationEndTime', endTime);
    localStorage.setItem('phoneNumber', document.getElementById(`phone-${userId}`).value);
}

function startTimer(userId) {
    const timerDisplay = document.getElementById(`timer-${userId}`);
    const endTime = parseInt(localStorage.getItem('verificationEndTime'));

    const countdown = setInterval(() => {
        const now = Date.now();
        const remainingTime = Math.max(0, Math.floor((endTime - now) / 1000));

        if (remainingTime <= 0) {
            clearInterval(countdown);
            timerDisplay.textContent = 'زمان به پایان رسید';
            resetVerificationForm(userId);
            return;
        }

        const minutes = Math.floor(remainingTime / 60);
        const seconds = remainingTime % 60;
        timerDisplay.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
    }, 1000);
}

function resetVerificationForm(userId) {
    document.getElementById(`verification-form-${userId}`)?.remove();
    const phoneInput = document.getElementById(`phone-${userId}`);
    const verifyButton = document.querySelector(`[data-phone-id="${userId}"]`);
    
    if (phoneInput) phoneInput.removeAttribute('readonly');
    if (verifyButton) verifyButton.removeAttribute('disabled');
    
    localStorage.removeItem('verificationEndTime');
    localStorage.removeItem('phoneNumber');
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', () => {
    if (!isRelevantPath()) return;

    const endTime = parseInt(localStorage.getItem('verificationEndTime'));
    const savedPhone = localStorage.getItem('phoneNumber');

    if (endTime && savedPhone) {
        const now = Date.now();
        const remainingTime = Math.max(0, Math.floor((endTime - now) / 1000));
        
        if (remainingTime > 0) {
            document.getElementById('phone').value = savedPhone;
            showVerificationForm();
            startTimer();
        } else {
            localStorage.removeItem('verificationEndTime');
            localStorage.removeItem('phoneNumber');
        }
    }
});

// Verify code handler
// Verify code handler
document.addEventListener('click', function(e) {
    if (e.target.id && e.target.id.startsWith('verify-code-btn-')) {
        const userId = e.target.id.split('-').pop();
        const code = e.target.parentNode.querySelector('input[name="verification_code"]').value;
        const phone = document.getElementById(`phone-${userId}`).value;
        
        if (!code || code.length !== 4) {
            alert('لطفا کد 4 رقمی را وارد کنید');
            return;
        }

        const formData = new FormData();
        formData.append('code', code);
        formData.append('phone', phone);
        formData.append('_token', document.querySelector('input[name="_token"]').value);

        fetch('http://127.0.0.1:8000/verifyCode', {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
            },
            body: formData
        })
        .then(response => {
            if (response.ok) {
                alert('کد با موفقیت تایید شد');
                resetVerificationForm(userId);
            } else {
                alert('کد وارد شده صحیح نمی‌باشد');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('خطا در ارسال درخواست');
        });
    }
});

// Form submission validation
document.querySelector('form')?.addEventListener('submit', function(e) {
    const verificationForm = document.getElementById('verification-form-register');
    const verificationCode = verificationForm?.querySelector('input[name="verification_code"]');
    
    if (verificationForm && !verificationCode?.value) {
        e.preventDefault();
        alert('لطفا کد تایید را وارد کنید');
    }
});