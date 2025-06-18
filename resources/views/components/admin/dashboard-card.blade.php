@props(['icon', 'title', 'text', 'link', 'buttonText'])

<div class="card card-custom">
    <i class="{{ $icon }}"></i>
    <h5 class="card-title">{{ $title }}</h5>
    <p class="card-text">{{ $text }}</p>
    <a href="{{ $link }}" class="btn btn-custom">{{ $buttonText }}</a>
</div>