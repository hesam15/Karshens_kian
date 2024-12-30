window.addEventListener('beforeunload', function(e) {
    if (!window.location.pathname.includes('register')) {
        resetVerificationForm();
    }
});

document.addEventListener('click', function(e) {
    if (e.target.tagName === 'A') {
        const href = e.target.getAttribute('href');
        if (href && (href.includes('login') || !href.includes('register'))) {
            resetVerificationForm();
        }
    }
});

document.getElementById('verify-phone').addEventListener('click', function() {
    const phoneNumber = document.getElementById('phone').value;
    const formData = new FormData();
    formData.append('phone', phoneNumber);
    formData.append('_token', document.querySelector('input[name="_token"]').value);

    fetch('/sendVerify', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (response.ok) {
            saveStartTime();
            showVerificationForm();
            startTimer();
        }
    })
    .catch(error => console.error('Error:', error));
});

function showVerificationForm() {
    const verificationHTML = `
        <div id="verification-form" class="mt-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">کد تایید</label>
            <div class="relative">
                <input type="text" name="verification_code" maxlength="6" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 placeholder-gray-400" 
                    placeholder="کد تایید را وارد کنید">
                <button type="button" id="verify-code-btn" 
                    class="absolute left-2 top-1/2 -translate-y-1/2 px-4 py-1.5 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors duration-200 text-sm">
                    تایید کد
                </button>
            </div>
            <span id="timer" class="text-sm text-gray-600 mt-2 block"></span>
        </div>`;

    document.getElementById('phone').parentNode.insertAdjacentHTML('afterend', verificationHTML);
    document.getElementById('phone').setAttribute('readonly', true);
    document.getElementById('verify-phone').setAttribute('disabled', true);
}

function saveStartTime() {
    const startTime = Date.now();
    const endTime = startTime + (300 * 1000);
    localStorage.setItem('verificationEndTime', endTime);
    localStorage.setItem('phoneNumber', document.getElementById('phone').value);
}

function startTimer() {
    const timerDisplay = document.getElementById('timer');
    const endTime = parseInt(localStorage.getItem('verificationEndTime'));
    
    const countdown = setInterval(() => {
        const now = Date.now();
        const remainingTime = Math.max(0, Math.floor((endTime - now) / 1000));
        
        if (remainingTime <= 0) {
            clearInterval(countdown);
            timerDisplay.textContent = 'زمان به پایان رسید';
            resetVerificationForm();
            return;
        }

        const minutes = Math.floor(remainingTime / 60);
        const seconds = remainingTime % 60;
        timerDisplay.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
    }, 1000);
}

function resetVerificationForm() {
    document.getElementById('verification-form')?.remove();
    document.getElementById('phone').removeAttribute('readonly');
    document.getElementById('verify-phone').removeAttribute('disabled');
    localStorage.removeItem('verificationEndTime');
    localStorage.removeItem('phoneNumber');
}

document.addEventListener('DOMContentLoaded', () => {
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

document.addEventListener('click', function(e) {
    if (e.target && e.target.id === 'verify-code-btn') {
        const code = document.querySelector('input[name="verification_code"]').value;
        const phone = document.getElementById('phone').value;
        const formData = new FormData();
        formData.append('code', code);
        formData.append('phone', phone);
        formData.append('_token', document.querySelector('input[name="_token"]').value);

        fetch('/verifyCode', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (response.ok) {
                alert('کد با موفقیت تایید شد');
                resetVerificationForm();
            } else {
                alert('کد وارد شده صحیح نمی‌باشد');
            }
        })
        .catch(error => {
            alert('خطا در ارسال درخواست');
            console.error('Error:', error);
        });
    }
});

document.querySelector('form').addEventListener('submit', function(e) {
    const verificationForm = document.getElementById('verification-form');
    const verificationCode = document.querySelector('input[name="verification_code"]');
    
    if (verificationForm && !verificationCode.value) {
        e.preventDefault();
        alert('لطفا کد تایید را وارد کنید');
        return false;
    }
});