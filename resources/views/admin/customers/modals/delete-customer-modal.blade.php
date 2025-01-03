<div id="deleteCustomerModal" class="fixed inset-0 z-50 hidden">
    <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity"></div>
    <div class="fixed inset-0 flex items-center justify-center p-4">
        <div class="bg-white rounded-xl shadow-lg w-96">
            <div class="px-4 py-3 border-b border-gray-200 flex justify-between items-center">
                <h5 class="text-base font-bold text-gray-800">تایید حذف مشتری</h5>
                <button onclick="closeModal('deleteCustomerModal')" class="text-gray-400 hover:text-gray-500">
                    <i class="material-icons-round text-base">close</i>
                </button>
            </div>
            <div class="px-4 py-3">
                <p class="text-sm text-gray-600">آیا از حذف این مشتری اطمینان دارید؟</p>
            </div>
            <div class="px-4 py-3 bg-gray-50 border-t border-gray-200 flex justify-end gap-2">
                <button onclick="closeModal('deleteCustomerModal')" 
                        class="inline-flex items-center px-2 py-1 bg-gray-100 text-gray-800 rounded hover:bg-gray-200 transition-colors duration-200">
                    <span class="text-xs">انصراف</span>
                </button>
                <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center px-2 py-1 bg-rose-100 text-rose-800 rounded hover:bg-rose-200 transition-colors duration-200">
                        <span class="text-xs">حذف</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>