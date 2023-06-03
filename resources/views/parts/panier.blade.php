<div class="max-w-screen-xl mx-auto">
    <div class="flex items-center pb-2 text-sm text-gray-100">
        <a rel="noopener noreferrer" href="/"
            class="px-5 py-1 border-b-2 border-gray-700 hover:border-blue-400 hover:text-blue-400">Retour</a>
    </div>
    <div class="mx-8">
        <div class="grid grid-cols-1 md:grid-cols-2">
            <div
                class="py-8 bg-gray-600 rounded-t rounded-b-none md:rounded-br-none md:rounded-tr-none md:rounded-l-lg md:py-12 panier">
                <div class="max-w-lg px-4 mx-auto md:px-8">
                    <div class="flex items-center">
                        <img class="w-10 h-10 rounded-full" src="{{ Auth::user()->photo }}">

                        <h2 class="ml-4 font-medium text-white"> {{ Auth::user()->prenom }}</h2>
                    </div>
                    @php($totalcost = 0)
                    <div class="mt-4">
                        <p class="text-gray-200">Contenu du panier</p>
                        @if (session('cart_delete'))
                            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="pt-2 pr-4">
                                <span class='text-red-500 text-bold'>Article supprimé du panier</span>
                            </div>
                        @endif
                    </div>
                    <div class="mt-12">
                        <div class="flow-root">
                            <ul class="-my-4 divide-y divide-gray-100">
                                {{-- @forelse comme @foreach mais affiche un truc si c'est vide avec le @empty --}}
                                @forelse ($mycart as $panier)
                                    @foreach ($produits->where('id', '=', $panier->prod_id) as $produit)
                                        <li class="flex items-center justify-between py-4">
                                            <a href="/card/{{ $panier->prod_id }}">
                                                <div class="flex items-start">
                                                    <img class="flex-shrink-0 object-cover w-16 h-16 rounded-lg bg-neutral-600"
                                                        src="{{ $produit->image }}" alt="" />

                                                    <div class="ml-4">
                                                        <p class="pt-5 pl-4 text-sm text-white">{{ $produit->titre }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                            <div>
                                                <p class="text-sm text-white">x {{ $panier->quantite }}</p>
                                                <p class="text-sm text-emerald-300">
                                                    {{ $produit->prix }} €
                                                    @php($prixtotal = $produit->prix * $panier->quantite)
                                                    @php($totalcost += $prixtotal)
                                                <p>
                                                <form action="/deletefromcart/{{ $panier->prod_id }}" method="post"
                                                    onsubmit="myButtonDel.disabled = true; return true;">
                                                    @csrf
                                                    @method('delete')
                                                    <button name="myButtonDel" type="submit">
                                                        <i
                                                            class="text-gray-100 fa-solid fa-trash-can hover:text-red-500 focus:text-red-300"></i>
                                                    </button>
                                                </form>
                                                </p>
                                            </div>
                                        </li>
                                    @endforeach
                                @empty
                                    <div class="flex flex-row justify-center">
                                        <p class="text-sm text-white">Votre panier est vide</p>
                                    </div>
                                @endforelse
                            </ul>
                        </div>
                    </div>

                    <div class="mt-8">
                        <p class="text-sm text-gray-200">Total</p>
                        <p class="pl-1 text-2xl font-medium tracking-tight text-emerald-500">{{ $totalcost }} €</p>
                    </div>



                </div>
            </div>

            <div class="w-full max-w-xl px-10 py-12 space-y-3 bg-gray-200 rounded-r-xl">
                <form action="/" enctype="multipart/form-data" class="w-full max-w-lg">
                    @csrf
                    <div class="flex flex-wrap mb-6 -mx-3">
                        <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                            <label class="block mb-2 text-xs font-bold tracking-wide uppercase" for="grid-first-name">
                                Nom
                            </label>
                            <input name="nom"
                                class="block w-full px-4 py-3 leading-tight text-center text-gray-700 border rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-first-name" type="text" placeholder="" value="{{ Auth::user()->nom }}">

                        </div>
                        <div class="w-full px-3 md:w-1/2">
                            <label class="block mb-2 text-xs font-bold tracking-wide uppercase" for="grid-last-name">
                                Prenom
                            </label>
                            <input name="prenom"
                                class="block w-full px-4 py-3 leading-tight text-center text-gray-700 border rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-last-name" type="text" placeholder="" value="{{ Auth::user()->prenom }}">
                        </div>

                    </div>
                    <div class="flex flex-wrap mb-6 -mx-3">
                        <div class="w-1/2 px-3">
                            <label class="block mb-2 text-xs font-bold tracking-wide uppercase">
                                Telephone
                            </label>
                            <input name="telephone"
                                class="block w-full px-4 py-3 leading-tight text-center text-gray-700 border rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                placeholder="" value=" {{ Auth::user()->numero_telephone }}">
                        </div>
                        <div class="w-1/2 px-3">
                            <label class="block mb-2 text-xs font-bold tracking-wide uppercase">
                                Email
                            </label>
                            <input name="email"
                                class="block w-full px-4 py-3 leading-tight text-center text-gray-700 border rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                placeholder="" value=" {{ Auth::user()->email }}">
                        </div>
                    </div>
                    <div class="flex flex-wrap mb-6 -mx-3">
                        <div class="w-full px-3">
                            <label class="block mb-2 text-xs font-bold tracking-wide uppercase">
                                Adresse
                            </label>
                            <input name="address"
                                class="block w-full px-4 py-3 leading-tight text-center text-gray-700 border rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                placeholder="" value=" {{ Auth::user()->address }}">
                        </div>
                    </div>

                    <div class="flex flex-wrap mb-2 -mx-3">
                        <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                            <label class="block mb-2 text-xs font-bold tracking-wide uppercase" for="grid-zip">
                                Code-Postal
                            </label>
                            <input name="zip"
                                class="block w-full px-4 py-3 leading-tight text-center text-gray-700 border rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-zip" type="text" placeholder="90210"
                                value=" {{ Auth::user()->zipCode }}">
                        </div>
                        <div class="w-full px-3 pb-4 mb-6 md:w-1/2 md:mb-0">
                            <label class="block mb-2 text-xs font-bold tracking-wide uppercase" for="grid-city">
                                Ville
                            </label>
                            <input name="city"
                                class="block w-full px-4 py-3 leading-tight text-center text-gray-700 border rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-city" type="text" placeholder="" value=" {{ Auth::user()->city }}">
                        </div>
                        <button
                            class="block w-full p-3 mt-8 text-center text-gray-900 transition-colors duration-200 bg-teal-400 rounded hover:bg-teal-200 focus:bg-teal-200">Passer
                            au paiement</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
