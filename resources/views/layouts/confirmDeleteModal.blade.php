<div id="deleteModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 hidden">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-lg shadow-xl w-96">
            <div class="px-4 py-3 border-b border-gray-200 flex justify-between items-center">
                <h5 class="text-base font-bold text-gray-800">تایید حذف نقش</h5>
                <button type="button" id="closeModal" class="text-gray-400 hover:text-gray-500">
                    <span class="material-icons-round text-base">close</span>
                </button>
            </div>

            <div class="px-4 py-3">
                <p class="text-sm text-gray-600">آیا از حذف این نقش اطمینان دارید؟</p>
            </div>

            <div class="px-4 py-3 bg-gray-50 border-t border-gray-200 flex justify-end gap-2">
                <button type="button" id="cancelBtn" class="px-3 py-1.5 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-md text-sm transition duration-200">
                    انصراف
                </button>
                <form method="POST" id="deleteForm">
                    @csrf
                    <button type="submit" class="px-3 py-1.5 bg-red-600 hover:bg-red-700 text-white rounded-md text-sm transition duration-200">
                        حذف
                    </button>
                </form>
            </div>
        </div>
    </div>
</div