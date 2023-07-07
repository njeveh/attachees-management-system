@props(['alert_class'])
<div class="card shadow-lg m-auto p-5 bg-white rounded col-md-5 col-md-offset-3">
    <div class="card-header">
        {{ $header }}
    </div>
    <div class="card-body">
        <div class="alert {{ $alert_class }}">
            {{ $message }}
        </div>
    </div>
    <div class="p-2 feedback-card-footer-link">
        <a class="" href={{ $link }}>{{ $link_text }}</a>
    </div>
</div>
