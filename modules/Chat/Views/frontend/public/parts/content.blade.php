
<div class="chat-contents">
    <div class="chat-content-wrap">
        <div class="chat-wrap-inner">
            <div class="chat-box">
                <div class="chats">

                </div>
            </div>
        </div>
    </div>
</div>


@push("js")
    <script>

        function createChatElement(conversation) {
            const message = conversation.message;
            const user = conversation.user;

            var isAuth = false;

            if (user.id == {{Auth::id()}}) isAuth = true;

            const classList = 'chat chat-' + (isAuth ? 'right' : 'left');

            const chatElement = jQuery('<div>', {
                id: '',
                class: classList,
                title: '',
            });

            if (!isAuth) {
                const avatarElement = `<div class="chat-avatar">
                                        <a
                                            href="#"
                                            class="avatar">
                                            <img
                                                alt="avatar"
                                                src="${user.avatar}">
                                        </a>
                                    </div>`;
                chatElement.append(avatarElement);
            }
            const chatBodyElement = `<div class="chat-body">
                                    <div class="chat-bubble">
                                        <div class="chat-content">
                                            <p>${message}</p>
                                        </div>
                                        <div class="chat-action-btns">
                                            <ul>
                                                <li><a
                                                        href="#"
                                                        class="share-msg"
                                                        title="Share"><i class="fa fa-share-alt"></i></a></li>
                                                <li><a
                                                        href="#"
                                                        class="edit-msg"><i class="fa fa-pencil"></i></a></li>
                                                <li><a
                                                        href="#"
                                                        class="del-msg"><i class="fa fa-trash-o"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>`;

            chatElement.append(chatBodyElement);
            return chatElement;
        }

        function createUserElement(user) {
            const userElement = jQuery('<li>', {
                id: user.id,
                class: '',
                title: '',
            });

            const userLinkElement = `<a href="">
						<span class="chat-avatar-sm user-img">
							<img
                                class="rounded-circle"
                                alt=""
                                src="${user.avatar}">
                            <span class="status online"></span>
						</span>
                        <span class="chat-user">${user.name}</span>
                    </a>`;

            userElement.append(userLinkElement);
            return userElement;
        }

    </script>

    <script type="module">
        const chatsElement = $('.chats');
        const directChatsElement = $('.direct-chats');

        const apiPath = "{{parse_url(route('chat.public.conversations'))['path']}}";

        Echo.join('public-chat').here((users) => {
            window.axios.get(apiPath).then(function(response) {
                const data = response.data;
                data.forEach(e => {
                    chatsElement.append(createChatElement(e));
                });
            });

            users.forEach(e => {
                directChatsElement.append(createUserElement(e));
            });
        }).joining(user => {
            directChatsElement.append(createUserElement(user));
        }).leaving(user => {
            directChatsElement.find(`#${user.id}`).remove();
        }).listen('PublicMessageSent', e => {
            chatsElement.append(createChatElement(e));
        });
    </script>
@endpush
