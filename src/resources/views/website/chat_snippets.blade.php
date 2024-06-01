@php
  $chat_snippets = null;
  $chats = \App\Models\PublicChat::first();
  if($chats) {
    $chat_snippets = $chats->chat_script;
  }
@endphp


<div>
  {!!$chat_snippets!!}
</div>