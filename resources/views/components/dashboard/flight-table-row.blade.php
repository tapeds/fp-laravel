<tr class="border-b dark:border-gray-700">
    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $flight->id }}
    </th>
    <td class="px-6 py-4">{{ $flight->maskapai->name }}</td>
    <td class="px-6 py-4">{{ 'Rp ' . number_format($flight->harga, 0, ',', '.') }}</td>
    <td class="px-6 py-4">{{ $flight->kapasitas }}</td>
    <td class="px-6 py-4">{{ $flight->jadwal_berangkat }}</td>
    <td class="px-6 py-4">{{ $flight->jadwal_kedatangan }}</td>
    <td class="px-6 py-4 flex flex-col gap-2">
        <button data-modal-target="updateProductModal-{{ $flight->id }}"
            data-modal-toggle="updateProductModal-{{ $flight->id }}" type="button"
            class="text-blue-600 hover:underline"
            onclick="openUpdateModal('{{ $flight->id }}', '{{ $flight->maskapai->name }}', '{{ $flight->harga }}', '{{ $flight->kapasitas }}', '{{ $flight->jadwal_berangkat }}', '{{ $flight->jadwal_kedatangan }}')">
            Edit
        </button>
        <button data-modal-target="deleteModal-{{ $flight->id }}"
            data-modal-toggle="deleteModal-{{ $flight->id }}" type="button" class="text-red-600 hover:underline"
            onclick="openDeleteModal('{{ $flight->id }}')">
            Delete
        </button>
    </td>
</tr>

<div id="updateProductModal-{{ $flight->id }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Update Flight</h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="updateProductModal-{{ $flight->id }}">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="{{ route('updatePenerbangan', $flight->id) }}" method="PUT"> @csrf
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div>
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="name" id="name" value="{{ $flight->maskapai->name }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>
                    <div>
                        <label for="harga"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                        <input type="number" value="{{ $flight->harga }}" name="harga" id="harga"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>
                    <div>
                        <label for="kapasitas"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kapasitas</label>
                        <input type="number" value="{{ $flight->kapasitas }}" name="kapasitas" id="kapasitas"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>
                    <div>
                        <label for="jadwal_berangkat"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jadwal
                            Berangkat</label>
                        <input type="datetime-local" value="{{ $flight->jadwal_berangkat }}" name="jadwal_berangkat"
                            id="jadwal_berangkat"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>
                    <div>
                        <label for="jadwal_kedatangan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jadwal
                            Kedatangan</label>
                        <input type="datetime-local" value="{{ $flight->jadwal_kedatangan }}" name="jadwal_kedatangan"
                            id="jadwal_kedatangan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>
                    <div class="flex items-center space-x-4">
                        <button type="submit"
                            class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            Update Flight
                        </button>
                    </div>
            </form>
        </div>

    </div>
</div>
</div>

<!-- Delete Modal -->
<div id="deleteModal-{{ $flight->id }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <div class="relative p-6 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <button type="button"
                class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-toggle="deleteModal-{{ $flight->id }}">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete
                flight ID: {{ $flight->id }}?</h3>
            <div class="flex justify-center gap-5">
                <button data-modal-toggle="deleteModal-{{ $flight->id }}" type="button"
                    class="text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-600">
                    No, cancel
                </button>
                <form action="{{ route('deletePenerbangan', $flight->id) }}" method="DELETE" @csrf <button
                    data-modal-toggle="deleteModal-{{ $flight->id }}" type="submit"
                    class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-800">
                    Yes, I'm sure
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
