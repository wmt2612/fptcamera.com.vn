{{ Form::text('contact_phone', 'Phone Number', $errors, $settings) }}
{{ Form::text('contact_zalo', 'Zalo', $errors, $settings) }}
{{ Form::text('hotline_recipient_emails', 'Notification Emails', $errors, $settings) }}
<div class="media-picker-divider"></div>
@for($i = 1; $i <= 4; $i++)
    {{ Form::text("contact_hotline_{$i}_name", "{$i}. Hotline Name", $errors, $settings) }}
    {{ Form::text("contact_hotline_{$i}_number", "Hotline Number", $errors, $settings) }}
    <div class="media-picker-divider"></div>
@endfor
