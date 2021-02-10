@section('mobile_menu')
<!--MOBILE MENU-->
<section>
    <div class="mm">
        <div class="mm-inn">
            <div class="mm-logo">
               ПГХТ Сливен
            </div>
            <div class="mm-icon"><span><i class="fa fa-bars show-menu" aria-hidden="true"></i></span>
            </div>
            <div class="mm-menu">
                <div class="mm-close"><span><i class="fa fa-times hide-menu" aria-hidden="true"></i></span>
                </div>
                <ul>
                    <li><a href="{{ url('/') }}">Начало</a>
                    </li>
                    <li><a href="{{ url('/room_type') }}">Стаи</a>
                    </li>
                    <li><a href="{{ url('/event') }}">Евенти</a>
                    </li>
                    <li><a href="{{ url('/food') }}">Меню</a>
                    </li>
                    @if(count(\App\Model\Page::where('title', 'About')->where('status', true)->get()) > 0)
                        <li><a href="{{ url('/about') }}">За нас</a>
                        </li>
                    @endif
                    <li><a href="{{ url('/contact') }}">Контакти</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
    @show