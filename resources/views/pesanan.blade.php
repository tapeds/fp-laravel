<x-app-layout>
    <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-10">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Pesanan Saya</h2>

            <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">
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

        <x-penerbangan.card href="{{ route('pesanan', ['id' => $penerbangan->id]) }}"  :jadwalKedatangan="$penerbangan->jadwal_kedatangan" :harga="$penerbangan->harga" :kapasitas="$penerbangan->kapasitas" :jadwalBerangkat="$penerbangan->jadwal_berangkat"
            :maskapaiName="$penerbangan->maskapai->name" :maskapaiImg="$penerbangan->maskapai->img" :arah="$penerbangan->bandaraPenerbangans->first()->tx_arah" :kodeBandaraKedatangan="$bandaraKedatangan->kode"
            :kotaBandaraKedatangan="$bandaraKedatangan->kota" :kodeBandaraKeberangkatan="$bandaraBerangkat->kode" :kotaBandaraKeberangkatan="$bandaraBerangkat->kota" />
    @endforeach
@endif
                </div>


            </div>
        </div>
    </section>
</x-app-layout>
