@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div x-data="{ modelOpen: false }">

    <button @click="modelOpen =!modelOpen"
        class="p-3 pl-4 pr-4 font-bold text-white transition duration-500 ease-in-out bg-sky-500 rounded-lg hover:ring-2 ring-offset-2 ring-emerald-500">Ajouter
        une catégorie</button>
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
                        <form action="/Addcategorie" class="space-y-6" method="post">
                            @csrf
                            <div class="space-y-1 text-sm">
                                <input value=""
                                    class="w-full px-4 py-3 text-gray-100 bg-gray-900 border-gray-700 rounded-md focus:border-teal-400"
                                    type="text" name="label" placeholder="Nom de la catégorie" required />
                            </div>
                            <button type="submit"
                                class=" block w-full p-3 text-center text-gray-900 transition-colors duration-200 bg-teal-400 rounded hover:bg-teal-200 focus:bg-teal-200">Ajouter</button>

                        </form>
                    </div>
                </section>
            </div>

        </div>

    </div>

</div>
