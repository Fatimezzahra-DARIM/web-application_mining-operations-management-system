<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100  dark:bg-gray-900"style="background-color:#18181b  !important; ">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-[#3f3f46]  overflow-hidden sm:rounded-lg" style="background-color:#F8B134!important; box-shadow: 2px 2px 10px 4px rgba(255, 193, 7, 0.5) !important;">
        {{ $slot }}
    </div>
</div>
