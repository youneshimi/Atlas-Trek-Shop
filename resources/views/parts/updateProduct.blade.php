<div x-data="{ modelOpen: false }">
    <button @click="modelOpen =!modelOpen" class="p-3 text-blue-200 cursor-pointer hover:text-blue-600 hover:font-medium">
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
                <section>
                    {{-- @click="modelOpen = false" --}}
                    <div class="w-full max-w-xl px-20 py-8 space-y-3 text-gray-100 bg-gray-600 rounded-xl">
                        <h1 class="text-md">Editer une carte</h1>
                        <form action="/giftCards/{{ $card->id }}" method="post" enctype="multipart/form-data"
                            class="space-y-6">
                            @csrf
                            <div class="space-y-1 text-sm">
                                <label for="titre" class="block text-xs font-bold text-white">Titre</label>
                                <input value="{{ $card->titre }}"
                                    class="w-full px-4 py-3 text-gray-100 bg-gray-900 border-gray-700 rounded-md focus:border-teal-400"
                                    type="text" name="titre" placeholder="180" />
                            </div>
                            <div class="space-y-1 text-sm">
                                <label for="description" class="block text-xs font-bold text-white">Détails</label>
                                <textarea type="description" name="description" id="description" rows="5"
                                    class="w-full px-4 py-3 text-gray-100 bg-gray-900 border-gray-700 rounded-md focus:border-teal-400">{{ $card->description }}</textarea>
                            </div>
                            <div class="space-y-1 text-sm">
                                <label for="prix" class="block text-xs font-bold text-white">Prix</label>
                                <input value="{{ $card->prix }}" type="number" min="0" name="prix"
                                    id="prix" placeholder="prix"
                                    class="w-1/5 px-4 py-3 text-gray-100 bg-gray-900 border-gray-700 rounded-md focus:border-teal-400">
                            </div>
                            <div class="space-y-1 text-sm">
                                <img class="w-auto h-40 mx-auto" src="{{ $card->image }}">
                            </div>
                            <div class="space-y-1 text-sm tooltip1">
                                <label class="">
                                    <span
                                        class="px-4 py-3 mt-2 leading-tight text-gray-100 bg-gray-900 border border-gray-700 rounded-md shadow appearance-none hover:bg-gray-700 focus:outline-none focus:shadow-outline">Changer
                                        d'image</span>
                                    <input type="file" name="images" class="hidden" />
                                    <p class="tooltiptext1">Png 256 x 256 recommandé</p>
                                </label>
                            </div>
                            <div class="relative inline-block w-64">
                                <label for="categories" class="block text-xs font-bold text-white">Catégories</label>
                                <select name="categories[]" multiple
                                    class="block w-full px-4 py-2 pr-8 leading-tight text-gray-100 bg-gray-900 border border-gray-700 rounded-md shadow appearance-none focus:outline-none focus:shadow-outline">
                                    @foreach ($categories as $categorie)
                                        <option value="{{ $categorie->id_cat }}"> {{ $categorie->label }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button
                                class="block w-full p-3 text-center text-gray-900 transition-colors duration-200 bg-teal-400 rounded hover:bg-teal-200 focus:bg-teal-200">Mettre
                                à jour</button>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
