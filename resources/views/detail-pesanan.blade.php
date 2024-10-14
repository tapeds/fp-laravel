@php
    use Carbon\Carbon;
@endphp

<x-app-layout>
<section class="py-8 md:py-16 dark:bg-gray-900 antialiased">
    <div class="max-w-screen-xl mx-auto 2xl:px-0">
      <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16">
        <div class="shrink-0 max-w-md lg:max-w-lg mx-auto">
          <img class="w-full dark:hidden" src="{{ $detail->penerbangan->maskapai->img }}" alt="" />
        </div>

        <div class="mt-6 sm:mt-8 lg:mt-0">
          <h1
            class="text-xl font-bold text-gray-900 sm:text-2xl dark:text-white"
          >
          Detail Tiket {{ $detail->penerbangan->no_penerbangan }}
          </h1>

        <div class='flex flex-col md:flex-row w-full items-center max-md:gap-4 mt-5 justify-center'>
        <div class='basis-1/2 flex flex-col gap-1 items-center justify-center'>
        <p>{{ carbon::parse($detail->penerbangan->jadwal_berangkat)->format('d M Y H:i') }}</p>
        <p class='font-semibold text-xl'>{{ $detail->penerbangan->bandaraPenerbangans[0]->bandara->kode}}</p>
            <p class='font-medium'>{{ $detail->penerbangan->bandaraPenerbangans[0]->bandara->name}}</p>
        </div>
        <div class='text-xl'>
            &raquo;
        </div>
        <div class='basis-1/2 flex flex-col gap-1 items-center justify-center'>
        <p>{{ carbon::parse($detail->penerbangan->jadwal_kedatangan)->format('d M Y H:i') }}</p>
        <p class='font-semibold text-xl'>{{ $detail->penerbangan->bandaraPenerbangans[1]->bandara->kode}}</p>
            <p class='font-medium'>{{ $detail->penerbangan->bandaraPenerbangans[1]->bandara->name}}</p>
        </div>
        </div>

          <hr class="my-6 md:my-8 border-gray-200 dark:border-gray-800" />

        <h2 class='font-semibold text-xl'>
            Detail Penumpang:
        </h2>

        <ul class='mt-2'>
            @foreach ($detail->passengers as $passenger)
                <li class='text-gray-500'>{{ $passenger->name }} - {{ $passenger->nik }}</li>
            @endforeach
        </ul>
          <p class='text-2xl text-gray-700 font-medium mt-5'>
            {{ 'Rp ' . number_format($detail->penerbangan->harga, 0, ',', '.') }}
          </p>
          <div class='mt-7 md:mt-10 w-full flex max-lg:justify-center max-lg:items-center'>
            <?php
                echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG("4", "C39+",6,44) . '" alt="barcode"   />';
            ?>
        </div>
      </div>
    </div>
  </section>
</x-app-layout>
