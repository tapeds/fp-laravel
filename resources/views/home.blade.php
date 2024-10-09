<x-app-layout>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-20 lg:px-12">

            <h1
                class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                Terbang Lebih Mudah, Tiket Lebih Murah!</h1>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">
                Temukan penerbangan impian Anda dengan harga terbaik! Kami menyediakan berbagai pilihan maskapai dan
                rute penerbangan di seluruh dunia.
            </p>
            <div class="flex flex-col mb-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
                <form class="w-full flex md:flex-row flex-col gap-4 mx-auto ">
                    <div class="flex flex-col gap-0.5 w-full items-start">
                        <label for="berangkat"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Asal</label>
                        <select id="berangkat"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected disabled>Pilih Asal</option>
                            <option value="CGK">Jakarta</option>
                            <option value="SUB">Surabaya</option>
                            <option value="DPS">Bali</option>
                            <option value="BTH">Batam</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-0.5 w-full items-start">
                        <label for="kedatangan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tujuan</label>
                        <select id="kedatangan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected disabled>Pilih Tujuan</option>
                            <option value="CGK">Jakarta</option>
                            <option value="SUB">Surabaya</option>
                            <option value="DPS">Bali</option>
                            <option value="BTH">Batam</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-0.5 w-full items-start">
                        <label for="countries"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                            Perjalanan</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input datepicker id="default-datepicker" type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Select date">
                        </div>
                    </div>
                    <button type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex justify-center items-center md:me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 self-end max-md:w-full">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                        <span class="sr-only">Icon description</span>
                    </button>
                </form>
            </div>
            <div class="px-4 mx-auto text-center md:max-w-screen-md lg:max-w-screen-lg lg:px-36">
                <span class="font-semibold text-gray-400 uppercase">SUPPORTED BY</span>
                <div class="flex flex-wrap justify-center items-center mt-8 text-gray-500 sm:justify-around">
                    <a href="#"
                        class="flex items-center justify-center mr-5 mb-5 w-32 lg:mb-0 hover:text-gray-800 dark:hover:text-gray-400">
                        <img src="https://github.com/user-attachments/assets/7b857be4-74e6-4f53-b823-376d11914939"
                            alt="ITS" class="w-20">
                    </a>
                    <a href="#"
                        class="flex items-center justify-center mr-5 mb-5 w-32 lg:mb-0 hover:text-gray-800 dark:hover:text-gray-400">
                        <img src="https://github.com/user-attachments/assets/6008a6b3-6398-4548-8925-f95bf1eab913"
                            alt="ITS" class="w-20">
                    </a>
                    <a href="#"
                        class="flex items-center justify-center mr-5 mb-5 w-32 lg:mb-0 hover:text-gray-800 dark:hover:text-gray-400">
                        <img src="https://github.com/user-attachments/assets/642155bf-1040-438b-9089-3cda2829a016"
                            alt="ITS" class="w-28">
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
