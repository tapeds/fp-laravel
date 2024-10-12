<x-app-layout>
    <x-dashboard.dashboard-title>
        Flight Booking Dashboard
    </x-dashboard.dashboard-title>

    <x-dashboard.search-form />

    <!-- Button to add flight -->
    <button data-modal-toggle="defaultModal" class="text-white bg-blue-600 hover:bg-blue-700 rounded-lg px-4 py-2">Add
        Flight
    </button>

    <x-dashboard.add-flight-modal />


    <x-dashboard.flight-table>
        @foreach ($penerbangans as $flight)
            <x-dashboard.flight-table-row :flight="$flight" />
        @endforeach
    </x-dashboard.flight-table>

    <x-dashboard.pagination>
        {{ $penerbangans->links() }}
    </x-dashboard.pagination>
</x-app-layout>

<script>
    const simpleInput = document.getElementById('simple-search')

    function checkAndRedirect() {
        const simpleValue = simpleInput.value;

        if (simpleValue) {
            const queryParams = new URLSearchParams({
                search: simpleValue
            });

            window.location.href = `/admin/penerbangan?${queryParams.toString()}`;
        }
    }

    simpleInput.addEventListener('change', checkAndRedirect);

    window.addEventListener("load", function() {
        const simpleInput = document.getElementById('simple-input');

        simpleInput.value = "{{ $search }}";
    });

    document.addEventListener("DOMContentLoaded", function(event) {
        document.getElementById('defaultModalButton').click();
    });
</script>
