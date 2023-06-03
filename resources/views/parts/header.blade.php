@php   use \App\Http\Controllers\CartController; @endphp


<div class="p-4">
    <div class="flex items-center justify-between h-16 max-w-screen-xl px-4 mx-auto">
        <div class="flex items-center pb-4 mx-auto space-x-4 md:mx-0 lg:mx-0">
            <a href="/"><img src="/img/55.png" alt="logo" class="w-auto h-12 "></a>
        </div>

        @if (session('cart_ok'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000, PopupUser())" class="pt-1 pr-4">
                <div id="popmenu" class="px-4 py-2 text-xs btnmenu text-emerald-500"><i
                        class="fa-solid fa-basket-shopping"></i>&zwnj; Article ajouté au panier</div>
            </div>
        @endif

        @if (session('success'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 6000, PopupUser())">
                <div id="popmenu" class="px-4 py-2 text-gray-100 btnmenu">Bienvenue {{ Auth::user()->prenom }}</div>
            </div>
        @endif
        @if (session('error'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 6000, PopupUser())" class="pt-2 pr-4">
                <div id="popmenu" class="px-4 py-2 text-red-400 btnmenu">Login ou mot de passe incorrect</div>
            </div>
        @endif
        @if (session('desactivate'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 6000, PopupUser())" class="pt-2 pr-4">
                <div id="popmenu" class="px-4 py-2 text-red-400 btnmenu">Connection impossible, Compte désactivé</div>
            </div>
        @endif


        @if ($errors->has('email', 'password'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 6000, PopupUser())" class="pt-2 pr-4">
                <div id="popmenu" class="px-4 py-2 text-red-400 btnmenu">Email ou mot de passe invalide</div>
            </div>
        @elseif ($errors->has('password'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 6000, PopupUser())" class="pt-2 pr-4">
                <div id="popmenu" class="px-4 py-2 text-red-400 btnmenu">Les mots de passe ne correspondent pas</div>
            </div>
        @elseif ($errors->has('email'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 6000, PopupUser())" class="pt-2 pr-4">
                <div id="popmenu" class="px-4 py-2 text-red-400 btnmenu">Cet email existe déjà ou n'est pas valide
                </div>
            </div>
        @endif

        <div class="sm:hidden md:flex lg:flex">
            @guest
                <div class="items-center hidden space-x-4 md:flex lg:flex">
                    @include('parts.login')
                    @include('parts.register')
                </div>
            @endguest
            @auth

                <div class="items-center hidden space-x-2 md:flex lg:flex">
                    @if (Auth::user()->profil == 'admin')
                        <a href="/giftCards"
                            class="flex items-center justify-center h-8 px-4 pt-1 pb-1 mx-1 space-x-2 tracking-wide text-white transition-colors duration-200 transform bg-sky-500 rounded-md tooltip btnmenu hover:bg-blue-400 focus:outline-none focus:bg-blue-500">
                            <i class="fa-solid fa-gear"></i>
                            <span class="px-4 tooltiptext">Gestion</span>
                        </a>
                    @endif
                    <a href="/account"
                        class="flex items-center justify-center h-8 px-4 pt-1 pb-1 mx-1 space-x-2 tracking-wide text-white transition-colors duration-200 transform rounded-md tooltip btnmenu bg-violet-600 hover:bg-violet-400 focus:outline-none focus:bg-violet-500">
                        <i class="fa-solid fa-user"></i>
                        <span class="px-4 tooltiptext">Profil</span>
                    </a>
                    <a href="/cart"
                        class="flex items-center justify-center h-8 px-4 pt-1 pb-1 mx-1 space-x-2 tracking-wide text-white transition-colors duration-200 transform rounded-md tooltip btnmenu bg-emerald-500 hover:bg-emerald-300 focus:outline-none focus:bg-emerald-500">
                        <i class="fa-solid fa-basket-shopping"></i>
                        <span class="px-2 tooltiptext"> &zwnj; Panier</span>
                        <span class="articles">{{ CartController::MonPanier() }}</span>
                    </a>
                    <a href="/logout"
                        class="flex items-center justify-center h-8 px-4 pt-1 pb-1 mx-1 space-x-2 tracking-wide text-white transition-colors duration-200 transform bg-gray-900 rounded-md tooltip btnmenu hover:bg-gray-400 focus:outline-none focus:bg-gray-500">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span class="px-4 tooltiptext">Se déconnecter</span>
                    </a>
                </div>
            @endauth
        </div>
    </div>

    <div class="flex flex-row pb-2 border-b border-gray-100 lg:hidden md:hidden">
        @guest
            <div class="flex flex-row m-auto ">
                @include('parts.login')
                @include('parts.register')
            </div>
        @endguest

        @auth
            <div class="flex flex-row mx-auto space-x-2">
                <a href="/giftCards"
                    class="flex items-center justify-center h-8 px-4 pt-1 pb-1 mx-1 space-x-2 tracking-wide text-white transition-colors duration-200 transform bg-blue-600 rounded-md btnmenu hover:bg-blue-400 focus:outline-none focus:bg-blue-500">
                    <i class="fa-solid fa-gear"></i>
                </a>
                <a href="/account"
                    class="flex items-center justify-center h-8 px-4 pt-1 pb-1 mx-1 space-x-2 tracking-wide text-white transition-colors duration-200 transform rounded-md btnmenu bg-violet-600 hover:bg-violet-400 focus:outline-none focus:bg-violet-500">
                    <i class="fa-solid fa-user"></i>
                </a>
                <a href="/cart"
                    class="flex items-center justify-center h-8 px-4 pt-1 pb-1 mx-1 space-x-2 tracking-wide text-white transition-colors duration-200 transform rounded-md btnmenu bg-emerald-500 hover:bg-emerald-300 focus:outline-none focus:bg-emerald-500">
                    <i class="fa-solid fa-basket-shopping"></i>
                    <span class="articles">{{ CartController::MonPanier() }}</span>
                </a>
                <a href="/logout"
                    class="flex items-center justify-center h-8 px-4 pt-1 pb-1 mx-1 space-x-2 tracking-wide text-white transition-colors duration-200 transform bg-gray-600 rounded-md btnmenu hover:bg-gray-400 focus:outline-none focus:bg-gray-500">
                    <i class="fa-solid fa-right-from-bracket"></i>
                </a>
            </div>
        @endauth
    </div>
</div>

<style>
    /* ANIMATION SURVOL MENU FULL CSS AU TOP */
    .tooltip {
        position: relative;
        display: inline-block;
        border-bottom: 1px dotted black;
    }

    /* Tooltip text */
    .tooltip .tooltiptext {
        visibility: hidden;
        width: 130px;
        top: -35px;
        left: -50px;
        color: rgba(255, 255, 255, 0.534);
        text-alrgba(255, 255, 255, 0.459) center;
        padding: 4px 4px;
        border-radius: 6px;
        position: absolute;
        z-index: 1;
    }

    .tooltip:hover .tooltiptext {
        visibility: visible;
    }

    .tooltip .tooltiptext {
        opacity: 0;
        transition: opacity 0.2s;
    }

    .tooltip:hover .tooltiptext {
        opacity: 1;
    }

    #popmenu {
        position: fixed;
        top: -50px;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 100;
        background-color: #46515F;
        text-decoration: none;
        transition: 0.25s;
        border-radius: 8px;
        user-select: none;
        overflow: hidden;

    }

    #popmenu.active {
        top: 60px;
        transition: 0.3s;
        transition: 0.25s;
    }

    @media (max-width: 640px) {
        #popmenu.active {
            top: 165px;
            transition: 0.3s;
            transition: 0.25s;
        }
    }
</style>


<script>
    function PopupUser() {
        console.log('okpop');
        var updateElement = document.getElementById("popmenu");
        updateElement.classList.toggle("active");

    }
</script>
