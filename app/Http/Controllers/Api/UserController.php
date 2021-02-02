<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Mappers\UserMapper;
use App\Models\User;
use App\Services\Mapper\Facades\Mapper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search_term = strtolower($request->input('search'));
        $limit = $request->has('limit') ? $request->input('limit') : 10;
        $sort = $request->has('sort') ? strtolower($request->input('sort')) : 'updated_at';
        $order = $request->has('order') ? strtolower($request->input('order')) : 'desc';
        $status = $request->has('status') ? strtolower($request->input('status')) : 'active';
        $conditions = '1 = 1';
        
        if (!empty($search_term)) {
            $conditions .= " AND (LOWER(name) like '%$search_term%'";
            $conditions .= " OR LOWER(email) like '%$search_term%'";
            $conditions .= " OR LOWER(position) like '%$search_term%')";
        }
        try {
            $paged = User::query()
                ->whereRaw($conditions)
                ->orderBy($sort, $order);
            
            if ($status) {
                $paged = $paged->where('status', $status);
            }
            
            $paged = $paged
                ->paginate($limit);
            return Mapper::list(new UserMapper(), $paged, User::query()->count(), $request->method());
        } catch (\Exception $e) {
            return Mapper::error($e->getMessage(), $request->method());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param CreateRequest $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function create(CreateRequest $request)
    {
        DB::beginTransaction();
        try {
            $item = User::query()->create([
                'name' => $request->name,
                'email' => strtolower($request->email),
                'status' => strtolower($request->status),
                'position' => strtolower($request->position),
                'password' => bcrypt($request->password),
            ]);
            DB::commit();
            return Mapper::single(new UserMapper(), $item, $request->method());
        } catch (\Exception $e) {
            DB::rollback();
            return Mapper::error($e->getMessage(), $request->method());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        try {
            $item = User::query()->findOrFail($id);
            return Mapper::single(new UserMapper(), $item, $request->method());
        } catch (\Exception $e) {
            return Mapper::error($e->getMessage(), $request->method());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @param UpdateRequest $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function edit($id, UpdateRequest $request)
    {
        DB::beginTransaction();
        try {
            $item = User::query()->findOrFail($id);
            $item->update([
                'name' => $request->name,
                'email' => strtolower($request->email),
                'status' => strtolower($request->status),
                'position' => strtolower($request->position),
                'password' => bcrypt($request->password),
            ]);
            DB::commit();
            return Mapper::single(new UserMapper(), $item, $request->method());
        } catch (\Exception $e) {
            DB::rollback();
            return Mapper::error($e->getMessage(), $request->method());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id, Request $request)
    {
        DB::beginTransaction();
        try {
            $item = User::query()->findOrFail($id);
            $item->delete();
            DB::commit();
            return Mapper::success($request->method());
        } catch (\Exception $e) {
            DB::rollback();
            return Mapper::error($e->getMessage(), $request->method());
        }
    }
}
