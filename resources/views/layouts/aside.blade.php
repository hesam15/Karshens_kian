<div class="fixed top-0 right-0 h-screen w-52 bg-white border-l border-gray-200">
    <!-- Logo -->
    <div class="sticky top-0 z-50 bg-gray-100 backdrop-blur-sm border-b border-gray-200 p-4">
        <span class="text-xl font-bold text-gray-800">کارشناسی خودرو</span>
    </div>

    <!-- Navigation -->
    <nav class="h-[calc(100vh-4rem)] overflow-y-auto">
        <div class="flex flex-col h-full p-3">
            <!-- Main Menu -->
            <div class="flex-1 space-y-1">
                <a href="{{route('home')}}" class="flex items-center px-3 py-2 text-sm rounded-lg transition-colors duration-150 hover:bg-gray-100 {{ Route::currentRouteName() == 'home' ? 'bg-gray-100' : '' }}">
                    <i class="material-icons-round text-gray-500 text-lg ml-2">dashboard</i>
                    <span class="text-gray-700">داشبورد</span>
                </a>

                <a href="{{route('admin.show')}}" class="flex items-center px-3 py-2 text-sm rounded-lg transition-colors duration-150 hover:bg-gray-100 {{ Route::currentRouteName() == 'admin.show' ? 'bg-gray-100' : '' }}">
                    <i class="material-icons-round text-gray-500 text-lg ml-2">people</i>
                    <span class="text-gray-700">مشتریان</span>
                </a>

                <a href="{{route('customer.form')}}" class="flex items-center px-3 py-2 text-sm rounded-lg transition-colors duration-150 hover:bg-gray-100 {{ Route::currentRouteName() == 'customer.form' ? 'bg-gray-100' : '' }}">
                    <i class="material-icons-round text-gray-500 text-lg ml-2">event</i>
                    <span class="text-gray-700">نوبت‌دهی</span>
                </a>

                <!-- Services Dropdown -->
                <div class="relative">
                    <button id="servicesButton" class="w-full flex items-center justify-between px-3 py-2 text-sm rounded-lg hover:bg-gray-100 group">
                        <div class="flex items-center">
                            <i class="material-icons-round text-gray-500 text-lg ml-2">build</i>
                            <span class="text-gray-700">ثبت خدمات</span>
                        </div>
                        <i class="material-icons-round text-gray-400 text-sm transform transition-transform duration-200" id="servicesIcon">expand_more</i>
                    </button>

                    <div id="servicesMenu" class="overflow-hidden transition-all duration-200" style="max-height: {{ in_array(Route::currentRouteName(), ['show.options', 'add.options.form']) ? '160px' : '0px' }}">
                        <div class="pr-7 mr-2 border-r border-gray-200 mt-1 space-y-1">
                            <a href="{{route('show.options')}}" class="flex items-center px-3 py-2 text-sm rounded-lg hover:bg-gray-100 {{ Route::currentRouteName() == 'show.options' ? 'bg-gray-100' : '' }}">
                                <i class="material-icons-round text-gray-500 text-lg ml-2">list</i>
                                <span class="text-gray-700">نمایش خدمات</span>
                            </a>
                            <a href="{{route('add.options.form')}}" class="flex items-center px-3 py-2 text-sm rounded-lg hover:bg-gray-100 {{ Route::currentRouteName() == 'add.options.form' ? 'bg-gray-100' : '' }}">
                                <i class="material-icons-round text-gray-500 text-lg ml-2">add</i>
                                <span class="text-gray-700">ایجاد خدمات</span>
                            </a>
                        </div>
                    </div>
                </div>

                @role('admin')
                <!-- Roles Dropdown -->
                <div class="relative">
                    <button id="rolesButton" class="w-full flex items-center justify-between px-3 py-2 text-sm rounded-lg hover:bg-gray-100 group">
                        <div class="flex items-center">
                            <i class="material-icons-round text-gray-500 text-lg ml-2">admin_panel_settings</i>
                            <span class="text-gray-700">مدیریت نقش‌ها</span>
                        </div>
                        <i class="material-icons-round text-gray-400 text-sm transform transition-transform duration-200" id="rolesIcon">expand_more</i>
                    </button>

                    <div id="rolesMenu" class="overflow-hidden transition-all duration-200" style="max-height: {{ in_array(Route::currentRouteName(), ['roles.index', 'roles.create']) ? '160px' : '0px' }}">
                        <div class="pr-7 mr-2 border-r border-gray-200 mt-1 space-y-1">
                            <a href="{{route('roles.index')}}" class="flex items-center px-3 py-2 text-sm rounded-lg hover:bg-gray-100 {{ Route::currentRouteName() == 'roles.index' ? 'bg-gray-100' : '' }}">
                                <i class="material-icons-round text-gray-500 text-lg ml-2">list</i>
                                <span class="text-gray-700">نمایش نقش‌ها</span>
                            </a>
                            <a href="{{route('roles.create')}}" class="flex items-center px-3 py-2 text-sm rounded-lg hover:bg-gray-100 {{ Route::currentRouteName() == 'roles.create' ? 'bg-gray-100' : '' }}">
                                <i class="material-icons-round text-gray-500 text-lg ml-2">add</i>
                                <span class="text-gray-700">ایجاد نقش</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Users Dropdown -->
                <div class="relative">
                    <button id="usersButton" class="w-full flex items-center justify-between px-3 py-2 text-sm rounded-lg hover:bg-gray-100 group">
                        <div class="flex items-center">
                            <i class="material-icons-round text-gray-500 text-lg ml-2">manage_accounts</i>
                            <span class="text-gray-700">مدیریت کاربران</span>
                        </div>
                        <i class="material-icons-round text-gray-400 text-sm transform transition-transform duration-200" id="usersIcon">expand_more</i>
                    </button>

                    <div id="usersMenu" class="overflow-hidden transition-all duration-200" style="max-height: {{ in_array(Route::currentRouteName(), ['users.index', 'users.create']) ? '160px' : '0px' }}">
                        <div class="pr-7 mr-2 border-r border-gray-200 mt-1 space-y-1">
                            <a href="{{route('users.index')}}" class="flex items-center px-3 py-2 text-sm rounded-lg hover:bg-gray-100 {{ Route::currentRouteName() == 'users.index' ? 'bg-gray-100' : '' }}">
                                <i class="material-icons-round text-gray-500 text-lg ml-2">list</i>
                                <span class="text-gray-700">نمایش کاربران</span>
                            </a>
                            <a href="{{route('users.create')}}" class="flex items-center px-3 py-2 text-sm rounded-lg hover:bg-gray-100 {{ Route::currentRouteName() == 'users.create' ? 'bg-gray-100' : '' }}">
                                <i class="material-icons-round text-gray-500 text-lg ml-2">add</i>
                                <span class="text-gray-700">ایجاد کاربر</span>
                            </a>
                        </div>
                    </div>
                </div>
                @endrole
            </div>

            <!-- Logout Button -->
            <div class="border-t border-gray-200 pt-4 mt-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center px-3 py-2 text-sm rounded-lg hover:bg-gray-100 text-red-600">
                        <i class="material-icons-round text-red-500 text-lg ml-2">logout</i>
                        <span>خروج از حساب</span>
                    </button>
                </form>
            </div>
        </div>
    </nav>
</div>