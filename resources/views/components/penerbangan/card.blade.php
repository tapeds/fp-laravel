@php
    use Carbon\Carbon;
@endphp


<div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:p-6">
    <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
        <div class="flex flex-col items-center justify-center">
            <a href="#" class="shrink-0 md:order-1">
                <img class="size-16 dark:hidden" src={{ $maskapaiImg }} alt="{{ $maskapaiName }} image"" />
            </a>
            {{ $maskapaiName }}
        </div>
        <div class="flex items-center justify-between md:   order-3 md:justify-end">
            <div class="text-end md:order-4 md:w-32">
                <p class="text-base font-bold text-orange-500 dark:text-white">
                    {{ 'Rp ' . number_format($harga, 0, ',', '.') }}
                </p>
            </div>

        </div>

        <div class="w-f</div>ull min-w-0 flex-1 space-y-4 md:order-2 md:max-w-md">
            <div class="flex gap-10">
                <div>
                    <p>Jadwal Keberangkatan :</p>
                    <p class="text-base font-medium text-gray-900 hover:underline dark:text-white">
                        {{ Carbon::parse($jadwalBerangkat)->format('d M Y H:i') }}
                    </p>
                </div>

                <div>
                    <p>Jadwal Kedatangan :</p>
                    <p class="text-base font-medium text-gray-900 hover:underline dark:text-white">
                        {{ Carbon::parse($jadwalKedatangan)->format('d M Y H:i') }}
                    </p>
                </div>
            </div>


            <div class="flex items-center gap-4">
                <button type="button"
                    class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-900 hover:underline dark:text-gray-400 dark:hover:text-white">
                    <svg class="me-1.5 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z" />
                    </svg>
                    Add to Favorites
                </button>

                <button type="button"
                    class="inline-flex items-center text-sm font-medium text-red-600 hover:underline dark:text-red-500">
                    <svg class="me-1.5 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18 17.94 6M18 18 6.06 6" />
                    </svg>
                    Remove
                </button>
            </div>
        </div>
    </div>
</div>
