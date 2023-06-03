<div x-data="{ modelOpen: false }">

    <button @click="modelOpen =!modelOpen" id="secondaryButton"
        class="flex items-center justify-center px-4 py-2 mx-1 space-x-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-gray-900 rounded-md btnmenu hover:bg-gray-700 focus:outline-none focus:bg-gray-500 focus:ring focus:ring-gray-300 focus:ring-opacity-50">
        <span>S'inscrire</span>
    </button>

    <div x-cloak x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <div class="flex items-end justify-center px-4 text-center md:items-center sm:block sm:p-0">
            <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                class="fixed inset-0 transition-opacity bg-gray-900 bg-opacity-70" aria-hidden="true"></div>

            <div x-cloak x-show="modelOpen" x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="inline-block pt-8 overflow-hidden transition-all transform rounded-lg 2xl:max-w-2xl">
                <section class="">

                    {{-- @click="modelOpen = false" --}}
                    <div class="w-full max-w-md px-20 py-8 space-y-3 text-gray-100 bg-gray-600 rounded-xl">
                        <img class="p-2 rounded" src="/img/55.png" alt="logo">


                        <form action="/register" class="space-y-6 ng-untouched ng-pristine ng-valid" method="post">
                            @csrf
                            <div class="space-y-1 text-sm">
                                <label for="nom" class="block text-gray-400">Nom</label>
                                <input type="text" name="nom" id="nom" placeholder="Nom"
                                    class="w-full px-4 py-3 text-gray-100 bg-gray-900 border-gray-700 rounded-md focus:border-emerald-400">
                            </div>
                            <div class="space-y-1 text-sm">
                                <label for="prenom" class="block text-gray-400">Prénom</label>
                                <input type="text" name="prenom" id="prenom" placeholder="prenom"
                                    class="w-full px-4 py-3 text-gray-100 bg-gray-900 border-gray-700 rounded-md focus:border-emerald-400">
                            </div>
                            <div class="space-y-1 text-sm">
                                <label for="email" class="block text-gray-400">E-mail</label>
                                <input type="email" name="email" id="email" placeholder="exemple@mail.com"
                                    class="w-full px-4 py-3 text-gray-100 bg-gray-900 border-gray-700 rounded-md focus:border-emerald-400">
                            </div>
                            <div class="space-y-1 text-sm">
                                <label for="password" class="block text-gray-400">Mot de passe</label>
                                <input type="password" name="password" id="password" placeholder="Password"
                                    class="w-full px-4 py-3 text-gray-100 bg-gray-900 border-gray-700 rounded-md focus:border-emerald-400">

                            </div>
                            <div class="space-y-1 text-sm">
                                <label for="password" class="block text-gray-400">Confirmer votre mot de passe</label>
                                <input id="password" type="password" name="password_confirmation" required
                                    placeholder="Confirmer votre mot de passe"
                                    class="w-full px-4 py-3 text-gray-100 bg-gray-900 border-gray-700 rounded-md focus:border-emerald-400">

                            </div>

                            <button
                                class="block w-full p-3 text-center text-white transition-colors duration-200 rounded bg-emerald-500 hover:bg-emerald-400 focus:bg-emerald-400">S'inscrire
                            </button>
                        </form>

                    </div>

                </section>

            </div>
        </div>
    </div>
</div>
