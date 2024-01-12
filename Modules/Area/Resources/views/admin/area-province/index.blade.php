@extends('admin::layout')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css" integrity="sha512-8D+M+7Y6jVsEa7RD6Kv/Z7EImSpNpQllgaEIQAtqHcI0H6F4iZknRj0Nx1DCdB+TwBaS+702BGWYC0Ze2hpExQ==" crossorigin="anonymous" />
@component('admin::components.page.header')
@slot('title', trans('area::areas.areas'))

<li class="active">{{ trans('area::areas.areas') }}</li>
@endcomponent

@component('admin::components.page.index_table')
<table class="table">
    <thead>
        <tr class="row">
            <td>ID</td>
            <td>Khu vực</td>
            @foreach($areas as $a)
            <td>{{ $a->name }}</td>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($provinces as $p)

        <tr class="row">
            <td>{{ $p->id }}</td>
            <td>{{ $p->name }}</td>
            @foreach($areas as $a)
            <td style="padding-left:5%"><input type="checkbox" 
                @foreach($getAreaProvince as $g)  
                    @if($g->area_id == $a->id && $g->province_id == $p->id) 
                    checked 
                    @endif 
                @endforeach
                name="select-area" value="{{ $a->id }}" data-province="{{ $p->id }}" style="top: .8rem;width: 1.25rem;height: 1.25rem;" class="select-area form-control"></td>
            @endforeach
        </tr>
        @endforeach
    </tbody>
</table>
@endcomponent
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    $(document).ready(function($) {
        $('.select-area').change(function() {
            const thiss = $(this);
            const getArea = $(this).val();
            const getProvince = $(this).attr('data-province');
            const url = "{{ route('admin.areas.area_province.checked') }}";
            if (this.checked) {
                axios.post(url,{
                    // params: {
                        area_id: getArea,
                        province_id: getProvince,
                        checked: true,
                    // }
                })
                .then(function(response){
                    if (response.data.type == "error") {
                        $.toast({
                        heading: 'Error',
                        text: 'Có lỗi xảy ra!',
                        icon: 'error',
                        hideAfter: 2000,
                        position: 'top-right',
                        })
                    } else {
                        $.toast({
                        heading: 'Success',
                        text: 'Thao tác thành công',
                        icon: 'success',
                        hideAfter: 2000,
                        position: 'top-right',
                        })
                    }
                })
                .catch(function(error){
                    console.log(error);
                })
            }
            if (!this.checked) {
                axios.post(url,{
                    // params: {
                        getArea: getArea,
                        getProvince: getProvince,
                        checked: false,
                    // }
                })
                .then(function(response){
                    if (response.data.type == "error") {
                        $.toast({
                        heading: 'Error',
                        text: 'Có lỗi xảy ra!',
                        icon: 'error',
                        hideAfter: 2000,
                        position: 'top-right',
                        })
                    } else {
                        $.toast({
                        heading: 'Success',
                        text: 'Đã bỏ tích thành công',
                        icon: 'success',
                        hideAfter: 2000,
                        position: 'top-right',
                        })
                    }
                })
                .catch(function(error){
                    console.log(error);
                })
            }
        });
    });
</script>