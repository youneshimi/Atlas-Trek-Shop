<div class="max-w-screen-xl mx-auto ">
    <div class="flex items-center justify-center">
        <div class="container">
            <table class="w-full flex flex-row flex-no-wrap rounded-lg overflow-hidden my-5">
                <thead class="text-white">
                    @foreach ($users as $user)
                        <tr
                            class="bg-emerald-500 flex flex-col flex-no-wrap  sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                            <th class="p-3 h-12 text-center ">Nom</th>
                            <th class="p-3 h-12 text-center">Prénom</th>
                            <th class="p-3 h-12 text-center">Email</th>
                            <th class="p-3 h-12 text-center">Rôle</th>
                            <th class="p-3 h-12 text-center ">Profil</th>
                            <th class="p-3 h-12 text-center">Modifier</th>
                            <th class="p-3 h-12 text-center">Activé</th>
                        </tr>
                    @endforeach
                </thead>
                <tbody class="flex-1 sm:flex-none">

                    @foreach ($users as $user)
                        <tr class="flex flex-col flex-no-wrap sm:table-row mb-2 bg-gray-700 sm:mb-0">
                            <td class="text-white p-3 h-12">{{ $user->nom }}</td>
                            <td class="text-white p-3 h-12">{{ $user->prenom }}</td>
                            <td class=" truncate text-white p-3 h-12">{{ $user->email }}
                            <td class="p-3 truncate text-white  h-12">{{ $user->profil }}
                            </td>
                            <td class="p-3 text-green-400 cursor-pointer hover:text-green-600  h-12"><a
                                    href="user/account/{{ $user->id }}">
                                    <i class="fa-solid fa-eye"></i></a></td>
                            <td class="hover:text-blue-900 h-12">@include('parts.updateUser')
                            </td>
                            <td class="hover:text-red-600 h-12">@include('parts.deleteUsers')
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
        border-bottom: 0px solid rgba(0, 0, 0, 0);
    }
</style>
