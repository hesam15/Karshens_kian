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
            startTimer(300);
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

function startTimer(duration) {
    let timer = duration;
    const timerDisplay = document.getElementById('timer');
    
    const countdown = setInterval(() => {
        const minutes = Math.floor(timer / 60);
        const seconds = timer % 60;

        timerDisplay.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;

        if (--timer < 0) {
            clearInterval(countdown);
            timerDisplay.textContent = 'زمان به پایان رسید';
            resetVerificationForm();
        }
    }, 1000);
}

function resetVerificationForm() {
    document.getElementById('verification-form')?.remove();
    document.getElementById('phone').removeAttribute('readonly');
    document.getElementById('verify-phone').removeAttribute('disabled');
    localStorage.removeItem('verificationStartTime');
    localStorage.removeItem('phoneNumber');
}

function saveStartTime() {
    localStorage.setItem('verificationStartTime', Date.now());
    localStorage.setItem('phoneNumber', document.getElementById('phone').value);
}

document.addEventListener('DOMContentLoaded', () => {
    const startTime = localStorage.getItem('verificationStartTime');
    const savedPhone = localStorage.getItem('phoneNumber');
    
    if (startTime && savedPhone) {
        const elapsedTime = Math.floor((Date.now() - startTime) / 1000);
        const remainingTime = 300 - elapsedTime;
        
        if (remainingTime > 0) {
            document.getElementById('phone').value = savedPhone;
            showVerificationForm();
            startTimer(remainingTime);
        } else {
            localStorage.removeItem('verificationStartTime');
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