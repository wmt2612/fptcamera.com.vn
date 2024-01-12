@extends('admin::layout')
@section('css-add')
@endsection
@component('admin::components.page.header')
    @slot('title', trans('service::services.price_list'))

    <li class="active">{{ trans('service::services.price_list') }}</li>
@endcomponent


@component('admin::components.page.index_table')
    <form role="form" id="form-price-list">
        <div class="col-md-10">
            <div class="col-md-4">
                <label for="">Khu vực: </label>
                <select name="provinces" id="provinces" class="form-control">
                    <option value="0" selected hidden>-- Chọn khu vực --</option>
                    @foreach ($provinces as $province)
                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="" class="">Chính sách: </label>
                <select name="areas" id="areas" class="form-control">
                    <option value="0" selected hidden>-- Chọn chính sách --</option>
                </select>
                <span class="text-danger">{{ $errors->first('areas') }}</span>
            </div>
            
            <div class="col-md-4">
                <label for="" class="">Dịch vụ: </label>
                <select name="cate_services" id="cate_services" class="form-control" >
                    <option value="">-- Chọn dịch vụ --</option>
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                    @endforeach
                </select>
                <span class="text-danger">{{ $errors->first('cate_services') }}</span>
            </div>
        </div>
        <div class="col-md-2 mt-3" style="text-align: center;padding: 2.3rem 0rem;">
            <button class="btn btn-primary d-flex justify-content-center">Search</button>
        </div>
        <div>
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th>Tên gói</th>
                        <th>Giá gốc</th>
                        <th>Type</th>
                        <th>Giảm giá</th>
                        <th>Giá</th>
                        <th>Tác vụ</th>
                    </tr>
                </thead>
                <tbody id="list">
                    
                </tbody>
            </table>
        </div>
    </form>
@endcomponent

@section('scripts-add')
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    $("#provinces").change(function(){
        const id_province = $(this).val();
        const url = "{{ route('admin.price_list.getProvinceArea') }}";
        axios
            .get(url, {params: {id_province: id_province}})
            .then(function(response) {
                var list_area = ``;
                var data = response.data;
                for (let i = 0; i < data.length; i++) {
                    const getArea = data[i];
                    list_area += `
                    <option value="" selected hidden>-- Chọn chính sách --</option>
                    <option value="`+getArea.id+`">`+getArea.name+`</option>
                    `;
                }
                $('#areas').html(list_area);
            })
    })


    $("#form-price-list").submit(function(e){
        e.preventDefault();
        
        const url = "{{ route('admin.price_list.search') }}";
        const data = new FormData($('form#form-price-list')[0]);
        axios
            .get(url,  {params: {
                
                cate_services: data.get('cate_services'),
                provinces: data.get('provinces'),
            }})
            .then(function(response){
                var list = ``;
                var total = 0;
                var data = response.data.data;
                for (var i = 0; i < data.length; i++) {
                    const getData = data[i];
                    list += `
                    <tr class="tr_`+getData.id+`">
                        <td>`+ getData.name +`</td>
                        <td class="price">` +getData.price.formatted+ `</td>
                        <td>
                            <select name="type" class="form-control">
                                <option value="percent">%</option>
                                <option value="minus" selected>-</option>
                            <select/>
                        </td>
                        <td>
                            <input data-total="`+getData.id+`" data-id="`+getData.id+`" data-price="`+getData.price.amount+`" data-type="minus" type="number" id="number_discount" name="price_area_discount" class="form-control col-md-3 number_discount"/>
                        </td>
                        <td class="total_`+getData.id+`"></td>
                        <td ><button class="btn btn-success" >Save</button></td>
                    </tr>`;
                }
                $('#list').html(list);
            })
            .catch(function(error){
                console.log(error);
            })
        });

        

        $("#myTable").on('click','button',function(e){
            var type = $(this).parent().parent().find('select').val();
            var price =  $(this).parent().parent().find('.number_discount').data('price');
            var price_sale = $(this).parent().parent().find('.number_discount').val();
            var total_id = $(this).parent().parent().find('.number_discount').data('total');
            var total = 0;
            if (type == "minus") {
                total = price - price_sale;
            } else {
                total = price * price_sale/100;
            }
            $('.total_'+ total_id).html(total);
        });

        $('#myTable').on('click','button', function(e){
            e.preventDefault();
            var price =  $(this).parent().parent().find('.number_discount').data('price');
            var price_sale = $(this).parent().parent().find('.number_discount').val();
            var type = $(this).parent().parent().find('select').val();
            var service_id = $(this).parent().parent().find('.number_discount').data('id');
            var area_id = $('#areas').val();
            var provice_id = $('#provinces').val();
            var url = "{{ route('admin.price_list.update') }}";
        axios
            .post(url, {
                price_area: price,
                type_area: type,
                service_id: service_id,
                area_id: area_id,
                price_sale: price_sale,
                provice_id: provice_id
            })
            .then(function(response){
                
            })
    });
</script>
@endsection