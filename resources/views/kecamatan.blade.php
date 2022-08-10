<x-volt-app title="Kecamatan">

    <x-volt-link-button
            label="Tambah"
            icon="plus"
            url="{{ route('daerah.kecamatan.create') }}"/>
        @livewire(\App\Http\Livewire\Table\KecamatanTable::class)

    @push('script')
        <script>
            $('.menu .item')
                .tab()
            ;
        </script>
    @endpush

</x-volt-app>
