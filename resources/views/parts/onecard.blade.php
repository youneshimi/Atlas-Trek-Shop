<div class="max-w-screen-xl mx-auto">
    <div class="flex items-center pb-2 text-sm text-gray-100">
        <a rel="noopener noreferrer" href="/"
            class="px-5 py-1 border-b-2 border-gray-700 hover:border-emerald-500 hover:text-emerald-500">Retour</a>
    </div>
    <div class="items-center justify-center m-auto mt-4 -space-y-4 md:flex md:space-y-0 md:-space-x-4 ">
        <div class="relative z-10 -mx-4 group md:w-6/12 md:mx-0 lg:w-5/12">
            <div aria-hidden="true"
                class="absolute top-0 w-full h-full transition duration-500 shadow-xl btnmenu rounded-2xl bg-emerald-300 group-hover:scale-105 lg:group-hover:scale-110">
            </div>
            <div class="relative p-6 space-y-6 lg:p-8">

                <div class="relative flex justify-around">
                    <div class="flex items-end">
                        <div class="card">
                            <div class="front2">
                                <img class="icon w-[256px] h-auto" src=" {{ $produit->image }}">
                            </div>
                            <div class="flex flex-col items-center w-full">
                                <div class="flex flex-col items-center py-6 space-y-3">
                                    <div class="flex space-x-3">
                                        @for ($i = 0; $i < round($noteProduct['average']); $i++)
                                            <i class="text-yellow-500 fa-solid fa-star"></i>
                                        @endfor
                                    </div>
                                </div>
                                @include('parts.comm')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="relative group md:w-5/12 lg:w-6/12">
            <div aria-hidden="true"
                class="absolute top-0 w-full h-full transition duration-500 bg-gray-900 shadow-lg btnmenu rounded-2xl group-hover:scale-105">
            </div>
            <div class="relative p-6 pt-16 md:p-8 md:pl-12 md:rounded-r-2xl lg:pl-20 lg:p-16">
                <div class="flex flex-col justify-center">
                    <h1 class="text-white">{{ $produit->titre }}</h1>
                    <span class="px-6 py-4 text-sm font-light text-white">
                        {{ $produit->description }}
                    </span>
                    <a
                        class="flex items-center justify-center h-8 pt-1 pb-1 mx-1 mb-2 space-x-2 text-2xl tracking-wide text-white rounded-md">
                        {{ $produit->prix }} €
                    </a>

                    <form @auth action="/addtocart/{{ $produit->id }}" method="post"
                        onsubmit="myButtonAdd.disabled = true; return true;" @else
                        onclick="document.getElementById('primaryButton').click()" onsubmit="return false" @endauth>

                        @csrf
                        <div class="flex flex-col items-center justify-center pb-8">
                            <label for="quantite" class="px-2 text-gray-100">Quantité:
                                <div class="flex flex-row w-2/3 h-10 mx-auto my-2 bg-transparent rounded-lg">
                                    <button data-action="decrement" onclick="return false;"
                                        class="w-20 h-full text-gray-600 bg-gray-300 rounded-l outline-none cursor-pointer hover:text-gray-700 hover:bg-gray-400">
                                        <span class="m-auto text-2xl font-thin">−</span>
                                    </button>
                                    <input type="number" name="quantite" style="-moz-appearance: textfield"
                                        class="flex items-center w-full font-semibold text-center text-gray-700 bg-gray-300 outline-none outline focus:outline-none text-md hover:text-black focus:text-black md:text-basecursor-default"
                                        name="custom-input-number" min="1" value="1"></input>
                                    <button data-action="increment" onclick="return false;"
                                        class="w-20 h-full text-gray-600 bg-gray-300 rounded-r cursor-pointer hover:text-gray-700 hover:bg-gray-400">
                                        <span class="m-auto text-2xl font-thin">+</span>
                                    </button>
                                </div>
                            </label>
                        </div>
                        <div class="flex items-center justify-center">
                            <input type="submit" name="myButtonAdd" value="Ajouter au panier"
                                class="h-8 p-1 px-4 mx-1 space-x-2 tracking-wide text-white transition-colors duration-200 transform rounded-md  btnmenu bg-emerald-500 hover:bg-emerald-300 focus:outline-none focus:bg-emerald-700">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col justify-center mx-auto mt-10 md:flex-row ">
        <div class="container flex flex-col w-full max-w-lg p-6 mx-auto mt-4 text-gray-100 rounded-md sm:mx-auto ">

            {{-- COMMENTAIRES --}}

            @foreach ($comments as $comment)
                <div class="mb-4 transition duration-500 bg-gray-900 rounded-lg btnmenu hover:scale-105">
                    <div class="flex justify-between p-4 border-b-2 border-gray-500">
                        <div class="flex space-x-4">
                            <div>
                                <img src="{{ $comment->user->photo }}" alt=""
                                    class="object-cover w-12 h-12 bg-gray-500 rounded-full">
                            </div>
                            <div>
                                <h4 class="font-bold">{{ $comment->user->prenom }} {{ $comment->user->nom }}</h4>
                                <span class="text-sm text-gray-400">{{ $comment->created_at->diffForHumans() }}
                                </span>
                            </div>
                        </div>
                        <div class="flex flex-row items-center space-x-2 text-yellow-500 ">
                            @for ($i = 0; $i < $comment->note; $i++)
                                <i class="text-yellow-500 fa-solid fa-star"></i>
                            @endfor
                        </div>
                    </div>
                    <div class="max-w-xl p-4 space-y-2 text-xl text-gray-400 ">
                        <span class="break-words">{{ $comment->contenu }}</span>
                    </div>
                </div>
            @endforeach
        </div>


        {{-- Notation Étoiles --}}

        <div
            class="container flex flex-col w-full max-w-lg pt-6 pb-4 mx-auto mt-10 mb-8 text-gray-100 transition duration-500 bg-gray-900 rounded-lg sm:mx-auto btnmenu hover:scale-105">
            <h2>Notes:</h2>
            <div class="flex flex-wrap justify-center mt-2 mb-1 space-x-2">

                <div class="flex flex-row space-x-2 text-yellow-500">

                    @for ($i = 0; $i < round($noteProduct['average']); $i++)
                        <i class="text-yellow-500 fa-solid fa-star"></i>
                    @endfor
                    <span class="text-gray-400"> {{ $noteProduct['average'] }} sur 5</span>
                </div>

            </div>
            <p class="text-sm text-gray-400">Sur un total de {{ $noteProduct['total'] }} votes</p>
            <div class="flex flex-col mt-4">
                @for ($i = 5; $i > 0; $i--)
                    <div class="flex items-center space-x-1">
                        <span class="flex-shrink-0 w-12 text-sm"> {{ $noteProduct['note'][$i] }}</span>
                        <div class="flex-1 h-4 overflow-hidden bg-gray-700 rounded-sm">
                            <div class="h-4 bg-orange-300 " style="width:{{ $noteProduct['prct'][$i] }}%;"></div>
                        </div>
                        <span class="flex-shrink-0 w-12 text-sm"> {{ $i }}</span>
                    </div>
                @endfor
            </div>
        </div>
    </div>

    <style>
        input[type='number']::-webkit-inner-spin-button,
        input[type='number']::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .custom-number-input input:focus {
            outline: none !important;
        }

        .custom-number-input button:focus {
            outline: none !important;
        }
    </style>

    <script>
        function decrement(e) {
            const btn = e.target.parentNode.parentElement.querySelector(
                'button[data-action="decrement"]'
            );
            const target = btn.nextElementSibling;
            let value = Number(target.value);
            value--;
            if (value < 1) {
                value = 1;
            } else {
                target.value = value;
            }

        }

        function increment(e) {
            const btn = e.target.parentNode.parentElement.querySelector(
                'button[data-action="decrement"]'
            );
            const target = btn.nextElementSibling;
            let value = Number(target.value);
            value++;
            target.value = value;
        }

        const decrementButtons = document.querySelectorAll(
            `button[data-action="decrement"]`
        );

        const incrementButtons = document.querySelectorAll(
            `button[data-action="increment"]`
        );

        decrementButtons.forEach(btn => {
            btn.addEventListener("click", decrement);
        });

        incrementButtons.forEach(btn => {
            btn.addEventListener("click", increment);
        });
    </script>
