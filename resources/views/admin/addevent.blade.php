<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Upload event</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    />
    <link rel="stylesheet" href="admin/assets/css/tailwind.output.css" />
    <script
        src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
        defer
    ></script>
    <script src="admin/assets/js/init-alpine.js"></script>
</head>
<body>
<div
    class="flex h-screen bg-gray-50 dark:bg-gray-900"
    :class="{ 'overflow-hidden': isSideMenuOpen}"
>
    @include('admin.sidebar')
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container grid px-6 mx-auto">
            <!-- CTA -->
            <a
                class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
                href="/"
            >
                <div class="flex items-center">
                    <svg
                        class="w-5 h-5 mr-2"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                    >
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                        ></path>
                    </svg>
                    <span>Add event </span>
                </div>
                <span>View more &RightArrow;</span>
            </a>
            <form action="{{url('postevent')}}" method="post" class="form" enctype="multipart/form-data">
                @csrf
                <div class="flex-column">
                    <label>Event Name</label>
                </div>
                <div class="inputForm">
                    <input type="text" name="eventname" class="input" placeholder="Enter Event Name">
                </div>

                <div class="flex-column">
                    <label>Event Capacity</label>
                </div>
                <div class="inputForm">
                    <input type="text" name="eventcapacity" class="input" placeholder="Enter Event Capacity">
                </div>

                <div class="flex-column">
                    <label>Event Location</label>
                </div>
                <div class="inputForm">
                    <input type="text" name="eventlocation" class="input" placeholder="Enter Event Location">
                </div>

                <div class="flex-column">
                    <label>Event Date</label>
                </div>
                <div class="inputForm">
                    <input type="date" name="eventdate" class="input" placeholder="Enter Event Date">
                </div>

                <div class="flex-column">
                    <label>Event Opening Time</label>
                </div>
                <div class="inputForm">
                    <input type="time" name="event_openingtime" class="input" placeholder="Enter Event Opening Time">
                </div>

                <div class="flex-column">
                    <label>Event Closing Time</label>
                </div>
                <div class="inputForm">
                    <input type="time" name="event_closingtime" class="input" placeholder="Enter Event Closing Time">
                </div>

                <div class="flex-column">
                    <label>Partners</label>
                </div>
                <div class="inputForm">
                    <input type="text" name="alias" class="input" placeholder="Enter Partners">
                </div>

                <div class="flex-column">
                    <label>Single Ticket Price</label>
                </div>
                <div class="inputForm">
                    <input type="text" name="single_ticket_price" class="input" placeholder="Enter Single Ticket Price">
                </div>

                <div class="flex-column">
                    <label>Partners Tickets Price</label>
                </div>
                <div class="inputForm">
                    <input type="text" name="partners_tickets_price" class="input" placeholder="Enter Partners Tickets Price">
                </div>

                <div class="flex-column">
                    <label>10 Group Tickets Price</label>
                </div>
                <div class="inputForm">
                    <input type="text" name="group_tickets_price" class="input" placeholder="Enter 10 Group Tickets Price">
                </div>

                <button type="submit">
                    SUBMIT
                    <div class="arrow-wrapper">
                        <div class="arrow"></div>

                    </div>
                </button>


            </form>

        </div>
        </div>
    </main>
</div>
</div>
</body>
</html>
<style>
    .form {
        display: flex;
        flex-direction: column;
        gap: 10px;
        background-color: #ffffff;
        padding: 30px;
        width: auto;
        border-radius: 20px;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    ::placeholder {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    .form button {
        align-self: flex-end;
    }

    .flex-column > label {
        color: #151717;
        font-weight: 600;
    }

    .inputForm {
        border: 1.5px solid #ecedec;
        border-radius: 10px;
        height: 50px;
        display: flex;
        align-items: center;
        padding-left: 10px;
        transition: 0.2s ease-in-out;
    }

    .input {
        margin-left: 10px;
        border-radius: 10px;
        border: none;
        width: 85%;
        height: 100%;
    }

    .input:focus {
        outline: none;
    }

    .inputForm:focus-within {
        border: 1.5px solid #2d79f3;
    }

    .flex-row {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 10px;
        justify-content: space-between;
    }

    .flex-row > div > label {
        font-size: 14px;
        color: black;
        font-weight: 400;
    }

    .span {
        font-size: 14px;
        margin-left: 5px;
        color: #2d79f3;
        font-weight: 500;
        cursor: pointer;
    }

    .button-submit {
        margin: 20px 0 10px 0;
        background-color: #151717;
        border: none;
        color: white;
        font-size: 15px;
        font-weight: 500;
        border-radius: 10px;
        height: 50px;
        width: 100%;
        cursor: pointer;
    }

    .button-submit:hover {
        background-color: #252727;
    }

    .p {
        text-align: center;
        color: black;
        font-size: 14px;
        margin: 5px 0;
    }

    .btn {
        margin-top: 10px;
        width: 100%;
        height: 50px;
        border-radius: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-weight: 500;
        gap: 10px;
        border: 1px solid #ededef;
        background-color: white;
        cursor: pointer;
        transition: 0.2s ease-in-out;
    }

    .btn:hover {
        border: 1px solid #2d79f3;
    ;
    }


    button {
        --primary-color: #645bff;
        --secondary-color: #fff;
        --hover-color: #111;
        --arrow-width: 10px;
        --arrow-stroke: 2px;
        box-sizing: border-box;
        border: 0;
        border-radius: 20px;
        color: var(--secondary-color);
        padding: 1em 1.8em;
        background: var(--primary-color);
        display: flex;
        transition: 0.2s background;
        align-items: center;
        gap: 0.6em;
        font-weight: bold;
    }

    button .arrow-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    button .arrow {
        margin-top: 1px;
        width: var(--arrow-width);
        background: var(--primary-color);
        height: var(--arrow-stroke);
        position: relative;
        transition: 0.2s;
    }

    button .arrow::before {
        content: "";
        box-sizing: border-box;
        position: absolute;
        border: solid var(--secondary-color);
        border-width: 0 var(--arrow-stroke) var(--arrow-stroke) 0;
        display: inline-block;
        top: -3px;
        right: 3px;
        transition: 0.2s;
        padding: 3px;
        transform: rotate(-45deg);
    }

    button:hover {
        background-color: var(--hover-color);
    }

    button:hover .arrow {
        background: var(--secondary-color);
    }

    button:hover .arrow:before {
        right: 0;
    }
</style>


