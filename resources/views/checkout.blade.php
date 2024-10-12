<x-app-layout>
    <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
        <form id="data_form" action="{{ route('checkout.store') }}" method="POST">
            @csrf
            <div class="mt-6 sm:mt-8 lg:flex lg:items-start lg:gap-12 xl:gap-16">
                {{-- !LEFT SIDE --}}
                <section class="min-w-0 flex-1 space-y-8">
                    <div class="space-y-4">
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Data Diri Penumpang</h2>

                        <!-- Dropdown for selecting the number of entries -->
                        <div>
                            <label for="num_entries" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                Pilih Jumlah Penumpang (maksimal 3 tiket per transaksi)
                            </label>
                            <select id="num_entries"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                onchange="updateForm()">
                                <option value="0" hidden>0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>

                        <!-- Dynamic input fields based on selected number -->
                        <div id="data_entries" class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        </div>

                        <script>
                            const penerbanganId = {{ $penerbangan_id }};
                            const hargaPenerbangan = {{ $harga }};

                            function updateForm() {
                                const numEntries = document.getElementById('num_entries').value;
                                const dataEntries = document.getElementById('data_entries');
                                const subtotalElement = document.getElementById('subtotal');
                                // const pricePerEntry = 100; // Define the price for each entry

                                // Clear previous entries before adding new ones
                                dataEntries.innerHTML = `
                                    <input class="hidden" type="text" name="penerbangan_id" id="penerbangan_id" value="${penerbanganId}">
                                `;

                                for (let i = 0; i < numEntries; i++) {
                                    dataEntries.innerHTML += `
                                        <div>
                                            <label for="name_${i}" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                                Nama Penumpang ke-${i + 1}
                                            </label>
                                            <input type="text" id="name_${i}" name="name[]" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="Input Nama Penumpang ke-${i+1}" required />
                                        </div>
                                        <div>
                                            <label for="nik_${i}" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">NIK Penumpang ke-${i + 1}</label>
                                            <input type="text" id="nik_${i}" name="nik[]" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="Input NIK Penumpang ke-${i+1}" required />
                                        </div>`;
                                }


                                const subtotal = numEntries * hargaPenerbangan;
                                subtotalElement.textContent =
                                    `${subtotal.toLocaleString('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0, maximumFractionDigits: 0 }).replace('IDR', '').trim()}`;
                            }
                        </script>

                        <!-- Display submitted data -->
                        @if (isset($submittedData))
                            <div class="mt-4">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Submitted Data</h3>
                                <ul class="space-y-2">
                                    @foreach ($submittedData['name'] as $index => $name)
                                        <li class="text-gray-800 dark:text-gray-300">
                                            Name: {{ $name }}, NIK: {{ $submittedData['nik'][$index] }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="bg-red-500 text-white p-4 mb-4">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="bg-red-500 text-white p-4 mb-4">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('message'))
                            <div class="bg-green-500 text-white p-4 mb-4">
                                {{ session('message') }}
                            </div>
                        @endif
                    </div>

                </section>

                {{-- ! right menu --}}
                <div class="mt-6 w-full space-y-6 sm:mt-8 lg:mt-0 lg:max-w-xs xl:max-w-md">
                    <div class="flow-root">
                        <div class="-my-3 divide-y divide-gray-200 dark:divide-gray-800">
                            <dl class="flex items-center justify-between gap-4 py-3">
                                <dt class="text-base font-bold text-gray-900 dark:text-white">Total Harga</dt>
                                <dd id="subtotal" class="text-base font-bold text-gray-900 dark:text-white">RP. 0</dd>
                            </dl>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <button type="submit"
                            class="flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Proceed
                            to Payment</button>
                    </div>
                </div>
            </div>
        </form>
    </section>
</x-app-layout>
