<div class="max-w-screen-xl mx-auto">
    <div class="flex items-center text-gray-200 text-base  font-bold sm:text-sm">
        <a rel="noopener noreferrer" href="/"
            class="px-3 py-1 md:border-b-2 md:border-gray-200 hover:border-emerald-500 hover:text-emerald-500 sm:text-sm">Accueil</a>
        @if (Auth::user()->profil == 'admin')
            <a rel="noopener noreferrer" href="/giftCards"
                class="px-5 py-1 md:border-b-2 md:border-gray200 hover:border-emerald-500 hover:text-emerald-500">
                Articles</a>
            <a rel="noopener noreferrer" href="/categories"
                class="px-5 py-1 md:border-b-2 md:border-gray-200 hover:border-emerald-500 hover:text-emerald-500">Catégories</a>
            <a rel="noopener noreferrer" href="/users"
                class="px-5 py-1 md:border-b-2 md:border-gray-200 hover:border-emerald-500 hover:text-emerald-500">
                Utilisateurs</a>
        @endif
    </div>
</div>
