
<ul class="l-main-content main-content">
    <li class="l-section section section--is-active">
        <div class="intro">
            <div style="align-items: center" class="intro--banner">
                <div class="card">
                    <p style="text-align: center" class="price">
                        Confirm the events selected
                    </p>
                    <ul class="lists">
                        <li class="list">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><g stroke-width="0" id="SVGRepo_bgCarrier"></g><g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g><g id="SVGRepo_iconCarrier"> <path fill="#ffffff" d="M21.5821 5.54289C21.9726 5.93342 21.9726 6.56658 21.5821 6.95711L10.2526 18.2867C9.86452 18.6747 9.23627 18.6775 8.84475 18.293L2.29929 11.8644C1.90527 11.4774 1.89956 10.8443 2.28655 10.4503C2.67354 10.0562 3.30668 10.0505 3.70071 10.4375L9.53911 16.1717L20.1679 5.54289C20.5584 5.15237 21.1916 5.15237 21.5821 5.54289Z" clip-rule="evenodd" fill-rule="evenodd"></path> </g></svg>
                            <span>{{$selectedServices}} ticket for {{$name}}</span>
                        </li>
                    </ul>
                    <a href="{{route('checkout', ['services'=>$selectedServices, 'ticketId'=> $ticketId, 'name'=>$name])}}" class="action">
                        Proceed to pay
                    </a>
                </div>

                <img style="height: auto;width: 450px" src="assets/img/image1.png" alt="Welcome">
            </div>
        </div>
    </li>
    <li class="l-section section">
        <div class="work">
            <h2>About</h2>
            <div class="work--lockup">
                <ul class="slider">
                    <li class="slider--item slider--item-left">
                        <a href="#0">
                            <div class="slider--item-image">
                                <img src="assets/img/trophy.jpg" alt="babushka">
                            </div>
                            <p class="slider--item-title">  KIA awards winner</p>
                            <p class="slider--item-description">2023 KIA awards winner</p>
                        </a>
                    </li>
                    <li class="slider--item slider--item-center">
                        <a href="#0">
                            <div class="slider--item-image">
                                <img src="assets/img/work-metiew-smith.jpg" alt="babushka">
                            </div>
                            <p class="slider--item-title">Content creator</p>
                            <p class="slider--item-description">Majors in dance and good vibes</p>
                        </a>
                    </li>
                    <li class="slider--item slider--item-right">
                        <a href="#0">
                            <div class="slider--item-image">
                                <img src="assets/img/motivational.jpeg" alt="babushka">
                            </div>
                            <p class="slider--item-title">Motivational speaker</p>
                            <p class="slider--item-description">Ulemavu sio kikwazo</p>
                        </a>
                    </li>
                </ul>
<style>
    .card {
        max-width: 320px;
        display: flex;
        flex-direction: column;
        border-radius: 1.5rem;
        background-color: rgba(0, 0, 0, 1);
        padding: 1.5rem;
    }

    .price {
        font-size: 3rem;
        line-height: 1;
        font-weight: 300;
        letter-spacing: -0.025em;
        color: rgba(255, 255, 255, 1);
    }

    .lists {
        margin-top: 2.5rem;
        display: flex;
        flex-direction: column;
        grid-row-gap: 0.75rem;
        row-gap: 0.75rem;
        font-size: 0.875rem;
        line-height: 1.25rem;
        color: rgba(255, 255, 255, 1);
    }

    .list {
        display: flex;
        align-items: center;
    }

    .list svg {
        height: 1rem;
        width: 1rem;
    }

    .list span {
        margin-left: 1rem;
    }

    .action {
        margin-top: 2rem;
        width: 90%;
        border: 2px solid  rgba(255, 255, 255, 1);
        border-radius: 9999px;
        background-color: rgba(255, 255, 255, 1);
        padding: 0.625rem 1.5rem;
        text-align: center;
        font-size: 0.875rem;
        line-height: 1.25rem;
        color: rgba(0, 0, 0, 1);
        outline: none;
        transition: all .2s ease;
    }

    .action:hover {
        color: rgba(255, 255, 255, 1);
        background-color: transparent;
    }
</style>
