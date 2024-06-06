<?php

namespace Modules\User\Admin;

use Illuminate\Http\Request;
use Modules\Core\Admin\AdminController;
use Modules\User\Helpers\PermissionHelper;
use Modules\User\Repositories\Contracts\RoleRepositoryInterface;

class RoleController extends AdminController
{
    protected $roleRepository;


    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function index(Request $request)
    {
        $this->checkPermission("role_manage");
        $query = $this->roleRepository->query();
        $data = [
            "rows"        => $query->orderBy("updated_at", "desc")->get(),
            "page_title"  => __("Role"),
            "breadcrumbs" => [
                [
                    "name" => __("Role"),
                    "url"  => route("user.admin.role.index"),
                ],
                [
                    "name"  => __("All"),
                    "class" => "active"
                ],
            ]
        ];

        return view("User::admin.role.index", $data);
    }

    public function permissionMatrix(Request $request)
    {
        $this->checkPermission("role_manage");
        $this->checkPermission("permission_view");

        $permissions = PermissionHelper::all();

        $permissionsGroup = [
            'others' => [],
        ];

        if (!empty($permissions)) {
            foreach ($permissions as $permission) {
                $pos = strpos($permission, '_');
                if ($pos == false) {
                    $permissionsGroup['others'][] = $permission;
                    continue;
                }

                $groupName = substr($permission, 0, $pos);
                if (!isset($permissionsGroup[$groupName]))
                    $permissionsGroup[$groupName] = [];
                $permissionsGroup[$groupName][] = $permission;
            }
        }

        if (empty($permissionsGroup['others'])) unset($permissionsGroup['others']);

        $roles = $this->roleRepository->all();

        $selectedIds = [];

        if (!empty($roles)) {
            foreach ($roles as $role) {
                $selectedIds[$role->id] = $role->permissions->pluck('permission')->all();
            }
        }
        $data = [
            "permissions"      => $permissions,
            "permissionsGroup" => $permissionsGroup,
            "roles"            => $roles,
            "selectedIds"      => $selectedIds,
            "page_title"       => __("Permission Matrix"),
            "breadcrumbs"      => [
                [
                    "name" => __("Role"),
                    "url"  => route("user.admin.role.index"),
                ],
                [
                    "name"  => __("Permission Matrix"),
                    "class" => "active"
                ],
            ]
        ];

        return view("User::admin.role.permission-matrix", $data);
    }

    public function updatePermissionMatrix(Request $request)
    {
        $this->checkPermission("role_manage");
        $matrix = $request->input('matrix');
        $matrix = is_array($matrix) ? $matrix : [];
        $this->roleRepository->syncPermissions($matrix);
        return back()->with('success', __("Permission Matrix Updated!"));
    }

    public function create()
    {

    }

    public function update(Request $request, $id = null)
    {

    }

    public function store(Request $request, $id = null)
    {

    }

    public function delete($id)
    {

    }

}
