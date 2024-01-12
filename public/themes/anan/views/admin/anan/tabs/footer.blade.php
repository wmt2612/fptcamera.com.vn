<div class="row">
    <div class="col-lg-12">
        <h3 class="tab-content-title">Section 1</h3>
    </div>
    @for ($i = 1; $i < 4; $i++)
    <div class="col-lg-4">
        @php
            $image = 'footerSectionOne'.$i;
        @endphp
        @include('media::admin.image_picker.single', [
            'title' => trans('anan::anan.form.image'),
            'inputName' => 'anan_footer_section_one_image_'.$i,
            'file' => $$image,
        ])
        {{ Form::text('anan_footer_section_one_title_'.$i, null, $errors, $settings, ['placeholder' => trans('anan::attributes.title'), 'labelCol' => 0]) }}
        {{ Form::text('anan_footer_section_one_subtitle_'.$i, null, $errors, $settings, ['placeholder' => trans('anan::attributes.subtitle'), 'labelCol' => 0]) }}
    </div>
    @endfor
</div>

<div class="row">
    <div class="col-lg-12">
        <h3 class="tab-content-title">Section 2</h3>
    </div>
    @for ($i = 1; $i < 6; $i++)
    <div class="col-lg-{{ $i == 5 ? '12' : '6'  }}">
        {{ Form::wysiwyg('anan_footer_section_two_'.$i, null, $errors, $settings, ['placeholder' => trans('anan::attributes.content'), 'labelCol' => 0]) }}
    </div>
    @endfor
</div>


<div class="row">
    <div class="col-lg-12">
        <h3 class="tab-content-title">Section 3</h3>
    </div>
    @for ($i = 1; $i < 5; $i++)
    <div class="col-lg-6">
        {{ Form::wysiwyg('anan_footer_section_three_'.$i, null, $errors, $settings, ['placeholder' => trans('anan::attributes.content'), 'labelCol' => 0]) }}
    </div>
    @endfor
</div>

<div class="row">
    <div class="col-lg-12">
        <h3 class="tab-content-title">Section 4</h3>
    </div>
    <div class="col-lg-12">
        {{ Form::textarea('anan_footer_section_four_giayphep', null, $errors, $settings, ['labelCol' => 0, 'placeholder' => 'Mã số doanh nghiệp...']) }}
    </div>
</div>
