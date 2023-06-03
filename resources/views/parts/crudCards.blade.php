<div class="max-w-screen-xl mx-auto ">
    <div class="flex items-center justify-center">
        <div class="container">

            <table class="flex flex-row flex-no-wrap w-full my-5 overflow-hidden rounded-lg">
                <thead class="text-white">
                    @foreach ($cards as $card)
                        <tr
                            class="flex flex-col mb-2 rounded-l-lg bg-emerald-500 flex-no wrap sm:table-row sm:rounded-none sm:mb-0 ">

                            <th class="h-12 p-3 text-center "><i class="fa-solid fa-file-image fa-xl"></i></th>
                            <th class="h-12 p-3 text-center ">Titre</th>
                            <th class="h-12 p-3 text-center ">Prix</th>
                            <th class="h-12 p-3 text-center ">Consulter</th>
                            <th class="h-12 p-3 text-center ">Modifier</th>
                            <th class="h-12 p-3 text-center ">Disponible</th>
                        </tr>
                    @endforeach
                </thead>
                <tbody class="flex-1 sm:flex-none">
                    @forelse ($cards as $card)
                        <tr class="flex flex-col flex-no-wrap mb-2 bg-gray-700 sm:table-row -p-2 sm:mb-0">
                            <td class="h-12 truncate "><img class="w-10 h-10 mx-auto sm:w-14 sm:h-14 drop-shadow-md"
                                    src="{{ $card->image }}" alt="">
                            </td>
                            <td class="h-12 p-3 text-white ">{{ $card->titre }}</td>

                            <td class="h-12 p-3 text-white ">
                                {{ $card->prix }}</td>
                            <td class="h-12 p-3 text-green-400 cursor-pointer hover:text-green-600"><a
                                    href="/card/{{ $card->id }}">
                                    <i class="fa-solid fa-eye"></i></a></td>
                            <td class="h-12 hover:text-blue-900">@include('parts.updateProduct')
                            </td>

                            <td class="h-12 hover:text-blue-600"> @include('parts.activeProduct')
                            </td>
                        </tr>
                    @empty
                        <div class="flex flex-row justify-center">
                            <p class="text-sm text-white">Vide</p>
                        </div>
                    @endforelse
                </tbody>
            </table>
            @include('parts.addProduct')
        </div>
    </div>
</div>

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
