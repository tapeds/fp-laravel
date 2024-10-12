<x-app-layout>
    <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-10">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Daftar Penerbangan</h2>

            <div class="mt-6 sm:mt-8 md:gap-6 flex flex-col gap-5 lg:flex-row lg:items-start xl:gap-8">
                <form id="searchForm">
                    @csrf
                    <div class="flex flex-col gap-2">
                        <div class="flex flex-col gap-0.5 w-full items-start">
                            <label for="berangkat"
                                class="block text-sm font-medium text-gray-900 dark:text-white">Asal</label>
                            <select id="berangkat"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected disabled>Pilih Asal</option>
                                <option value="CGK" {{ $asal === 'CGK' ? 'selected' : '' }}>Jakarta</option>
                                <option value="SUB" {{ $asal === 'SUB' ? 'selected' : '' }}>Surabaya</option>
                                <option value="DPS" {{ $asal === 'DPS' ? 'selected' : '' }}>Bali</option>
                                <option value="BTH" {{ $asal === 'BTH' ? 'selected' : '' }}>Batam</option>
                            </select>
                        </div>
                        <div class="flex flex-col gap-0.5 w-full items-start">
                            <label for="kedatangan"
                                class="block text-sm font-medium text-gray-900 dark:text-white">Tujuan</label>
                            <select id="kedatangan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected disabled>Pilih Tujuan</option>
                                <option value="CGK" {{ $tujuan === 'CGK' ? 'selected' : '' }}>Jakarta</option>
                                <option value="SUB" {{ $tujuan === 'SUB' ? 'selected' : '' }}>Surabaya</option>
                                <option value="DPS" {{ $tujuan === 'DPS' ? 'selected' : '' }}>Bali</option>
                                <option value="BTH" {{ $tujuan === 'BTH' ? 'selected' : '' }}>Batam</option>
                            </select>
                        </div>
                        <div class="flex flex-col gap-0.5 w-full items-start">
                            <label for="tanggal"
                                class="block text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                Perjalanan</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input id="tanggal" type="date"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Select date">
                            </div>
                        </div>
                        <div class="mt-2">
                            <x-penerbangan.filter :maskapai="$maskapai"></x-penerbangan.filter>
                        </div>
                    </div>
                </form>
                <div class="mx-auto w-full flex-none lg:max-w-xl xl:max-w-3xl">
                    <div class="space-y-6">
@if ($daftar_penerbangan->isEmpty())
    <div class="flex items-center justify-center max-lg:py-20">
        Tidak ada penerbangan yang tersedia.
    </div>
@else
    @foreach ($daftar_penerbangan as $penerbangan)
        @php
            $bandaraPenerbanganBerangkat = '';
            $bandaraPenerbanganKedatangan = '';

            if ($penerbangan->bandaraPenerbangans->first()->tx_arah == 'berangkat') {
                $bandaraPenerbanganBerangkat = $penerbangan->bandaraPenerbangans->get(0);
                $bandaraPenerbanganKedatangan = $penerbangan->bandaraPenerbangans->get(1);
            } else {
                $bandaraPenerbanganKedatangan = $penerbangan->bandaraPenerbangans->get(1);
                $bandaraPenerbanganBerangkat = $penerbangan->bandaraPenerbangans->get(0);
            }

            $bandaraBerangkat = '';
            $bandaraKedatangan = '';

            if ($bandaraPenerbanganBerangkat->tx_arah == 'berangkat') {
                $bandaraBerangkat = $penerbangan->bandaras->get(0);
                $bandaraKedatangan = $penerbangan->bandaras->get(1);
            } else {
                $bandaraBerangkat = $penerbangan->bandaras->get(1);
                $bandaraKedatangan = $penerbangan->bandaras->get(0);
            }
        @endphp

        <x-penerbangan.card href="{{ route('checkout', ['penerbangan_id' => $penerbangan->id]) }}" :jadwalKedatangan="$penerbangan->jadwal_kedatangan" :harga="$penerbangan->harga" :kapasitas="$penerbangan->kapasitas" :jadwalBerangkat="$penerbangan->jadwal_berangkat"
            :maskapaiName="$penerbangan->maskapai->name" :maskapaiImg="$penerbangan->maskapai->img" :arah="$penerbangan->bandaraPenerbangans->first()->tx_arah" :kodeBandaraKedatangan="$bandaraKedatangan->kode"
            :kotaBandaraKedatangan="$bandaraKedatangan->kota" :kodeBandaraKeberangkatan="$bandaraBerangkat->kode" :kotaBandaraKeberangkatan="$bandaraBerangkat->kota" />
    @endforeach
@endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        const asalSelect = document.getElementById('berangkat');
        const tujuanSelect = document.getElementById('kedatangan');
        const tanggalInput = document.getElementById('tanggal');
        const airlineCheckboxes = document.querySelectorAll('input[type="checkbox"]');

        function updateTujuanOptions() {
            const asalValue = asalSelect.value;

            Array.from(tujuanSelect.options).forEach(option => {
                option.disabled = (option.value === asalValue);
            });
        }

        function checkAndRedirect() {
            const asal = asalSelect.value;
            const tujuan = tujuanSelect.value;
            const tanggalPerjalanan = tanggalInput.value;

            const selectedAirlines = Array.from(airlineCheckboxes)
                .filter(checkbox => checkbox.checked)
                .map(checkbox => checkbox.id);

            if (asal && tujuan && tanggalPerjalanan) {
                const queryParams = new URLSearchParams({
                    asal: asal,
                    tujuan: tujuan,
                    tanggal_perjalanan: tanggalPerjalanan,
                    maskapai: selectedAirlines
                });

                window.location.href = `/penerbangan?${queryParams.toString()}`;
            }
        }

        asalSelect.addEventListener('change', function() {
            updateTujuanOptions();
            checkAndRedirect();
        });

        tujuanSelect.addEventListener('change', function() {
            Array.from(asalSelect.options).forEach(option => {
                option.disabled = (option.value === tujuanSelect.value);
            });
            checkAndRedirect();
        });

        tanggalInput.addEventListener('change', checkAndRedirect);

        airlineCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', checkAndRedirect);
        });

        window.addEventListener("load", function() {
            const datepickerInput = document.getElementById('tanggal');

            datepickerInput.value = "{{ $tanggal_perjalanan }}";
        });
    </script>
</x-app-layout>
