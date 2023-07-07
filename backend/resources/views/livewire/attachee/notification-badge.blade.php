<span wire:poll>
    @if ($unread_notifications_count)
        <span class="badge rounded-pill bg-danger ">{{ $unread_notifications_count }}</span>
    @else
        <span></span>
    @endif
</span>
