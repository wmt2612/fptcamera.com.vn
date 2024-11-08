<?php

namespace Modules\User\Admin;

use Illuminate\Support\Facades\Cache;
use Modules\Admin\Ui\Tab;
use Modules\Admin\Ui\Tabs;
use Modules\Media\Entities\File;
use Modules\User\Entities\Role;
use Modules\User\Repositories\Permission;

class UserTabs extends Tabs
{
    public function make()
    {
        $this->group('user_information', trans('user::users.tabs.group.user_information'))
            ->active()
            ->add($this->account())
            ->add($this->info())
            ->add($this->permissions())
            ->add($this->newPassword());
    }

    private function account()
    {
        return tap(new Tab('account', trans('user::users.tabs.account')), function (Tab $tab) {
            $tab->active();
            $tab->weight(10);

            $tab->fields([
                'first_name',
                'last_name',
                'email',
                'activated',
                'roles',
            ]);

            $tab->view('user::admin.users.tabs.account', [
                'roles' => Role::list(),
            ]);
        });
    }

    private function info()
    {
        return tap(new Tab('info', trans('user::users.tabs.info')), function (Tab $tab) {
            $tab->weight(12);

            $tab->fields([
                'description',
            ]);

            $tab->view('user::admin.users.tabs.info', [
            ]);
        });
    }

    private function permissions()
    {
        return tap(new Tab('permissions', trans('user::users.tabs.permissions')), function (Tab $tab) {
            $tab->weight(20);

            $tab->view(function ($data) {
                return view('user::admin.partials.permissions.index', [
                    'entity' => $data['user'],
                    'permissions' => Permission::all(),
                ]);
            });
        });
    }

    private function newPassword()
    {
        if (! request()->routeIs('admin.users.edit')) {
            return;
        }

        return tap(new Tab('new_password', trans('user::users.tabs.new_password')), function (Tab $tab) {
            $tab->weight(30);
            $tab->fields(['password', 'password_confirmation']);
            $tab->view('user::admin.users.tabs.new_password');
        });
    }

    private function getMedia($fileId)
    {
        return Cache::rememberForever(md5("files.{$fileId}"), function () use ($fileId) {
            return File::findOrNew($fileId);
        });
    }
}
