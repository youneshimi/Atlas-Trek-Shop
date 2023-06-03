<section class="max-w-screen-xl pt-4 mx-auto">
    <div class="text-gray-400 bg-gray-900 rounded-lg shadow-sm body-font bg-opacity-80">
        <div class="container flex flex-col items-center justify-center px-5 py-24 mx-auto lg:pl-32 md:flex-row">
            <img class="object-cover object-center w-auto h-48 p-8 rounded" alt="hero" src="{{ $user->photo }}">
            <div
                class="flex flex-col items-center text-center lg:flex-grow md:w-1/2 lg:pl-32 md:pl-24 md:items-start md:text-left">
                <h1 class="mb-4 text-3xl font-medium text-white title-font sm:text-4xl">{{ $user->prenom }}
                    {{ $user->nom }}</h1>
                <p class="mb-2 leading-relaxed">{{ $user->address }}</p>
                <p class="mb-2 leading-relaxed">{{ $user->zipCode }}</p>
                <p class="mb-2 leading-relaxed">{{ $user->city }}</p>
                <p class="mb-2 leading-relaxed">{{ $user->numero_telephone }}</p>
                <p class="mb-2 leading-relaxed">{{ $user->email }}</p>
            </div>
        </div>
    </div>

    <div class="flex flex-col justify-center mx-auto mt-10 md:flex-row">

        @foreach ($comments as $comment)
            <div
                class="container flex flex-col w-full max-w-lg p-6 mx-auto mt-4 text-gray-100 transition duration-500 bg-gray-900 divide-y divide-gray-700 rounded-md md:mx-4 btnmenu hover:scale-105">
                <h2 class="pb-2 text-white">{{ $produits->where('id', '=', $comment->product_id)->first()->titre }}
                </h2>
                <div class="flex justify-between p-4">

                    <div class="flex space-x-4">
                        <div>
                            <h4 class="font-bold">{{ $comment->user->prenom }} {{ $comment->user->nom }}</h4>
                            <span class="text-sm text-gray-400">{{ $comment->created_at->diffForHumans() }} </span>
                        </div>
                    </div>
                    <div class="flex flex-row items-center pl-2 space-x-2 text-yellow-500">
                        @for ($i = 0; $i < $comment->note; $i++)
                            <i class="text-yellow-500 fa-solid fa-star"></i>
                        @endfor
                    </div>
                    <a href="/deleteComm/{{ $comment->id_comm }}"><i
                            class="pl-4 fa-solid fa-trash-can hover:text-red-600"></i></a>
                </div>
                <div class="max-w-xl p-4 space-y-2 text-xl text-gray-400">
                    <span class="break-words">{{ $comment->contenu }}</span>


                </div>
            </div>
        @endforeach

    </div>



</section>
