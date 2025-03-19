<div class="min-h-screen flex flex-col items-center justify-center bg-gray-100">
    <div>
        <x-application-logo class="w-20 h-20" />
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md rounded-lg">
        {{ $slot }}
    </div>
</div>
