<?php

namespace Modules\Admin\Ui;

use Illuminate\Contracts\Support\Responsable;

class AdminTable implements Responsable
{
    /**
     * Raw columns that will not be escaped.
     *
     * @var array
     */
    protected $rawColumns = [];

    /**
     * Raw columns that will not be escaped.
     *
     * @var array
     */
    protected $defaultRawColumns = [
        'checkbox', 'thumbnail', 'status', 'created',
    ];

    /**
     * Source of the table.
     *
     * @var \Illuminate\Database\Eloquent\Builder
     */
    protected $source;

    /**
     * Create a new table instance.
     *
     * @param \Illuminate\Database\Eloquent\Builder $source
     * @return void
     */
    public function __construct($source = null)
    {
        $this->source = $source;
    }

    /**
     * Make table response for the resource.
     *
     * @param mixed $source
     * @return \Illuminate\Http\JsonResponse
     */
    public function make()
    {
        return $this->newTable();
    }

    /**
     * Create a new datatable instance;
     *
     * @param mixed $source
     * @return \Yajra\DataTables\DataTables
     */
    public function newTable()
    {
        return datatables($this->source)
            ->addColumn('checkbox', function ($entity) {
                return view('admin::partials.table.checkbox', compact('entity'));
            })
            ->editColumn('status', function ($entity) {
                return $entity->is_active
                    ? '<span class="dot green"></span>'
                    : '<span class="dot red"></span>';
            })
            // ->addColumn('groups',  function ($entity) {
            //     return $entity->groups->map(function ($group) {
            //         return $group->name;
            //     })->implode('<br>');
            // })
            // ->filterColumn('groups.name',function ($query,$keyword){
            //     $query->whereHas('groups',function ($q) use ($keyword){
            //         $q->whereHas('translations', function($q2) use ($keyword){
            //             $q2->where('name', 'LIKE', "%$keyword%");
            //         });
            //     });
            // })
            ->editColumn('created', function ($entity) {
                return view('admin::partials.table.date')->with('date', $entity->created_at);
            })
            ->rawColumns(array_merge($this->defaultRawColumns, $this->rawColumns))
            ->removeColumn('translations');
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function toResponse($request)
    {
        return $this->make()->toJson();
    }
}
