@props(['id', 'title', 'action' => "#", 'method' => "POST"])

<div id="{{ $id }}" data-modal-id="{{ $id }}" class="fixed inset-0 z-50 hidden">
    <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity"></div>
    <div class="fixed inset-0 flex items-center justify-center p-4">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden max-w-4xl w-full mx-4">
            <div class="flex justify-between items-center px-4 py-3 border-b border-gray-200 bg-gray-100">
                <h5 class="text-base font-semibold text-gray-800">{{ $title }}</h5>
                <button type="button" onclick="closeModal('{{ $id }}')" class="text-gray-500 hover:text-gray-700">
                    <i class="material-icons-round text-base">close</i>
                </button>
            </div>
            
            <form action="{{ $action }}" method="{{ $method }}">
                <div class="p-4">
                    {{ $slot }}
                </div>

                <div class="flex justify-end gap-2 px-4 py-3 bg-gray-50 border-t border-gray-200">
                    <button type="button" 
                            onclick="closeModal('{{ $id }}')"
                            class="px-4 py-2 text-sm text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors duration-200">
                        انصراف
                    </button>
                    <button type="submit" 
                            class="px-4 py-2 text-sm text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors duration-200">
                        ذخیره تغییرات
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>