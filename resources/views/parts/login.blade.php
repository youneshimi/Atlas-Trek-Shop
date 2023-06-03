<div x-data="{ modelOpen: false }">

    <button @click="modelOpen =!modelOpen" id="primaryButton"
        class="flex items-center justify-center px-4 py-2 mx-1 space-x-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform rounded-md btnmenu bg-emerald-500 hover:bg-gray-600 focus:outline-none focus:bg-gray-500 focus:ring focus:ring-gray-300 focus:ring-opacity-50">
        <span>Se connecter</span>
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
                    <div class="w-full max-w-md px-20 py-8 space-y-3 text-gray-100 bg-gray-600 rounded-xl">
                        <img class="p-2 rounded" src="/img/55.png" alt="logo">


                        <form action="/login" class="space-y-6 ng-untouched ng-pristine ng-valid" method="post">
                            @csrf

                            <div class="space-y-1 text-sm">
                                <label for="email" class="block text-gray-400">email</label>
                                <input type="email" name="email" id="email" placeholder="exemple@mail.com"
                                    class="w-full px-4 py-3 text-gray-100 bg-gray-900 border-gray-700 rounded-md focus:border-emerald-400">
                            </div>
                            <div class="space-y-1 text-sm">
                                <label for="password" class="block text-gray-400">Mot de passe</label>
                                <input type="password" name="password" id="password" placeholder="Password"
                                    class="w-full px-4 py-3 text-gray-100 bg-gray-900 border-gray-700 rounded-md focus:border-emerald-400">

                            </div>
                            <button
                                class="block w-full p-3 text-center text-white transition-colors duration-200 rounded bg-emerald-500 hover:bg-emerald-400 focus:bg-emerald-400">Se
                                Connecter</button>
                        </form>

                        <p class="text-xs text-center text-gray-400 sm:px-6">Pas encore de compte? &zwnj;
                            <a rel="noopener noreferrer" href="#" @click="modelOpen = false"
                                onclick="document.getElementById('secondaryButton').click()"
                                class="text-gray-100 underline"> Inscrivez-vous</a>
                        </p>
                    </div>

                </section>

            </div>
        </div>
    </div>
</div>


{{-- TEST LOADING SCREEN --------------------------------
    <section id="loading">
    <div id="loading-content"></div>
</section>
<script>
    async function showLoading() {
        document.querySelector('#loading').classList.add('loading');
        document.querySelector('#loading-content').classList.add('loading-content');
        await new Promise(resolve => setTimeout(resolve, 2000));
        document.querySelector('#loading').classList.remove('loading');
        document.querySelector('#loading-content').classList.remove('loading-content');
    }

</script>

<style>
      /* ANIMATION CHARGEMENT */

.loading {
    z-index: 9999;
    position: absolute;
    top: 0;
    left: -5px;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.4);
}

.loading-content {
    position: absolute;
    border: 16px solid #f3f3f3;
    /* Light grey */
    border-top: 16px solid #3498db;
    /* Blue */
    border-radius: 50%;
    width: 50px;
    height: 50px;
    top: 40%;
    left: 35%;
    animation: spin 2s linear infinite;
}

@keyframes spin {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }
}
</style> --}}
