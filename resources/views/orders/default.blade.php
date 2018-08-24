<html lang="en"><head>
    <meta charset="UTF-8">
    <title>bulma cards</title>
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon.png">
    <link rel="stylesheet prefetch" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.css">
    <link rel="stylesheet prefetch" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

    <style>
        #sectioncontainer {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 0;
            margin-top: 20px;
        }

        .board-item {
            margin: 5px 0;
            will-change: transform;
        }

        .board-item-content {
            word-wrap: normal;
            position: relative;
            padding: 20px;
            background: #fff;
            border-radius: 4px;
            font-size: 17px;
            text-align: center;
            cursor: pointer;
            -webkit-box-shadow: 0px 1px 3px 0 rgba(0,0,0,0.2);
            box-shadow: 0px 1px 3px 0 rgba(0,0,0,0.2);
            margin: 5px;
        }

        .delete {
            pointer-events: auto;
        }
    </style>

</head>
<body>
<nav class="navbar has-shadow">
    <div class="container">
        <div class="navbar-brand"><a class="navbar-item" href="../"><img src="http://bulma.io/images/bulma-logo.png" alt="Bulma: a modern CSS framework based on Flexbox"></a>
            <div class="navbar-burger burger" data-target="navMenu"><span></span><span></span><span></span></div>
        </div>
        <div class="navbar-menu" id="navMenu">
            <div class="navbar-end">
                <div class="navbar-item has-dropdown is-hoverable"><a class="navbar-link">Account</a>
                    <div class="navbar-dropdown"><a class="navbar-item">Dashboard</a><a class="navbar-item">Profile</a><a class="navbar-item">Settings</a>
                        <hr class="navbar-divider">
                        <div class="navbar-item">Logout</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<section class="hero is-info">
    <div class="hero-body">
        <div class="container">
            <div class="card">
                <div class="card-content">
                    <div class="content">
                        <div class="control has-icons-left has-icons-right">
                            <input class="input is-large" type="search" placeholder=""><span class="icon is-medium is-left"><i class="fa fa-search"></i></span><span class="icon is-medium is-right"><i class="fa fa-empire"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="box cta">
    <div class="columns is-mobile is-centered">
        <div class="field is-grouped is-grouped-multiline">
            <div class="control"><span class="tag is-link is-large">Link</span></div>
            <div class="control"><span class="tag is-success is-large">Success</span></div>
            <div class="control"><span class="tag is-black is-large">Black</span></div>
            <div class="control"><span class="tag is-warning is-large">Warning</span></div>
            <div class="control"><span class="tag is-danger is-large">Danger</span></div>
            <div class="control"><span class="tag is-info is-large">Info</span></div>
        </div>
    </div>
</div>
<section class="container">
    <div class="columns is-mobile is-centered" id="sectioncontainer">
        <div class="column is-narrow">
            <article class="message is-black">
                <div class="message-header">
                    <p>Season 1</p>
                    <button class="delete" aria-label="delete"></button>
                </div>
                <div class="message-body">
                    <div class="board-item">
                        <div class="board-item-content"><span>The Fort</span></div>
                    </div>
                    <div class="board-item">
                        <div class="board-item-content"><span>Fist Like a bullet</span></div>
                    </div>
                    <div class="board-item">
                        <div class="board-item-content"><span>White Stork Spreads Wings</span></div>
                    </div>
                    <div class="board-item">
                        <div class="board-item-content"><span>Two Tigers Subdue Dragons</span></div>
                    </div>
                    <div class="board-item">
                        <div class="board-item-content"><span>Snake Creeps Down</span></div>
                    </div>
                    <div class="board-item">
                        <div class="board-item-content"><span>Hand of Five Poisons</span></div>
                    </div>
                </div>
            </article>
        </div>
        <div class="column is-narrow">
            <article class="message is-primary">
                <div class="message-header">
                    <p>Season 2</p>
                    <button class="delete" aria-label="delete"></button>
                </div>
                <div class="message-body">
                    <div class="board-item">
                        <div class="board-item-content"><span>Tiger Pushes Mountain</span></div>
                    </div>
                    <div class="board-item">
                        <div class="board-item-content"><span>Force of Eagle's Claw</span></div>
                    </div>
                    <div class="board-item">
                        <div class="board-item-content"><span>Red Sun, Silver Moon</span></div>
                    </div>
                    <div class="board-item">
                        <div class="board-item-content"><span>Palm of the Iron Fox</span></div>
                    </div>
                    <div class="board-item">
                        <div class="board-item-content"><span>Monkey Leaps Through Mist</span></div>
                    </div>
                    <div class="board-item">
                        <div class="board-item-content"><span>Leopard Stalks in Snow</span></div>
                    </div>
                    <div class="board-item">
                        <div class="board-item-content"><span>Black Heart, White Mountain</span></div>
                    </div>
                    <div class="board-item">
                        <div class="board-item-content"><span>Sting of the Scorpion's Tail</span></div>
                    </div>
                    <div class="board-item">
                        <div class="board-item-content"><span>Nightingale Sings No More</span></div>
                    </div>
                    <div class="board-item">
                        <div class="board-item-content"><span>Wolf's Breath, Dragon Fire</span></div>
                    </div>
                </div>
            </article>
        </div>
        <div class="column is-narrow">
            <article class="message is-link">
                <div class="message-header">
                    <p>Season 3</p>
                    <button class="delete" aria-label="delete"></button>
                </div>
                <div class="message-body">
                    <div class="board-item">
                        <div class="board-item-content"><span>Enter the Phoenix</span></div>
                    </div>
                    <div class="board-item">
                        <div class="board-item-content"><span>Moon Rises, Raven Seeks</span></div>
                    </div>
                    <div class="board-item">
                        <div class="board-item-content"><span>Leopard Snares Rabbit</span></div>
                    </div>
                    <div class="board-item">
                        <div class="board-item-content"><span>Blind Cannibal Assassins</span></div>
                    </div>
                    <div class="board-item">
                        <div class="board-item-content"><span>Carry Tiger to Mountain</span></div>
                    </div>
                    <div class="board-item">
                        <div class="board-item-content"><span>Black Wind Howls</span></div>
                    </div>
                    <div class="board-item">
                        <div class="board-item-content"><span>Dragonfly's Last Dance</span></div>
                    </div>
                    <div class="board-item">
                        <div class="board-item-content"><span>Leopard Catches Cloud</span></div>
                    </div>
                </div>
            </article>
        </div>
        <div class="column is-narrow">
            <article class="message is-info">
                <div class="message-header">
                    <p>Info</p>
                    <button class="delete" aria-label="delete"></button>
                </div>
                <div class="message-body">
                    <div class="board-item">
                        <div class="board-item-content"><span>Bronchy</span></div>
                    </div>
                    <div class="board-item">
                        <div class="board-item-content"><span>Aorta</span></div>
                    </div>
                    <div class="board-item">
                        <div class="board-item-content"><span>Alveolae</span></div>
                    </div>
                    <div class="board-item">
                        <div class="board-item-content"><span>TALISMAN</span></div>
                    </div>
                </div>
            </article>
        </div>
        <div class="column is-narrow">
            <article class="message is-success">
                <div class="message-header">
                    <p>Success</p>
                    <button class="delete" aria-label="delete"></button>
                </div>
                <div class="message-body">
                    <div class="board-item">
                        <div class="board-item-content"><span>signature</span></div>
                    </div>
                    <div class="board-item">
                        <div class="board-item-content"><span>weasel</span></div>
                    </div>
                    <div class="board-item">
                        <div class="board-item-content"><span>solana</span></div>
                    </div>
                    <div class="board-item">
                        <div class="board-item-content"><span>hydro</span></div>
                    </div>
                </div>
            </article>
        </div>
        <div class="column is-narrow">
            <article class="message is-warning">
                <div class="message-header">
                    <p>Warning</p>
                    <button class="delete" aria-label="delete"></button>
                </div>
                <div class="message-body">
                    <div class="board-item">
                        <div class="board-item-content"><span>Ganimede</span></div>
                    </div>
                    <div class="board-item">
                        <div class="board-item-content"><span>Europa</span></div>
                    </div>
                    <div class="board-item">
                        <div class="board-item-content"><span>Tycho</span></div>
                    </div>
                    <div class="board-item">
                        <div class="board-item-content"><span>Io</span></div>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>
<div class="columns is-mobile is-centered">
    <div class="column is-half is-narrow"></div>
</div>
<footer>
    <div class="box cta">
        <div class="columns is-mobile is-centered">
            <div class="field is-grouped is-grouped-multiline">
                <div class="control">
                    <div class="tags has-addons"><a class="tag is-link" href="https://github.com/dansup/bulma-templates">Bulma Templates</a><span class="tag is-light">Daniel Supernault</span></div>
                </div>
                <div class="control">
                    <div class="tags has-addons"><a class="tag is-link">The source code is licensed</a><span class="tag is-light">MIT &nbsp;<i class="fa fa-github"></i></span></div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="{{ asset('js/bulma.js') }}"></script>

<link rel="stylesheet" type="text/css" href="chrome-extension://liecbddmkiiihnedobmlmillhodjkdmb/css/content.css"></body><loom-container id="lo-engage-ext-container"><loom-shadow data-reactroot="" classname="resolved"></loom-shadow></loom-container></html>