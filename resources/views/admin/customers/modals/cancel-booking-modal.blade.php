<div id="cancelBookingModal{{ $booking->id }}" class="fixed inset-0 z-50 hidden">
    <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity"></div>
    <div class="fixed inset-0 flex items-center justify-center p-4">
        <div class="bg-white rounded-xl shadow-lg w-96">
            <div class="px-4 py-3 border-b border-gray-200 flex justify-between items-center">
                <h5 class="text-base font-bold text-gray-800">تایید کنسل کردن نوبت</h5>
                <button onclick="closeModal('cancelBookingModal{{ $booking->id }}')" class="text-gray-400 hover:text-gray-500">
                    <i class="material-icons-round text-base">close</i>
                </button>
            </div>
            <div class="px-4 py-3">
                <p class="text-sm text-gray-600">آیا از کنسل کردن این نوبت اطمینان دارید؟</p>
            </div>
            <div class="px-4 py-3 bg-gray-50 border-t border-gray-200 flex justify-end gap-2">
                <button onclick="closeModal('cancelBookingModal{{ $booking->id }}')" 
                        class="inline-flex items-center px-2 py-1 bg-gray-100 text-gray-800 rounded hover:bg-gray-200 transition-colors duration-200">
                    <span class="text-xs">انصراف</span>
                </button>
                <form action="{{ route('bookings.cancel', $booking->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="inline-flex items-center px-2 py-1 bg-rose-100 text-rose-800 rounded hover:bg-rose-200 transition-colors duration-200">
                        <span class="text-xs">کنسل کردن</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>