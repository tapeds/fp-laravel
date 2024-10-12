<x-app-layout>
    <x-dashboard.dashboard-title>
        Admin Dashboard User
    </x-dashboard.dashboard-title>

    <x-dashboard.search-form-user />

    <x-dashboard.user-table>
        @foreach ($users as $user)
            <x-dashboard.user-table-row :user="$user" />
        @endforeach
    </x-dashboard.user-table>

    <x-dashboard.pagination>
        {{ $users->links() }}
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

            window.location.href = `/admin/user?${queryParams.toString()}`;
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
