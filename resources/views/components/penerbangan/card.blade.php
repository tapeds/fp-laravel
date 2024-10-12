@php
    use Carbon\Carbon;
@endphp


<div class="rounded-lg border hover:ring-blue-400 hover:ring-2 hover:cursor-pointer border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:p-6">
    <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
        <div class="flex flex-col items-center justify-center">
            <a href="#" class="shrink-0 md:order-1">
                <img class="size-16 object-contain" src={{ $maskapaiImg }} alt="{{ $maskapaiName }} image"" />
            </a>
        </div>
        <div class="flex items-center justify-center md:order-3 md:justify-end">
            <div class="text-end md:order-4 md:w-32">
                <p class="text-base font-bold text-orange-500  dark:text-white">
                    {{ 'Rp ' . number_format($harga, 0, ',', '.') }}
                </p>
            </div>

        </div>

        <div class="w-full min-w-0 flex-1 space-y-4 md:order-2 md:max-w-md">
            <div class="flex flex-col md:flex-row gap-5 md:gap-10 items-center justify-center">
            <div class="flex flex-col gap-2 lg:gap-5">
                <div class='basis-1/2 flex flex-col items-center justify-center'>
                    <p>Jadwal Keberangkatan :</p>
                    <div>
                        <p class="text-base font-medium text-gray-900 hover:underline dark:text-white">
                            {{ Carbon::parse($jadwalBerangkat)->format('d M Y H:i') }}
                        </p>
                    </div>
                    </div>
                <div class='basis-1/2 flex flex-col items-center justify-center'>
                    <p class='text-lg font-bold'>{{ $kodeBandaraKeberangkatan }}</p>
                    <p >{{ $kotaBandaraKeberangkatan }}</p>
                </div>
                </div>
                <div class='max-md:hidden text-xl'>
                    &raquo;
                </div>
                <div class='md:hidden text-xl'>
                    &#65086;
                </div>
                <div class='flex flex-col gap-2 lg:gap-5'>
                <div class='basis-1/2 flex flex-col items-center justify-center'>
                    <p>Jadwal Kedatangan :</p>
                    <p class="text-base font-medium text-gray-900 hover:underline dark:text-white">
                        {{ Carbon::parse($jadwalKedatangan)->format('d M Y H:i') }}
                    </p>
                    </div>
                <div class='basis-1/2 flex flex-col items-center justify-center'>
                    <p class='text-lg font-bold'>{{ $kodeBandaraKedatangan }}</p>
                    <p >{{ $kotaBandaraKedatangan }}</p>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
