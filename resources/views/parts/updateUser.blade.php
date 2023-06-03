<div x-data="{ modelOpen: false }">

    <button @click="modelOpen =!modelOpen" class="p-3 text-blue-400 cursor-pointer hover:text-blue-600 hover:font-medium">
        <i class="fa-solid fa-pen-to-square"></i>
    </button>


    <div x-cloak x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <div class="flex items-end justify-center px-4 text-center md:items-center sm:block sm:p-0">

            <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                class="fixed inset-0 transition-opacity bg-gray-900 bg-opacity-60" aria-hidden="true"></div>

            <div x-cloak x-show="modelOpen" x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="inline-block pt-8 overflow-hidden transition-all transform rounded-lg 2xl:max-w-2xl">
                <section class="">
                    {{-- @click="modelOpen = false" --}}
                    <div class="w-full max-w-xl px-20 py-8 space-y-3 text-gray-100 bg-gray-600 rounded-xl">
                        <form action="{{ route('updateprofil', $user->id) }}" enctype="multipart/form-data"
                            method="POST" class="w-full max-w-lg">
                            @csrf
                            <div class="flex flex-wrap mb-6 -mx-3">
                                <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                                    <label class="block mb-2 text-xs font-bold tracking-wide text-white uppercase"
                                        for="grid-first-name">
                                        Nom
                                    </label>
                                    <input name="nom"
                                        class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-500 rounded appearance-none focus:outline-none focus:bg-white"
                                        id="grid-first-name" type="text" placeholder="" value="{{ $user->nom }}">

                                </div>
                                <div class="w-full px-3 md:w-1/2">
                                    <label class="block mb-2 text-xs font-bold tracking-wide text-white uppercase"
                                        for="grid-last-name">
                                        Prenom
                                    </label>
                                    <input name="prenom"
                                        class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="grid-last-name" type="text" placeholder="" value="{{ $user->prenom }}">
                                </div>
                                <div>
                                    <select
                                        class=" w-full h-[43.99px] px-4 py-3 text-sm  bg-gray-600 border-transparent rounded-md focus:border-gray-500 focus:ring-0"
                                        name="role">
                                        <option value="{{ $user->profil }}" selected>{{ $user->profil }}</option>
                                        <option value="abonne">abonne</option>
                                        <option value="client">client</option>
                                        <option value="admin">admin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="flex flex-wrap mb-6 -mx-3">
                                <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                                    <label class="block mb-2 text-xs font-bold tracking-wide text-white uppercase"
                                        for="username">
                                        Pseudo
                                    </label>
                                    <input name="username"
                                        class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-500 rounded appearance-none focus:outline-none focus:bg-white"
                                        type="text" placeholder="" value="{{ $user->username }}">

                                </div>
                                <div class="w-full px-3 md:w-1/2">
                                    <label class="block mb-2 text-xs font-bold tracking-wide text-white uppercase"
                                        for="grid-last-name">
                                        Telephone
                                    </label>
                                    <input name="phone"
                                        class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="grid-last-name" type="text" placeholder=""
                                        value="{{ $user->numero_telephone }}">
                                </div>
                            </div>
                            <div class="flex flex-wrap mb-6 -mx-3">
                                <div class="w-full px-3">
                                    <label class="block mb-2 text-xs font-bold tracking-wide text-white uppercase"
                                        for="grid-password">
                                        Addresse
                                    </label>
                                    <input name="address"
                                        class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                        placeholder="" value=" {{ $user->address }}">
                                </div>
                            </div>
                            <div class="flex flex-wrap mb-2 -mx-3">
                                <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0">
                                    <label class="block mb-2 text-xs font-bold tracking-wide text-white uppercase"
                                        for="grid-zip">
                                        Code-Postal
                                    </label>
                                    <input name="zip"
                                        class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="grid-zip" type="text" placeholder="90210"
                                        value=" {{ $user->zipCode }}">
                                </div>
                                <div class="w-full px-3 pb-4 mb-6 md:w-2/3 md:mb-0">
                                    <label class="block mb-2 text-xs font-bold tracking-wide text-white uppercase"
                                        for="grid-city">
                                        Ville
                                    </label>
                                    <input name="city"
                                        class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="grid-city" type="text" placeholder="" value=" {{ $user->city }}">
                                </div>
                                <button
                                    class="block w-full p-3 text-center text-gray-900 transition-colors duration-200 bg-teal-400 rounded hover:bg-teal-200 focus:bg-teal-200">Valider</button>
                            </div>
                    </div>
                    </form>
                </section>

            </div>

        </div>

    </div>

</div>
