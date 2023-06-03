<div class="max-w-screen-xl mx-auto ">
    <div class="flex items-center justify-center">
        <div class="container">
            <table class="w-full flex flex-row flex-no-wrap rounded-lg overflow-hidden my-5">
                <thead class="text-white">
                    @foreach ($categories as $categorie)
                        <tr
                            class="bg-emerald-500 flex flex-col flex-no-wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">

                            <th class="p-3 h-12 text-center ">Catégories</th>
                            <th class="p-3 h-12 text-center">Modifier</th>


                        </tr>
                    @endforeach
                    </tr>
                </thead>
                <tbody class="flex-1 sm:flex-none">
                    @forelse ($categories as $categorie)
                        <tr class="flex flex-col flex-no-wrap sm:table-row mb-2 bg-gray-700  sm:mb-0">
                            <td class="text-white p-3 h-12">{{ $categorie->label }}</td>
                            <td class="hover:text-blue-900 h-12">
                                @include('parts.updateCateg')

                        </tr>
                    @empty
                        <div class="flex flex-row justify-center">
                            <p class="text-sm text-white">Aucune catégories existants</p>
                        </div>
                    @endforelse
                </tbody>

            </table>

        </div>
    </div>
</div>

@include('parts.addCateg')
<style>
    @media (min-width: 640px) {
        table {
            display: inline-table !important;
        }

        thead tr:not(:first-child) {
            display: none;
        }
    }



    th:not(:last-child) {
        border-bottom: 2px solid rgba(0, 0, 0, .1);
    }
</style>
