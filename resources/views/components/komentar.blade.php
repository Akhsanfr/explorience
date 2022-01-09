<div class="flex items-center rounded-xl border p-2 space-x-2 ml-{{ $margin }}">
    <div class="rounded-full h-10 w-10 overflow-hidden">
        <img src="{{ $avatar }}" alt="avatar">
    </div>
    <div class="flex flex-col">
        <strong class="text-lg">{{ $user }}</strong>
        <p>{{ $isi }}</p>
        <div class="flex space-x-4 text-xs">
            <span>{{ $time }}</span>
            <span>{{ $like }} like</span>
            <span>Reply</span>
        </div>
    </div>
</div>
