<x-app-layout>
    <x-dashboard.dashboard-title>
        Flight Booking Dashboard
    </x-dashboard.dashboard-title>

    <x-dashboard.search-form />

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
