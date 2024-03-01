<li class="l-section section">
    <div class="hire">
        <h2>Select events</h2>
        <!-- checkout formspree.io for easy form setup -->
        <form method="post" action="{{ route('tickets') }}" class="work-request" enctype="multipart/form-data">
            @csrf

            <div class="work-request--options">
                @foreach($events as $e)
                    <span class="options-a">
        <input  id="opt-{{$loop->iteration}}" name="services[]" type="checkbox" value="{{$e->eventname}}">
        <label for="opt-{{$loop->iteration}}" >
            {{$e->eventname}}
            <!-- Your SVG code and event name -->
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 150 111" style="enable-background:new 0 0 150 111;" xml:space="preserve">
                <g transform="translate(0.000000,111.000000) scale(0.100000,-0.100000)">
                    <path d="M950,705L555,310L360,505C253,612,160,700,155,700c-6,0-44-34-85-75l-75-75l278-278L550-5l475,475c261,261,475,480,475,485c0,13-132,145-145,145C1349,1100,1167,922,950,705z"/>
                </g>
            </svg>
        </label>
    </span>
                    @endforeach
            </div>

            <div class="work-request--information">
                <div class="information-name">
                    <input id="name" name="name" type="text" spellcheck="false">
                    <label for="name">Name</label>
                </div>
                <div class="information-email">
                    <input id="email" name="email" type="email" spellcheck="false">
                    <label for="email">Email</label>
                </div>
            </div>
            <input type="submit" value="Send Request">
        </form>

    </div>
</li>
</ul>
</div>
</div>
</div>
