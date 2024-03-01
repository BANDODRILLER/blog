
<ul class="l-main-content main-content">
<li class="l-section section section--is-active">
    <div style="height: 10vh"></div>
    <div class="intro">
        @foreach($service as $s)

            <div class="card">
                <div class="icon">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g
                            id="SVGRepo_tracerCarrier"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        ></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M20 14V17.5C20 20.5577 16 20.5 12 20.5C8 20.5 4 20.5577 4 17.5V14M12 15L12 3M12 15L8 11M12 15L16 11"
                                stroke="#ffffff"
                                stroke-width="1.5"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            ></path>
                        </g>
                    </svg>
                </div>
                <div class="content">
                    <span class="title">{{$s->eventname}}</span>
                    <div style="width: 600px" class="actions">
                        <div class="actions">
                            <div>
                                <a class="notnow" href="#" onclick="updateTotal('{{$s->eventname}}', 'One person ticket', {{$s->single_ticket_price}})">One person ticket valued at ({{$s->single_ticket_price}})</a>
                            </div>
                            <br>
                            <div>
                                <a class="notnow" href="#" onclick="updateTotal('{{$s->eventname}}', 'Partners ticket', {{$s->partners_tickets_price}})">Partners ticket valued at ({{$s->partners_tickets_price}})</a>
                            </div>
                            <br>
                            <div>
                                <a class="notnow" href="#" onclick="updateTotal('{{$s->eventname}}', '10 people ticket', {{$s->group_tickets_price}})">10 people ticket valued at ({{$s -> group_tickets_price}})</a>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="close" type="button">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        aria-hidden="true"
                    >
                        <path
                            clip-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            fill-rule="evenodd"
                        ></path>
                    </svg>
                </button>
            </div>
            <h4>MPESA NUMBER:</h4>
            <input type="tel" id="phoneNumberInput" placeholder="Enter phone number" style="padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 5px;color: black" value="254"  minlength="12" maxlength="12" oninput="enforcePrefix()" required>
        @endforeach
        <div style="align-items: center;text-align: center"  class="comment-form">
        </div>
        <ul class="list cat-list">
            <li>
                <div id="selected-services">
                    <h4>Event selected:</h4>
                    <ul id="selected-services-list"></ul>
                    <!-- Add a new <p> element to display the total price -->
                    <p><span id="independent-total-price">Total price: 0 €</span></p>
                </div>
            </li>
        </ul>
        <br>
        <button class="full-rounded fixed-button" onclick="initiateMPESAPayment()">
            <span>Pay via MPESA </span>
        </button>
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
        </div>
    </div>


                </ul>






                <style>
                    .card {
                        max-width: 320px;
                        display: flex;
                        align-items: flex-start;
                        justify-content: space-between;
                        border-radius: 0.5rem;
                        background: #606c88;
                        background: -webkit-linear-gradient(to right, #3f4c6b, #606c88);
                        background: linear-gradient(to right top, #3f4c6b, #606c88);
                        padding: 1rem;
                        color: rgb(107, 114, 128);
                        box-shadow: 0px 87px 78px -39px rgba(0, 0, 0, 0.4);
                    }

                    .icon {
                        height: 2rem;
                        width: 2rem;
                        flex-shrink: 0;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        border-radius: 0.5rem;
                        background-color: #153586;
                        color: rgb(59, 130, 246);
                    }

                    .icon svg {
                        height: 1.25rem;
                        width: 1.25rem;
                    }

                    .content {
                        margin-left: 0.75rem;
                        font-size: 0.875rem;
                        line-height: 1.25rem;
                        font-weight: 400;
                    }

                    .title {
                        margin-bottom: 0.25rem;
                        font-size: 0.875rem;
                        line-height: 1.25rem;
                        font-weight: 600;
                        color: rgb(255, 255, 255);
                        cursor: default;
                    }

                    .desc {
                        margin-bottom: 0.5rem;
                        font-size: 0.875rem;
                        line-height: 1.25rem;
                        font-weight: 400;
                        color: rgb(202, 200, 200);
                        cursor: default;
                    }

                    .actions {
                        display: grid;
                        grid-template-columns: repeat(2, minmax(0, 1fr));
                        grid-gap: 0.5rem;
                        gap: 0.5rem;
                    }

                    .download,
                    .notnow {
                        width: 100%;
                        display: inline-flex;
                        justify-content: center;
                        border-radius: 0.5rem;
                        padding: 0.375rem 0.5rem;
                        text-align: center;
                        font-size: 0.75rem;
                        line-height: 1rem;
                        color: rgb(255, 255, 255);
                        outline: 2px solid transparent;
                        border: 1px solid rgba(253, 253, 253, 0.363);
                    }

                    .download {
                        background-color: #284385;
                        font-weight: 600;
                        text-decoration: none;
                        transition: all 0.25s cubic-bezier(0.18, 0.69, 0.18, 0.94);
                    }

                    .download:hover {
                        background-color: #153586;
                    }

                    .notnow {
                        background-color: #606c88;
                        font-weight: 500;
                        text-decoration: none;
                        transition: all 0.25s cubic-bezier(0.18, 0.69, 0.18, 0.94);
                    }

                    .notnow:hover {
                        background-color: #3f4c6b;
                    }

                    .close {
                        margin: -0.375rem -0.375rem -0.375rem auto;
                        height: 2rem;
                        width: 2rem;
                        display: inline-flex;
                        border-radius: 0.5rem;
                        background-color: #606c88;
                        padding: 0.375rem;
                        color: rgba(255, 255, 255, 1);
                        border: none;
                        transition: all 0.25s cubic-bezier(0.18, 0.69, 0.18, 0.94);
                        cursor: pointer;
                    }

                    .close svg {
                        height: 1.25rem;
                        width: 1.25rem;
                    }

                    .close:hover {
                        background-color: rgb(58, 69, 83);
                    }
                    button {
                        font-size: 16px;
                        position: relative;
                        margin: auto;
                        padding: 1em 2.5em 1em 2.5em;
                        border: none;
                        background: #fff;
                        transition: all 0.1s linear;
                        box-shadow: 0 0.4em 1em rgba(0, 0, 0, 0.1);
                    }

                    button:active {
                        transform: scale(0.95);
                    }

                    button span {
                        color: #464646;
                    }

                    button .border {
                        position: absolute;
                        border: 0.15em solid #fff;
                        transition: all 0.3s 0.08s linear;
                        top: 50%;
                        left: 50%;
                        width: 9em;
                        height: 3em;
                        transform: translate(-50%, -50%);
                    }

                    button:hover .border {
                        display: block;
                        width: 9.9em;
                        height: 3.7em;
                    }

                    .full-rounded {
                        border-radius: 2em;
                    }

                </style>
                <style>
                    /* Add your existing styles here */

                    /* New styles for the fixed button */
                    .fixed-button {
                        position: fixed;
                        bottom: 0;
                        left: 0;
                        width: 100%;
                        background-color: white;
                        padding: 10px; /* Adjust padding as needed */
                        text-align: center;
                        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Optional: Add a shadow for better visibility */
                        z-index: 999; /* Optional: Adjust the z-index to make sure it appears above other elements */
                    }
                </style>
                <script>
                    function enforcePrefix() {
                        var input = document.getElementById('phoneNumberInput');
                        var prefix = '254';

                        // Check if the input value starts with the prefix
                        if (!input.value.startsWith(prefix)) {
                            input.value = prefix; // If not, set the value to the prefix
                        }
                    }
                    // Define an array to store selected services
                    var selectedServices = [];

                    // Define a function to update the total price and selected services
                    function updateTotal(eventName, ticketType, price) {
                        // Add the selected service to the array
                        selectedServices.push({ name: eventName, ticketType: ticketType, price: price });

                        // Update the selected services list
                        var selectedServicesList = document.getElementById('selected-services-list');
                        selectedServicesList.innerHTML = '';
                        selectedServices.forEach(function (service) {
                            var listItem = document.createElement('li');
                            listItem.innerText = service.name + ' - ' + service.ticketType + ' valued at ' + service.price.toFixed(2) + ' KES';
                            selectedServicesList.appendChild(listItem);
                        });

                        // Update the independent total price element
                        updateIndependentTotal();
                    }

                    // Define a function to update the independent total price element
                    function updateIndependentTotal() {
                        // Update the independent total price element
                        var independentTotalElement = document.getElementById('independent-total-price');
                        var currentTotal = selectedServices.reduce(function (total, service) {
                            return total + service.price;
                        }, 0);
                        independentTotalElement.innerText = 'Total price: ' + currentTotal.toFixed(2) + ' KES';
                    }

                    // Define a function to initiate MPESA payment
                    function initiateMPESAPayment() {
                        // Fetch the entered phone number
                        var phoneNumber = document.getElementById('phoneNumberInput').value;

                        // Fetch the total price and ticket names
                        var totalPrice = selectedServices.reduce(function (total, service) {
                            return total + service.price;
                        }, 0);

                        var ticketNames = selectedServices.map(function (service) {
                            return service.name;
                        });

                        // Call the route or function to initiate MPESA payment with totalPrice, ticketNames, and phone number
                        var ticketId = {{ $ticketId }};

                        // Modify the redirect URL to include the phone number
                        var redirectURL = '/initiatepush?amount=' + totalPrice + '&tickets=' + ticketNames.join(',') + '&id=' + ticketId + '&phone=' + phoneNumber;

                        // Redirect to the MPESA payment initiation route
                        window.location.href = redirectURL;
                    }
                </script>
