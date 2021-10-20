@if(session()->has('success'))
    <p x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 4000)"
        x-show="show"
        class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
        {{ session()->get('success') }}
    </p>
        <!--or <p>{{ session('success') }}</p> -->
@endif