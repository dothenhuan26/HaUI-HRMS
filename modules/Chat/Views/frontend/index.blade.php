@extends("Layout::frontend.app")

@section("content")

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Chat') }}</div>
                <div class="card-body">
                    <div class="row p-2">
                        <div class="col-10">
                            <div class="row border rounded-lg p-3">
                                <ul
                                    id="messages"
                                    class="list-unstyled overflow-auto"
                                    style="min-height: 45vh">
                                </ul>
                            </div>
                            <form
                                action=""
                                class="row py-3">
                                <div class="col-10">
                                    <input
                                        type="text"
                                        id="message"
                                        name="message"
                                        class="form-control">
                                </div>
                                <div class="col-2">
                                    <button
                                        type="submit"
                                        class="w-100 btn btn-primary"
                                        id="send">Gửi
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="col-2">
                            <p><strong>Người dùng Online</strong></p>
                            <ul
                                id="users"
                                class="list-unstyled overflow-auto text-info"
                                style="min-height: 45vh">
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push("js")
    <script type="module">
        const usersElement = document.getElementById('users');
        const messagesElement = document.getElementById('messages');

        Echo.join('public-chat').here((users) => {
            users.forEach((user, index) => {
                const element = document.createElement('li');
                element.setAttribute('id', user.id);
                element.innerText = user.name;
                usersElement.appendChild(element);
            });
        }).joining(user => {
            const element = document.createElement('li');
            element.setAttribute('id', user.id);
            element.innerText = user.name;
            usersElement.appendChild(element);

        }).leaving(user => {
            const element = document.getElementById(user.id);
            element.parentNode.removeChild(element);

        }).listen('PublicMessageSent', e => {
            const element = document.createElement('li');
            element.innerText = e.user.name + ': ' + e.message;
            messagesElement.appendChild(element);
        });
    </script>

    <script type="module">
        const messageElement = document.getElementById('message');
        const sendElement = document.getElementById('send');
        sendElement.addEventListener('click', function(e) {
            e.preventDefault();
            window.axios.post('message', {
                message: messageElement.value,
            });
            messageElement.value = '';
        });
    </script>
@endpush


