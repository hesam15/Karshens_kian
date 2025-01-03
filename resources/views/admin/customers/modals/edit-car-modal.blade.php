<div id="editCarModal{{ $car->id }}" class="fixed inset-0 z-50 hidden">
    <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity"></div>
    <div class="fixed inset-0 flex items-center justify-center p-4">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden max-w-4xl w-full mx-4">
            <div class="flex justify-between items-center px-4 py-3 border-b border-gray-200 bg-gray-100">
                <h5 class="text-base font-semibold text-gray-800">ویرایش خودرو</h5>
                <button onclick="closeModal('editCarModal{{ $car->id }}')" class="text-gray-500 hover:text-gray-700">
                    <i class="material-icons-round text-base">close</i>
                </button>
            </div>
            <div class="p-4">
                <form action="{{ route('cars.update', $car->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-4">
                            <label for="name{{ $car->id }}" class="block text-sm font-medium text-gray-700 mb-1">نوع خودرو</label>
                            <input type="text" id="name{{ $car->id }}" name="name" value="{{ $car->name }}"
                                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div class="col-span-4">
                            <label for="plate{{ $car->id }}" class="block text-sm font-medium text-gray-700 mb-1">پلاک</label>
                            <div class="flex items-center gap-1 ltr">
                                <input type="text" maxlength="2" placeholder="ایران" name="plate_iran" value="{{ substr($car->plate_number, 0, 2) }}"
                                    class="w-16 px-3 py-2 text-sm text-center border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <input type="text" maxlength="3" placeholder="سه رقم" name="plate_three" value="{{ substr($car->plate_number, 3, 3) }}"
                                    class="w-20 px-3 py-2 text-sm text-center border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <input type="text" maxlength="1" placeholder="حرف" name="plate_letter" value="{{ substr($car->plate_number, 2, 1) }}"
                                    class="w-12 px-3 py-2 text-sm text-center border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <input type="text" maxlength="2" placeholder="دو رقم" name="plate_two" value="{{ substr($car->plate_number, 6, 2) }}"
                                    class="w-16 px-3 py-2 text-sm text-center border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>                        
                        <div class="col-span-2">
                            <label for="color{{ $car->id }}" class="block text-sm font-medium text-gray-700 mb-1">رنگ</label>
                            <input type="text" id="color{{ $car->id }}" name="color" value="{{ $car->color }}"
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