@section('main_menu')
    <!--TOP SECTION-->
    <div class="row">
        <div class="logo">
           ПГХТ Сливен
            </a>
        </div>
        <div class="menu-bar">
            <ul>
                <li><a href="{{ url('/') }}">Начало</a>
                </li>
                <li><a href="{{ url('/room_type') }}">Стаи</a>
                </li>
                <li><a href="{{ url('/event') }}">Събития</a>
                </li>
                <li><a href="{{ url('/food') }}">Меню</a>
                </li>
                @if(count(\App\Model\Page::where('title', 'About')->where('status', true)->get()) > 0)
                <li><a href="{{ url('/about') }}">За нас</a>
                </li>
                @endif
                <li><a href="{{ url('/contact') }}">Контакти</a>
                </li>


                @if (Auth::guest())
                    <li><a href="{{ route('register') }}">Регистрация</a>
                    </li>
                    <li><a href="{{ route('login') }}">Влизане</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>




    <div class="all-drop-down">
        <!-- Dropdown Structure -->
        <ul id='drop-home' class='dropdown-content drop-con-man'>
            <li><a href="main.html">Начало - Дъска</a>
            </li>
            <li><a href="index-1.html">Начало - Резервация</a>
            </li>
        </ul>
    </div>
    <!--TOP SECTION-->
@show