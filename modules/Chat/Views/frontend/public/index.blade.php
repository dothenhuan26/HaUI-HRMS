@extends("Layout::frontend.chat.app")

@section("content")

    <!-- Chat Main Row -->
    <div class="chat-main-row">

        <!-- Chat Main Wrapper -->
        <div class="chat-main-wrapper">

            <!-- Chats View -->
            <div class="col-lg-9 message-view task-view">
                <div class="chat-window">

                    @include("Chat::frontend.public.parts.header")

                    @include("Chat::frontend.public.parts.content")

                    @include("Chat::frontend.public.parts.footer")
                </div>
            </div>
            <!-- /Chats View -->

            @include("Chat::frontend.public.parts.right-sidebar")
        </div>
        <!-- /Chat Main Wrapper -->
    </div>
    <!-- /Chat Main Row -->

    @include("Chat::frontend.parts.temp")
@endsection

{{--@push("js")--}}

{{--    <script type="module">--}}

{{--        const chatsElement = $('.chats');--}}

{{--        Echo.join('public-chat').here((users) => {--}}
{{--            console.log(users);--}}
{{--        }).joining(user => {--}}
{{--            console.log(user);--}}
{{--        }).leaving(user => {--}}
{{--            console.log(user);--}}
{{--        }).listen('PublicMessageSent', e => {--}}
{{--            console.log(e);--}}
{{--        });--}}

{{--    </script>--}}

{{--    <script type="module">--}}

{{--    </script>--}}

{{--@endpush--}}
