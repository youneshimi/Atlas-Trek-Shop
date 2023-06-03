<section class="max-w-screen-xl pt-4 mx-auto">
    <div class="text-gray-400 bg-gray-700 rounded-lg shadow-sm body-font bg-opacity-90">
        <div class="container flex flex-col items-center justify-center px-5 py-24 mx-auto lg:pl-32 md:flex-row">
            <img class="object-cover object-center w-auto h-48 p-8 rounded" alt="hero"
                src="{{ Auth::user()->photo }}">
            <div
                class="flex flex-col items-center text-center lg:flex-grow md:w-1/2 lg:pl-32 md:pl-24 md:items-start md:text-left">
                <h1 class="mb-4 text-3xl font-medium text-white title-font sm:text-4xl">{{ Auth::user()->prenom }}
                    {{ Auth::user()->nom }}</h1>
                <p class="mb-2 leading-relaxed">{{ Auth::user()->address }}</p>
                <p class="mb-2 leading-relaxed">{{ Auth::user()->zipCode }}</p>
                <p class="mb-2 leading-relaxed">{{ Auth::user()->city }}</p>
                <p class="mb-2 leading-relaxed">{{ Auth::user()->numero_telephone }}</p>
                <p class="mb-2 leading-relaxed">{{ Auth::user()->email }}</p>
                <div class="flex justify-center p-4">
                    @php($user = Auth::user())
                    @include('parts.compte')
                </div>
            </div>
        </div>
    </div>
</section>
