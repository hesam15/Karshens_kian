<div id="editCustomerModal" class="fixed inset-0 z-50 hidden">
    <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity"></div>
    <div class="fixed inset-0 flex items-center justify-center p-4">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden max-w-4xl w-full mx-4">
            <div class="flex justify-between items-center px-4 py-3 border-b border-gray-200 bg-gray-100">
                <h5 class="text-base font-semibold text-gray-800">ویرایش مشتری</h5>
                <button onclick="closeModal('editCustomerModal')" class="text-gray-500 hover:text-gray-700">
                    <i class="material-icons-round text-base">close</i>
                </button>
            </div>
            <div class="p-4">
                <form action="{{ route('customers.update', $customer->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-5">
                            <label for="fullname" class="block text-sm font-medium text-gray-700 mb-1">نام و نام خانوادگی</label>
                            <input type="text" id="fullname" name="fullname" value="{{ $customer->fullname }}"
                                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div class="col-span-5">
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">شماره تماس</label>
                            <input type="tel" id="phone" name="phone" value="{{ $customer->phone }}"
                                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div class="col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">&nbsp;</label>
                            <button type="submit" class="w-full inline-flex items-center justify-center px-3 py-2 bg-blue-100 text-blue-800 rounded-lg hover:bg-blue-200 transition-colors duration-200">
                                <i class="material-icons-round text-sm mr-1">save</i>
                                ذخیره
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>