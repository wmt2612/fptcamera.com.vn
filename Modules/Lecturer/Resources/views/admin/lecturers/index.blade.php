@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('lecturer::lecturers.lecturers'))

    <li class="active">{{ trans('lecturer::lecturers.lecturers') }}</li>
@endcomponent

@component('admin::components.page.index_table')
    @slot('buttons', ['create'])
    @slot('resource', 'lecturers')
    @slot('name', trans('lecturer::lecturers.lecturer'))

    @component('admin::components.table')
        @slot('thead')
            <tr>
                @include('admin::partials.table.select_all')
                <th>{{ trans('admin::admin.table.id') }}</th>
                <th>{{ trans('post::posts.table.logo') }}</th>
                <th>{{ trans('post::posts.table.name') }}</th>
                <th data-sort>{{ trans('admin::admin.table.created') }}</th>
                <th>Action</th>
            </tr>
        @endslot
    @endcomponent
@endcomponent

@push('scripts')
    <script>
        var data = new DataTable('#lecturers-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                { data: 'id', width: '5%' },
                { data: 'logo', orderable: false, searchable: false, width: '10%' },
                { data: 'name', name: 'name', orderable: false, defaultContent: '' },
                { data: 'created', name: 'created_at' },
                { data: 'slug', orderable: false, searchable: false,  render: function (data, type, row)
                    {
                        return `<a href=${ route('lecturer.single', [data]) } target="_black" class="view-btn">View</a>`;
                    }
                },
            ],
        });
        data.redirectToRowPage = function(e){
            $("#lecturers-table td").on('click', function(e) {
                if ($(e.target).hasClass('view-btn')){
                    $(e.target).click();
                    return false;
                }else{
                    window.open(
                        $(e.currentTarget).parent().data('href'),
                        e.ctrlKey ? '_blank' : '_self'
                    );
                }
            });
        };
    </script>
    {{-- <script>
        $(document).ready(function(){
            $('#lecturers-table td').click(function(e){
                e.preventDefault();
                console.log('a');
            });
        });
    </script> --}}
@endpush
