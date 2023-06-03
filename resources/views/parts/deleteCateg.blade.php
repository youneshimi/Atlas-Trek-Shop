<div x-data="{ modelOpen: false }">

    <button @click="modelOpen =!modelOpen" class="p-3 text-white cursor-pointer hover:text-red-600 hover:font-medium">
        <i class="fa-solid fa-trash-can "></i>
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
                <section>
                    {{-- @click="modelOpen = false" --}}
                    <div class="w-full max-w-xl px-20 py-8 space-y-3 text-gray-100 bg-gray-600 rounded-xl">
                        <div class="flex flex-col ">
                            <label class="mb-4 text-center">êtes vous sur de vouloir supprimer la catégorie :</label>
                            <span class="mb-8"> {{ $categorie->label }} ?</span>
                            <div class="flex flex-row justify-center">
                                <button @click="modelOpen = false"
                                    class="h-12 px-6 mx-4 my-4 text-gray-100 bg-gray-700 rounded-lg focus:outline-none hover:text-gray-200">
                                    Annuler
                                </button>
                                <form action="/delete/{{ $categorie->id_cat }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        class="h-12 px-6 mx-4 my-4 text-gray-100 bg-red-700 rounded-lg focus:outline-none hover:text-gray-200">
                                        Confirmer
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
