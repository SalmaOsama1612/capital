<!-- resources/views/admin/dashboard.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            لوحة التحكم (أدمن)
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- كارد إحصائية مثال -->
                    <div class="p-4 border rounded-lg">
                        <div class="text-sm text-gray-500">عدد المستخدمين</div>
                        <div class="text-3xl font-bold mt-2">123</div>
                    </div>
                    <div class="p-4 border rounded-lg">
                        <div class="text-sm text-gray-500">طلبات اليوم</div>
                        <div class="text-3xl font-bold mt-2">17</div>
                    </div>
                    <div class="p-4 border rounded-lg">
                        <div class="text-sm text-gray-500">دخل شهري</div>
                        <div class="text-3xl font-bold mt-2">$4,560</div>
                    </div>
                </div>

                <div class="mt-8">
                    <a href="{{ route('admin.dashboard') }}"
                       class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md">
                        تحديث الإحصائيات
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
