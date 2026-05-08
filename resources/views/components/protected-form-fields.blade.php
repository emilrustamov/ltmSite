@props(['idPrefix' => 'form'])

<input type="text"
       name="website"
       id="website-{{ $idPrefix }}"
       tabindex="-1"
       autocomplete="off"
       style="position: absolute; left: -9999px; opacity: 0; pointer-events: none;"
       aria-hidden="true">

<input type="hidden" name="recaptcha_token" id="recaptcha_token_{{ $idPrefix }}" data-recaptcha-token>
<input type="hidden" name="form_started_at" id="form_started_at_{{ $idPrefix }}" data-form-started-at>
