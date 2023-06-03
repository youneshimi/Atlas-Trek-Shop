<div x-data="{ modelOpen: false }">
    <button @click="modelOpen =!modelOpen"
        class="p-3 pl-4 pr-4 mt-4 font-bold text-white transition duration-500 ease-in-out bg-sky-500 rounded-lg  border border-white hover:ring-2 ring-offset-2 ring-emerald-500">Ajouter
        une carte cadeau</button>


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
                    <div class="w-full px-20 py-8 space-y-3 text-gray-100 bg-gray-600 rounded-xl">
                        <h1 class="text-md">Ajouter un produit</h1>
                        <form action="{{ route('addProduct') }}" method="POST" enctype="multipart/form-data"
                            class="space-y-6">
                            @csrf
                            <div class="space-y-1 text-sm">
                                <label for="titre" class="block text-gray-400">Titre</label>
                                <input value=""
                                    class="w-full px-4 py-3 text-gray-100 bg-gray-900 border-gray-700 rounded-md focus:border-teal-400"
                                    type="text" name="titre" required />

                            </div>
                            <div class="space-y-1 text-sm">
                                <label class="block text-sm font-bold text-gray-400" for="password">
                                    Description
                                </label>
                                <textarea name="description"
                                    class="block w-full px-4 py-3 mt-1 text-gray-100 bg-gray-900 border-gray-700 rounded-md shadow-sm placeholder:text-right focus:border-teal-400"
                                    rows="4" required></textarea>
                            </div>
                            <div class="space-y-1 text-sm">
                                <label for="prix" class="block text-gray-400">Prix</label>
                                <input type="number" name="prix" id="prix" min="0"
                                    class="w-1/5 px-3 py-3 text-gray-100 bg-gray-900 border-gray-700 rounded-md focus:border-teal-400"
                                    required>
                            </div>
                            <div class="space-y-1 text-sm tooltip1">
                                <label class="">
                                    <span
                                        class="px-4 py-3 mt-2 leading-tight text-gray-100 bg-gray-900 border border-gray-700 rounded-md shadow appearance-none hover:bg-gray-700 focus:outline-none focus:shadow-outline">Selectionner
                                        une image</span>
                                    <input type="file" name="images" class="hidden" required />
                                    <p class="tooltiptext1">Png 256 x 256 recommandé</p>
                                </label>

                            </div>

                            <div class="relative inline-block w-64">
                                <select name="categories[]" multiple
                                    class="block w-full px-4 py-2 pr-8 leading-tight text-gray-100 bg-gray-900 border border-gray-700 rounded-md shadow appearance-none focus:outline-none focus:shadow-outline">
                                    @foreach ($categories as $categorie)
                                        <option value="{{ $categorie->id_cat }}">{{ $categorie->label }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <button
                                class="block w-full p-3 text-center text-gray-900 transition-colors duration-200 bg-teal-400 rounded hover:bg-teal-200 focus:bg-teal-200">Ajouter</button>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<style>
    /* ANIMATION SURVOL MENU FULL CSS AU TOP */
    .tooltip1 {
        position: relative;
        display: inline-block;
    }

    /* Tooltip text */
    .tooltip1 .tooltiptext1 {
        visibility: hidden;
        top: 15px;
        width: 130px;
        color: rgba(255, 255, 255, 0.534);
        text-alrgba(255, 255, 255, 0.459) center;
        padding: 4px 4px;
        border-radius: 6px;
        position: relative;
        z-index: 1;
    }

    .tooltip1:hover .tooltiptext1 {
        visibility: visible;
    }

    .tooltip1 .tooltiptext1 {
        opacity: 0;
        transition: opacity 0.2s;
    }

    .tooltip1:hover .tooltiptext1 {
        opacity: 1;
    }
</style>
