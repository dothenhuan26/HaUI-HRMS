<div class="chat-footer">
    <form action="" class="form-message" method="GET">
        <div class="message-bar">
            <div class="message-inner">
                <a
                    class="link attach-icon"
                    href="#"
                    data-toggle="modal"
                    data-target="#drag_files"><img
                        src="{{asset("assets/img/attachment.png")}}"
                        alt=""></a>
                <div class="message-area">
                    <div class="input-group">
                        <input
                            type="text"
                            id="message"
                            class="form-control"
                            placeholder="Type message...">
                        <span class="input-group-append">
                            <button
                                id="send"
                                class="btn btn-custom"
                                type="button"><i class="fa fa-send"></i>
                            </button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@push("js")
    <script type="module">

        const apiPath = "{{parse_url(route('chat.public.send'))['path']}}";

        const messageElement = $('#message');
        const sendElement = $('#send');

        sendElement.on('click', function(e) {
            e.preventDefault();
            window.axios.post(apiPath, {
                message: messageElement.val(),
            });
            messageElement.val('');
        });
    </script>
@endpush
