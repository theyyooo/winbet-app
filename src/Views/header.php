<header class="site-header">
    <div class="site-header__wrapper">
        <a href="/"><img class="brand" src="/assets/WINBET.svg"></a>
        <nav>
            <ul class="nav__wrapper">
                <li class="nav__item"><a class="connexion" href="/user/login">Connexion</a></li>
                <li class="nav__item"><a class="inscription" href="/user/sign-up">Inscription</a></li>
            </ul>
        </nav>
    </div>
</header>

<style>
    .brand {
        padding-top: 2rem;
        padding-bottom: 2rem;
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
        padding-top: 10px;
        padding-bottom: 10px;
        padding-right: 50px;
        padding-left: 50px;
        border-radius: 5px;
        text-decoration: none;
        color: black;
    }

    .inscription{
        background-color: white;
        padding-top: 10px;
        padding-bottom: 10px;
        padding-right: 50px;
        padding-left: 50px;
        margin-right:25vw;
        border-radius: 5px;
        text-decoration: none;
        color: black;
    }
</style>