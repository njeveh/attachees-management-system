<div>
    <div class="wrapper">
        <!-- Sidebar  -->
        <x-attachee-side-nav-links />
        <!-- Page Content  -->
        <div id="content">
            <x-navbar />
            <main id="main-content">
                <div class="page-title">
                    <h2>Notifications</h2>
                </div>
                {{-- <button class="btn btn-primary btns-hidden">what's up?</button> --}}
                <div class="{{ $action_buttons_class }}">
                    <button class="{{ $mark_all_button_class }}" wire:click="markAll()">mark all</button>
                    <button class="{{ $unmark_all_button_class }}" wire:click="unMarkAll()">unmark all</button>
                    <button class="{{ $mark_as_read_button_class }}" wire:click="markAsRead()">mark as read</button>
                    <button class="{{ $mark_as_unread_button_class }}" wire:click="markAsUnRead()">mark as
                        unread</button>
                    <button class="btn btn-danger m-2" wire:click="delete()">delete</button>
                </div>
                <section>
                    <div class="container mt-3 pb-5">
                        <div class="items-list mb-3">
                            @if ($notifications->count())
                                @if ($unread_notifications->count())
                                    @foreach ($unread_notifications as $unread_notification)
                                        <div class="list-item  shadow p-3 mb-2 bg-body rounded">
                                            <div class="d-flex align-items-center justify-content-start">
                                                <div class="d-flex flex-row align-items-center justify-content-start">
                                                    <input
                                                        wire:model="select_notifications.{{ $unread_notification->id }}"
                                                        class="form-check-input me-3" type="checkbox"
                                                        value="{{ $unread_notification->id }}"
                                                        id="notification-{{ $unread_notification->id }}">
                                                    <div class="organization-logo">
                                                        <img src="/assets/static/logo.png" alt="logo">
                                                    </div>
                                                </div>
                                                <a href="{{ route('attachee.notification', $unread_notification->id) }}"
                                                    wire:onclick="markAsRead($notification->id)"
                                                    class="flex-grow-1 d-flex justify-content-between">
                                                    <div class="d-flex flex-column">
                                                        <h5>{{ $unread_notification->data['from'] }}</h5>

                                                        <h6>{{ $unread_notification->data['title'] }}</h6>
                                                    </div>
                                                    <div class="ms-auto">
                                                        {{ $unread_notification->created_at }}
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                @if ($read_notifications->count())
                                    @foreach ($read_notifications as $read_notification)
                                        <div class="list-item  shadow p-3 mb-2 read-notification rounded">
                                            <div class="d-flex align-items-center justify-content-start">
                                                <div class="d-flex flex-row align-items-center justify-content-start">
                                                    <input
                                                        wire:model="select_notifications.{{ $read_notification->id }}"
                                                        class="form-check-input me-3" type="checkbox"
                                                        value="{{ $read_notification->id }}"
                                                        id="notification-{{ $read_notification->id }}">
                                                    <div class="organization-logo">
                                                        <img src="/assets/static/logo.png" alt="logo">
                                                    </div>
                                                </div>
                                                <a href="{{ route('attachee.notification', $read_notification->id) }}"
                                                    wire:onclick="markAsRead($notification->id)"
                                                    class="flex-grow-1 d-flex justify-content-between">
                                                    <div class="d-flex flex-column">
                                                        <h5>{{ $read_notification->data['from'] }}</h5>

                                                        <h6>{{ $read_notification->data['title'] }}</h6>
                                                    </div>
                                                    <div class="ms-auto">
                                                        {{ $read_notification->created_at }}
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            @else
                                <div
                                    class="card info-card d-flex flex-column justify-content-center align-items-center">
                                    <div class="m-2">
                                        You currently don't have any notifications.
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </section>
            </main>
            <x-footer />
        </div>

    </div>
</div>
