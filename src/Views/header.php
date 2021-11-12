<header class="site-header">
    <div class="site-header__wrapper">
        <a href="/"><img class="brand" src="/assets/WINBET.svg"></a>
        <nav>
            <ul class="nav__wrapper">
                <li class="nav__item"><a class="connexion" href="/user/login">Connexion</a></li>
                <li class="nav__item"><a class="inscription" href="/user/signup">Inscription</a></li>
            </ul>
        </nav>
    </div>
</header>

<style>
    .brand {
        padding-top: 1rem;
        padding-bottom: 1rem;
        margin-left: 10vw;
        height: 35px;
    }

    .site-header {
        background-color: #313131;
    }

    .site-header__wrapper {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .nav__wrapper {
        display: flex;
        list-style-type: none;
    }

    .nav__item a {
        display: block;
    }

    .nav__toggle {
        display: none;
    }

    .connexion{
        background-color: #FBCD27;
        margin-right: 2rem;
        padding-top: 5px;
        padding-bottom: 5px;
        padding-right: 25px;
        padding-left: 25px;
        border-radius: 5px;
        text-decoration: none;
        color: black;
    }

    .inscription{
        background-color: white;
        padding-top: 5px;
        padding-bottom: 5px;
        padding-right: 25px;
        padding-left: 25px;
        margin-right:25vw;
        border-radius: 5px;
        text-decoration: none;
        color: black;
    }
</style>