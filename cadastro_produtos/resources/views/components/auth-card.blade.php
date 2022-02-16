<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div id="login_container">
        <a href="{{ route('inicial') }}"><img src="img/Logo_Promobit_Azul.png" class="rounded" alt="logomarca"  width="250" ></a>
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
