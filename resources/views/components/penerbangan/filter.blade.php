<div class="flex items-center justify-center">
    <button id="dropdownDefault" data-dropdown-toggle="dropdown"
        class="text-white bg-primary-700 w-full justify-between hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
        type="button">
        Filter by Maskapai
        <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
    </button>

    <div id="dropdown" class="z-10 hidden w-56 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
        <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">
            Maskapai
        </h6>
        <ul class="space-y-2 text-sm" aria-labelledby="dropdownDefault">
            @foreach (['garuda_indonesia' => 'Garuda Indonesia', 'air_asia' => 'Air Asia', 'lion_air' => 'Lion Air', 'japan_airlines' => 'Japan Airlines', 'batik_air' => 'Batik Air'] as $id => $label)
                <li class="flex items-center">
                    <input id="{{ $id }}" type="checkbox" value=""
                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                        {{ in_array($id, explode(',', $maskapai)) ? 'checked' : '' }} />

                    <label for="{{ $id }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                        {{ $label }}
                    </label>
                </li>
            @endforeach
        </ul>
    </div>
</div>
