@php($urlcat = request()->query('categories'))
@php($urlnote = request()->query('note'))
@php($urlprix = request()->query('prix'))
<div class="w-full px-4 rounded-lg">
    <!-- mobile menu -->

    <ul id="menu"
        class="fixed top-0 right-0 z-50 hidden px-10 py-16 bg-gray-800 md:z-0 md:relative md:flex md:p-0 md:bg-transparent md:flex-row md:space-x-6">

        <li class="fixed z-10 md:hidden top-4 right-6">
            <a href="javascript:void(0)" class="text-4xl text-right text-white" onclick="toggleMenu()">&times;</a>
        </li>

        <li>
            <form action="{{ route('searchfilter') }}" method="get">

                <input type="text" name="q" placeholder="Recherche..." id="place-holder-center"
                    class="outline-none mx-1  w-[188px] my-2 btnmenu text-center h-[43.99px] py-3 px-2 text-sm text-white bg-gray-600 border border-transparent rounded-md hover:border-emerald-500 focus:border-emerald-500"
                    value="{{ request()->q ?? '' }}">


                <select name="categories"  
                    class="mx-1 w-[188px] text-center my-2 appearance-none  btnmenu h-[43.99px] py-3 text-sm text-white bg-gray-600 border border-transparent rounded-md hover:border-emerald-500 apple">
                    <option value="" class="text-center   px-0" id="place-holder-center">Catégories </option>

                    @foreach ($categories as $categorie)
                  
                    <option value="{{ $categorie->id_cat }}" {{ $urlcat == $categorie->id_cat ? 'selected' : '' }} class="text-center ">{{ $categorie->label }}
                        </option>
                    @endforeach
                </select>

                <select name="note"
                    class="mx-1 w-[188px] my-2 appearance-none btnmenu  h-[43.99px] py-3 text-center text-sm text-white bg-gray-600 border border-transparent rounded-md hover:border-emerald-500 apple">
                    <option value="" class="text-center">Notes</option>
                    <option value="1" {{ $urlnote == 1 ? 'selected' : '' }} class="text-center text-yellow-500">★
                    </option>
                    <option value="2" {{ $urlnote == 2 ? 'selected' : '' }} class="text-center text-yellow-500">
                        ★★</option>
                    <option value="3" {{ $urlnote == 3 ? 'selected' : '' }} class="text-center text-yellow-500">
                        ★★★</option>
                    <option value="4" {{ $urlnote == 4 ? 'selected' : '' }} class="text-center text-yellow-500">
                        ★★★★</option>
                    <option value="5" {{ $urlnote == 5 ? 'selected' : '' }} class="text-center text-yellow-500">
                        ★★★★★</option>
                </select>

                <select name="prix"
                    class="mx-1  w-[188px] my-2 appearance-none btnmenu h-[43.99px] text-center py-3 text-sm text-white bg-gray-600 border border-transparent rounded-md hover:border-emerald-500 apple">
                    <option value="" class="text-center">Prix</option>
                    <option value="10" {{ $urlprix == 10 ? 'selected' : '' }} class="text-center">
                        moins de 10€</option>
                    </option>
                    <option value="20" {{ $urlprix == 20 ? 'selected' : '' }} class="text-center">
                        moins de 20€</option>
                    <option value="30" {{ $urlprix == 30 ? 'selected' : '' }} class="text-center">
                        moins de 30€</option>
                    <option value="40" {{ $urlprix == 40 ? 'selected' : '' }} class="text-center">
                        moins de 40€</option>
                    <option value="50" {{ $urlprix == 50 ? 'selected' : '' }} class="text-center">
                        moins de 50€</option>
                    <option value="200" {{ $urlprix == 200 ? 'selected' : '' }} class="text-center">Tous les prix
                    </option>
                </select>

              <a href="/">  <input type="button" 
                    class="mx-1  w-[188px] my-2 h-[43.99px] text-sm text-center  text-gray-100 rounded-md btnmenu bg-violet-500 hover:bg-violet-400 focus:outline-none focus:bg-violet-900" value="Effacer les filtres">
                    
                       
              </input></a>
                <button
                    class="mx-1  w-[188px] my-2 btnmenu h-[43.99px] text-sm text-center text-gray-100 transition-colors duration-200 bg-emerald-500 hover:bg-emerald-400 focus:outline-none focus:bg-emerald-500 rounded-md">Valider</button>

            </form>
        </li>
    </ul>

    <!-- This is used to open the menu on mobile devices -->
    <div class="flex items-center md:hidden">
        <button class="text-4xl font-bold text-white duration-300 opacity-70 hover:opacity-100" onclick="toggleMenu()">
            &#9776;
        </button>
        <script>
            var menu = document.getElementById('menu');

            function toggleMenu() {
                menu.classList.toggle('hidden');
                menu.classList.toggle('w-full');
                menu.classList.toggle('h-screen');
            }
        </script>



    </div>
</div>
